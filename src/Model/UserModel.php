<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:33 AM
 */

namespace Twitter\Model;


class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct(['id']);
    }

    public function followers() {
        return array();
    }
}