<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:00 PM
 */

namespace Twitter\Core;


use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Twitter\Action\ActionInterface;

class NotYetImplementedAction implements ActionInterface
{
    public function __invoke(Request $request, Response $response, array $args)
    {
        return $response->withStatus(501)->write("Not Implemented Yet");
    }
}