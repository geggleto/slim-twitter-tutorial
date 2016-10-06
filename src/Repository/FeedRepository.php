<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 1:58 PM
 */

namespace Twitter\Repository;


use Twitter\Model\FeedModel;

class FeedRepository extends Repository
{
    public function saveFeedItem(FeedModel $feedModel) {
        if (empty($feedModel->getId())) {
            $id = $this->insert($feedModel->toArray());
            $feedModel->setId($id);
            return $feedModel;
        } else {
            $this->update($feedModel->getId(), $feedModel->toArray());
            return $feedModel;
        }
    }
}