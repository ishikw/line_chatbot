// Copyright (c) Microsoft Corporation. All rights reserved.
// Licensed under the MIT License.

class UserProfile {
    constructor(date, number, time) {
        this.date = date;
        this.number = number;
        this.time = time;

        // The list of companies the user wants to review.
        this.companiesToReview = [];
    }
}

module.exports.UserProfile = UserProfile;
