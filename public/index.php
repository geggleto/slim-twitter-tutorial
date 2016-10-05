<?php

include_once __DIR__.'/../vendor/autoload.php';

$app = new Slim\App([
    "displayErrorDetails" => true
]);

$container = $app->getContainer();

include_once __DIR__."/../app/config.php";
include_once __DIR__."/../app/dependencies.php";
include_once __DIR__."/../app/routes.php";

$app->run();
