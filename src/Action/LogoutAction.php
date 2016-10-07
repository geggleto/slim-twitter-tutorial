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
use Twitter\Services\SessionService;

class LogoutAction extends Action
{
    protected $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $this->sessionService->destroy();

        return $response->withJson(['result' => 'true']);
    }
}