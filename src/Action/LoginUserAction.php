<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:22 PM
 */

namespace Twitter\Action;


use Slim\Http\Request;
use Slim\Http\Response;
use Twitter\Services\UserService;

class LoginUserAction extends Action
{
    /** @var UserService */
    protected $userService;

    /**
     * LoginUserAction constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $attributes = $request->getParsedBody();
        $result = $this->userService->checkUserAuth($attributes['username'], $attributes['password']);

        return $response->withJson(["result" => $result]);
    }
}