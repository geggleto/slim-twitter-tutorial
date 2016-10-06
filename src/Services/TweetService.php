<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:29 AM
 */

namespace Twitter\Services;


use Twitter\Model\TweetModel;
use Twitter\Model\UserModel;

class TweetService
{

    public function __construct()
    {
        //Needs access to user feeds
    }

    public function tweet(UserModel $sourceUser, TweetModel $message) {
        $followers = $sourceUser->followers();
        $message->addTo($followers);
    }
}