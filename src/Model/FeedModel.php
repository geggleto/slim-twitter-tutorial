<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 1:59 PM
 */

namespace Twitter\Model;


class FeedModel extends Model
{
    protected $id;
    protected $user_id;
    protected $tweet_id;
    protected $timestamp;

    public function __construct()
    {
        parent::__construct(['id', 'user_id', 'tweet_id', 'timestamp']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getTweetId()
    {
        return $this->tweet_id;
    }

    /**
     * @param mixed $tweet_id
     */
    public function setTweetId($tweet_id)
    {
        $this->tweet_id = $tweet_id;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }


}