<?php

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ ."/../templates", [
        'cache' => __DIR__."/../cache"
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

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

$container[\Twitter\Services\SessionService::class] =
    (new \Twitter\Services\SessionService())->setName('twitter')->start();

$container['tweetGateway'] = function ($c) { // $c is the container
    return new Zend\Db\TableGateway\TableGateway('tweets', $c['adapter']);
};

$container['feedGateway'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway('feeds', $c['adapter']);
};

$container['userGateway'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway('users', $c['adapter']);
};

$container['followerGateway'] = function ($c) {
    return new Zend\Db\TableGateway\TableGateway('followers', $c['adapter']);
};

$container[\Twitter\Repository\TweetRepository::class] = function ($c) {
    return new \Twitter\Repository\TweetRepository($c['tweetGateway']);
};

$container[\Twitter\Repository\FeedRepository::class] = function ($c) {
    return new \Twitter\Repository\FeedRepository($c['feedGateway']);
};

$container[\Twitter\Repository\UserRepository::class] = function ($c) {
    return new \Twitter\Repository\UserRepository($c['userGateway']);
};

$container[\Twitter\Repository\FollowerRepository::class] = function ($c) {
    return new \Twitter\Repository\FollowerRepository($c['followerGateway']);
};

$container[\Twitter\Action\CreateTweet::class] = function ($c) {
  return new \Twitter\Action\CreateTweet($c[\Twitter\Services\TweetService::class]);
};

$container[\Twitter\Services\TweetService::class] = function ($c) {
    return new Twitter\Services\TweetService($c[\Twitter\Services\FeedService::class],
        $c[\Twitter\Repository\TweetRepository::class],
        $c[\Twitter\Services\UserService::class]);
};

$container[\Twitter\Services\FeedService::class] = function ($c) {
    return new \Twitter\Services\FeedService($c[\Twitter\Repository\FeedRepository::class]);
};

$container[\Twitter\Services\UserService::class] = function ($c) {
  return new \Twitter\Services\UserService($c[\Twitter\Repository\UserRepository::class],
      $c[\Twitter\Repository\FollowerRepository::class],
      $c[\Twitter\Services\SessionService::class]);
};

$container[\Twitter\Action\CreateUserAction::class] = function ($c) {
    return new \Twitter\Action\CreateUserAction($c[\Twitter\Services\UserService::class]);
};

$container[\Twitter\Action\LoginUserAction::class] = function ($c) {
    return new \Twitter\Action\LoginUserAction($c[\Twitter\Services\UserService::class]);
};