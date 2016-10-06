<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:34 AM
 */

namespace Twitter\Model;

class TweetModel extends Model
{
    protected $id;
    protected $owner_id;
    protected $content;

    public function __construct()
    {
        parent::__construct(['id', 'owner_id', 'content']);
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
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}