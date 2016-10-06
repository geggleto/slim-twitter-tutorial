<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:48 AM
 */

namespace Twitter\Repository;


use Twitter\Model\TweetModel;
use Zend\Db\TableGateway\TableGateway;

class TweetRepository extends Repository
{
    public function saveTweet(TweetModel $tweet) {
        if (empty($tweet->getId())) {
            $id = $this->insert($tweet->toArray());
            $tweet->setId($id);
            return $tweet;
        } else {
            $this->update($tweet->getId(), $tweet->toArray());
            return $tweet;
        }
    }
}