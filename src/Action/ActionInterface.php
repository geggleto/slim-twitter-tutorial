<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:19 PM
 */

namespace Twitter\Action;


use Slim\Http\Request;
use Slim\Http\Response;

interface ActionInterface
{
    public function __invoke(Request $request, Response $response, array $args);
}