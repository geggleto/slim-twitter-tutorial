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

$container['user'] = function ($c) {
  return new Zend\Db\TableGateway\TableGateway("users", $c['adapter']);
};

$container['tweet'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway("tweets", $c['adapter']);
};

$container['message'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway("messages", $c['adapter']);
};

$container['follow'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway("follows", $c['adapter']);
};

$container['feed'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway("feeds", $c['adapter']);
};