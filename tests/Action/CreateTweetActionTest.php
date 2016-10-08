<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/7/2016
 * Time: 10:02 PM
 */

namespace Twitter\Tests\Action;


use Slim\Http\Request;
use Twitter\Model\UserModel;
use Twitter\Tests\BaseTestCase;

class CreateTweetActionTest extends BaseTestCase
{
    public function testInvoke() {
        $request = $this->requestFactory('POST', '/api/tweet');
        $request->withParsedBody([

        ]);
        $request->withAttribute('user', new UserModel());
    }
}