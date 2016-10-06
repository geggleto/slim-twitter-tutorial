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

$container['tweetGateway'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway('tweet', $c['adapter']);
};

$container[\Twitter\Action\CreateTweet::class] = function ($c) {
  return new \Twitter\Action\CreateTweet($c[\Twitter\Services\TweetService::class]);
};

$container[\Twitter\Services\TweetService::class] = function ($c) {
    return new Twitter\Services\TweetService($c[\Twitter\Services\FeedService::class],
        $c[\Twitter\Repository\TweetRepository::class]);
};

$container[\Twitter\Services\FeedService::class] = function ($c) {
    return new \Twitter\Services\FeedService();
};

$container[\Twitter\Repository\TweetRepository::class] = function ($c) {
    return new \Twitter\Repository\TweetRepository($c['tweetGateway']);
};

