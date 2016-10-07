<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 9:05 AM
 */

namespace Twitter\Repository;


use Twitter\Model\UserModel;
use Zend\Db\Sql\Where;

class UserRepository extends Repository
{

    /**
     * @param $username
     *
     * @return UserModel|null
     */
    public function getUser($username) {
        $result = $this->gateway->select(array("username" => $username));

        if ($result->count() == 0) {
            return null;
        } else {
            return (new UserModel())
                ->setData($result->toArray()[0]); //will always be 1 record
        }
    }
}