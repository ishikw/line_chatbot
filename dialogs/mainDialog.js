// Copyright (c) Microsoft Corporation. All rights reserved.
// Licensed under the MIT License.

const { ComponentDialog, DialogSet, DialogTurnStatus, WaterfallDialog } = require('botbuilder-dialogs');
const { TopLevelDialog, TOP_LEVEL_DIALOG } = require('./topLevelDialog');
const { QnAMaker } = require('botbuilder-ai');

const MAIN_DIALOG = 'MAIN_DIALOG';
const WATERFALL_DIALOG = 'WATERFALL_DIALOG';
const USER_PROFILE_PROPERTY = 'USER_PROFILE_PROPERTY';

class MainDialog extends ComponentDialog {
    constructor(userState) {
        super(MAIN_DIALOG);
        this.userState = userState;
        this.userProfileAccessor = userState.createProperty(USER_PROFILE_PROPERTY);

        this.addDialog(new TopLevelDialog());
        this.addDialog(new WaterfallDialog(WATERFALL_DIALOG, [
            this.initialStep.bind(this),
            this.finalStep.bind(this)
        ]));

        this.initialDialogId = WATERFALL_DIALOG;

        try {
            var endpointHostName = process.env.QnAEndpointHostName
            if (!endpointHostName.startsWith('https://')) {
                endpointHostName = 'https://' + endpointHostName;
            }

            if (!endpointHostName.endsWith('/qnamaker')) {
                endpointHostName = endpointHostName + '/qnamaker';
            }
            this.qnaMaker = new QnAMaker({
                knowledgeBaseId: process.env.QnAKnowledgebaseId,
                endpointKey: process.env.QnAAuthKey,
                host: endpointHostName
            });
        } catch (err) {
            console.warn(`QnAMaker Exception: ${ err } Check your QnAMaker configuration in .env`);
        }
    }

    /**
     * The run method handles the incoming activity (in the form of a TurnContext) and passes it through the dialog system.
     * If no dialog is active, it will start the default dialog.
     * @param {*} turnContext
     * @param {*} accessor
     */
    async run(turnContext, accessor) {
        const dialogSet = new DialogSet(accessor);
        dialogSet.add(this);

        const dialogContext = await dialogSet.createContext(turnContext);
        const results = await dialogContext.continueDialog();
        if (results.status === DialogTurnStatus.empty && turnContext.activity.text.indexOf("予約") !== -1) {
            await dialogContext.beginDialog(this.id);
            // await turnContext.sendActivity('ご来店、お待ちしております！');
        } else {
            if (results.status === DialogTurnStatus.empty) {
                // await turnContext.sendActivity(turnContext.activity.text);
                const qnaResults = await this.qnaMaker.getAnswers(turnContext);

                // If an answer was received from QnA Maker, send the answer back to the user.
                if (qnaResults[0]) {
                    await turnContext.sendActivity(qnaResults[0].answer);
    
                // If no answers were returned from QnA Maker, reply with help.
                } else {
                    await turnContext.sendActivity('すみません、考え事をしていました');
                }
            }
        }
        console.log(results.status);
    }

    async initialStep(stepContext) {
        return await stepContext.beginDialog(TOP_LEVEL_DIALOG);
    }

    async finalStep(stepContext) {
        const userInfo = stepContext.result;

        // const status = 'finalStep You are signed up to review ' +
        //     (userInfo.companiesToReview.length === 0 ? 'no companies' : userInfo.companiesToReview.join(' and ')) + '.';
        const status = userInfo.date + userInfo.time + 'から' + userInfo.number + '名様でご予約いたしました';
        await stepContext.context.sendActivity(status);
        await stepContext.context.sendActivity('ご来店、お待ちしております！');
        await this.userProfileAccessor.set(stepContext.context, userInfo);
        return await stepContext.endDialog();
    }
}

module.exports.MainDialog = MainDialog;
module.exports.MAIN_DIALOG = MAIN_DIALOG;
