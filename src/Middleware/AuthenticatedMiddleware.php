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
use Twitter\Model\UserModel;
use Twitter\Services\SessionService;

class AuthenticatedMiddleware implements MiddlewareInterface
{
    protected $sessionService;

    public  function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function __invoke(Request $request, Response $response, callable $next)
    {
        $user = $this->sessionService->get('user');

        if ($user instanceof UserModel) {
            $request = $request->withAttribute('user', $user);
            return $next($request, $response);
        } else {
            return $response->withStatus(401);
        }
    }
}