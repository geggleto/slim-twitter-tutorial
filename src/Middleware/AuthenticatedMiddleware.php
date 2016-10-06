<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:22 PM
 */

namespace Twitter\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class AuthenticatedMiddleware implements MiddlewareInterface
{

    public function __invoke(Request $request, Response $response, callable $next)
    {
        //TODO Implement security

        $request = $request->withAttribute('user', array());

        return $next($request, $response);
    }
}