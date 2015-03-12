<?php

namespace TwitterCountKeyword;

interface TwitterInterface
{
    const APP_ONLY_AUTH = 'https://api.twitter.com/oauth2/token';

    const USER_TIMELINE = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

    const NUMBER_OF_TWEETS = 100;
}
