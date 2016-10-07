<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:29 AM
 */

namespace Twitter\Services;


use Twitter\Model\Model;
use Twitter\Model\TweetModel;
use Twitter\Model\UserModel;
use Twitter\Repository\TweetRepository;

class TweetService
{
    /** @var FeedService  */
    protected $feedService;

    /** @var TweetRepository */
    protected $tweetRepository;

    /** @var UserService */
    protected $userService;

    /**
     * TweetService constructor.
     *
     * @param FeedService $feedService
     * @param TweetRepository $tweetRepository
     * @param UserService $userService
     */
    public function __construct(FeedService $feedService, TweetRepository $tweetRepository, UserService $userService)
    {
        $this->feedService = $feedService;
        $this->tweetRepository = $tweetRepository;
        $this->userService = $userService;
    }

    /**
     * @param UserModel $sourceUser
     * @param TweetModel $message
     */
    public function tweet(UserModel $sourceUser, TweetModel $message) {

        $message = $this->tweetRepository->save($message);

        $followers = $this->userService->getFollowees($sourceUser->getId());

        foreach ($followers as $follower) {
            $this->feedService->addToFeed($follower, $message);
        }
    }
}