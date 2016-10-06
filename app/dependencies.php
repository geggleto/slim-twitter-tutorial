<?php

$container['database'] = [
  "name" => "twitter",
  "username" => "root",
  "password" => ""
];

$container['adapter'] = function ($c) {
    return new Zend\Db\Adapter\Adapter(array(
        'driver' => 'Pdo_Mysql',
        'database' => $c['database']['name'],
        'username' => $c['database']['username'],
        'password' => $c['database']['password']
    ));
};

$container['ModelFactory'] = function ($c) {
    return new \Twitter\Model\AbstractGatewayFactory($c['adapter']);
};