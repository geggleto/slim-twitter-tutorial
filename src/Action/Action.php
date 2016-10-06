<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 10:44 AM
 */

namespace Twitter\Action;


use Twitter\Model\AbstractGatewayFactory;

abstract class Action implements ActionInterface
{
    protected $factory;

    public function __construct(AbstractGatewayFactory $factory)
    {
        $this->factory = $factory;
    }
}