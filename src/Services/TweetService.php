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
use Twitter\Repository\TweetRepository;

class TweetService
{
    /** @var FeedService  */
    protected $feedService;

    /** @var TweetRepository */
    protected $tweetRepository;


    /**
     * TweetService constructor.
     *
     * @param FeedService $feedService
     * @param TweetRepository $tweetRepository
     */
    public function __construct(FeedService $feedService, TweetRepository $tweetRepository)
    {
        $this->feedService = $feedService;
        $this->tweetRepository = $tweetRepository;
    }

    /**
     * @param UserModel $sourceUser
     * @param TweetModel $message
     */
    public function tweet(UserModel $sourceUser, TweetModel $message) {

        $message = $this->persistTweet($message);

        $followers = $sourceUser->followers();

        foreach ($followers as $follower) {
            $this->feedService->addToFeed($follower, $message);
        }
    }

    /**
     * @param TweetModel $model
     *
     * @return TweetModel
     */
    public function persistTweet(TweetModel $model) {
        return $this->tweetRepository->saveTweet($model);
    }
}