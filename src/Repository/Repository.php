<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 11:03 AM
 */

namespace Twitter\Repository;


use Zend\Db\TableGateway\TableGateway;

class Repository
{
    /**
     * @var TableGateway
     */
    protected $gateway;

    /**
     * TweetFactory constructor.
     * @param TableGateway $gateway
     */
    public function __construct(TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }


    /**
     * @param array $data
     * @return int
     */
    public function insert(array $data) {
        $this->gateway->insert($data);
        return $this->gateway->lastInsertValue;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function update($id, array $data) {
        return $this->gateway->update($data, array('id' => $id));
    }

}