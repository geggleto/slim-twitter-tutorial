<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 9:25 AM
 */

namespace Twitter\Repository;


use Zend\Db\Sql\Where;

class FollowerRepository extends Repository
{
    /**
     * @param $person_id
     * @return array
     */
    public function findFollowers($person_id) {
        $where = new Where();
        $where->equalTo('person_id', $person_id);

        return $this->gateway->select($where)->toArray();
    }

    /**
     * @param $follower_id
     * @return array
     */
    public function getFollowees($follower_id) {
        $where = new Where();
        $where->equalTo('follower_id', $follower_id);

        return $this->gateway->select($where)->toArray();
    }
}