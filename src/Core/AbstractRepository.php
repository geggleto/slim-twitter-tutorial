<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:41 AM
 */

namespace Twitter\Core;


use Twitter\Factory\TweetRepository;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class AbstractRepository
{
    /**
     * @var Adapter
     */
    protected $adapter;

    /**
     * @var array
     */
    protected $gateway;


    /**
     * AbstractGatewayFactory constructor.
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->gateway = array();
    }

    /**
     * @param $table
     *
     * @return TweetRepository
     */
    public function getRepository($table) {
        if (!isset($this->gateway[$table])) {
            $this->gateway[$table] = new TableGateway($table, $this->adapter);
        }

        return new TweetRepository($this->gateway[$table]);
    }
}