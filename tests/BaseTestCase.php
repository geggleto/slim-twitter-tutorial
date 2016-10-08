<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 12:00 PM
 */

namespace Twitter\Tests;


use PHPUnit\Framework\TestCase;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\RequestBody;
use Slim\Http\UploadedFile;
use Slim\Http\Uri;

class BaseTestCase extends TestCase
{
    protected $app;

    public function setUp()
    {
        $app = new \Slim\App([
            "displayErrorDetails" => true
        ]);

        $container = $app->getContainer();

        include_once __DIR__."/../app/config.php";
        include_once __DIR__."/../app/dependencies.php";
        include_once __DIR__."/../app/routes.php";

        $this->app = $app;
    }

    public function requestFactory($method = 'GET', $url = '')
    {
        $env = Environment::mock();
        $uri = Uri::createFromString('https://example.com:443'.$url);
        $headers = Headers::createFromEnvironment($env);
        $cookies = [];
        $serverParams = $env->all();
        $body = new RequestBody();
        $uploadedFiles = UploadedFile::createFromEnvironment($env);
        $request = new Request($method, $uri, $headers, $cookies, $serverParams, $body, $uploadedFiles);
        return $request;
    }
}