<?php
/**
 * Created by PhpStorm.
 * User: glenn
 * Date: 10/5/2016
 * Time: 7:21 PM
 */

namespace Twitter\Action;


use Slim\Http\Request;
use Slim\Http\Response;
use Twitter\Model\TweetModel;
use Twitter\Services\TweetService;

class CreateTweet extends Action
{
    protected $tweetService;

    public function __construct(TweetService $tweetService)
    {
        $this->tweetService = $tweetService;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $tweet = (new TweetModel())
                    ->setData($request->getParsedBody());

        $this->tweetService->tweet($request->getAttribute('user'), $tweet);

        return $response->withJson(['message' => "Operation Completed Successfully"]);
    }
}