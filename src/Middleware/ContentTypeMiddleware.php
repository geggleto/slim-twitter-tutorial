<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 8:38 AM
 */

namespace Twitter\Middleware;


use Slim\Http\Request;
use Slim\Http\Response;

class ContentTypeMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $response->withHeader('Content-Type', 'application/json');

        return $next($request, $response);
    }
}