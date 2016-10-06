<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 11:20 AM
 */

namespace Twitter\Services;


use Twitter\Model\FeedModel;
use Twitter\Model\TweetModel;
use Twitter\Model\UserModel;
use Twitter\Repository\FeedRepository;
use Zend\Db\TableGateway\TableGateway;

class FeedService
{
    protected $feedRepository;

    public function __construct(FeedRepository $feedRepository)
    {
        $this->feedRepository = $feedRepository;
    }

    /**
     * @param UserModel $userModel
     * @param TweetModel $model
     *
     * @return FeedModel
     */
    public function addToFeed(UserModel $userModel, TweetModel $model) {
        $feed = new FeedModel();
        $feed->setUserId($userModel->getId());
        $feed->setTweetId($model->getId());
        $feed->setTimestamp(date(MYSQL_DATETIME_FORMAT));

        return $this->feedRepository->saveFeedItem($feed);
    }


}