<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:23 PM
 */

namespace Twitter\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

interface MiddlewareInterface
{
    public function __invoke(Request $request, Response $response, callable $next);
}