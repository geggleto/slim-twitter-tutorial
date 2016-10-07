<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:18 PM
 */

namespace Twitter\Action;


use Slim\Http\Request;
use Slim\Http\Response;
use Twitter\Services\UserService;

class CreateUserAction extends Action
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $attributes = $request->getParsedBody();
        $user = $this->userService->createUser($attributes);
        return $response->withJson($user->toArray());
    }
}