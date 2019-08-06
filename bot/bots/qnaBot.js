// Copyright (c) Microsoft Corporation. All rights reserved.
// Licensed under the MIT License.

const { ActivityHandler , ActionTypes, ActivityTypes, CardFactory} = require('botbuilder');
const { QnAMaker } = require('botbuilder-ai');
const fs = require('fs');
const path = require('path');



class QnABot extends ActivityHandler {
    /**
     * @param {any} logger object for logging events, defaults to console if none is provided
     */
    constructor(logger) {
        super();
        if (!logger) {
            logger = console;
            logger.log('[QnaMakerBot]: logger not passed in, defaulting to console');
        }

        try {
            var endpointHostName = process.env.QnAEndpointHostName
            if(!endpointHostName.startsWith('https://')){
		    endpointHostName =  'https://' + endpointHostName;
            }

            if(!endpointHostName.endsWith('/qnamaker')){
		    endpointHostName =  endpointHostName + '/qnamaker';
            }           this.qnaMaker = new QnAMaker({
                knowledgeBaseId: process.env.QnAKnowledgebaseId,
                endpointKey: process.env.QnAAuthKey,
                host: endpointHostName
            });
        } catch (err) {
            logger.warn(`QnAMaker Exception: ${ err } Check your QnAMaker configuration in .env`);
        }
        this.logger = logger;

        // If a new user is added to the conversation, send them a greeting message
        this.onMembersAdded(async (context, next) => {
            const membersAdded = context.activity.membersAdded;
            for (let cnt = 0; cnt < membersAdded.length; cnt++) {
                if (membersAdded[cnt].id !== context.activity.recipient.id) {
                    // await context.sendActivity('Welcome to the QnA Maker sample! Ask me a question and I will try to answer it.');
                }
            }

            // By calling next() you ensure that the next BotHandler is run.
            await next();
        });

        // When a user sends a message, perform a call to the QnA Maker service to retrieve matching Question and Answer pairs.
        this.onMessage(async (context, next) => {
            this.logger.log('Calling QnA Maker');
            // this.logger.log(context);

            const qnaResults = await this.qnaMaker.getAnswers(context);

            // If an answer was received from QnA Maker, send the answer back to the user.
            if (qnaResults[0]) {
                await context.sendActivity(qnaResults[0].answer);

            // If no answers were returned from QnA Maker, reply with help.
            } else {
                await context.sendActivity('すみません、考え事をしていました');
            }
            // const reply = { type: ActivityTypes.Message };
            // this.logger.log(ActivityTypes.Message);

            // reply.text = 'This is an inline attachment.';
            // reply.attachments = [this.getInlineAttachment()];
            const reply = {};
            reply.channelData =
            {
                'type': 'ButtonsTemplate',
                'altText': 'This is a buttons template',
                'template': {
                    'type': 'buttons',
                    'thumbnailImageUrl': 'https://example.com/bot/images/image.jpg',
                    'imageAspectRatio': 'rectangle',
                    'imageSize': 'cover',
                    'imageBackgroundColor': '#FFFFFF',
                    'title': 'Menu',
                    'text': 'Please select',
                    'defaultAction': {
                        'type': 'uri',
                        'label': 'View detail',
                        'uri': 'http://example.com/page/123'
                    },
                    'actions': [{
                        'type': 'cameraRoll',
                        'label': 'Camera roll'
                    }

                    ]
                }
            };
            await context.sendActivity(reply);
            await context.sendActivity('すみません、考え事をしていました');
            // By calling next() you ensure that the next BotHandler is run.
            await next();
        });
    }
    getInlineAttachment() {
        const imageData = fs.readFileSync(path.join(__dirname, '../1.png'));
        const base64Image = Buffer.from(imageData).toString('base64');

        return {
            name: 'architecture-resize.png',
            contentType: 'image/png',
            contentUrl: `data:image/png;base64,${ base64Image }`
        };
    }
}

module.exports.QnABot = QnABot;
