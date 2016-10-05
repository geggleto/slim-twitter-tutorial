<?php
/**
 * API Routes from docs/3 REQUIREMENTS.md
 */

$app->group('/api', function() {
    //Create User
    $this->post('/user', \Twitter\Core\NotYetImplementedAction::class);

    //Log User In
    $this->post('/login', \Twitter\Core\NotYetImplementedAction::class);

    //Log User Out
    $this->post('/logout', \Twitter\Core\NotYetImplementedAction::class);

    //Begin Secure Routes
    $this->group('', function () {
        //Create Tweet
        $this->post('/tweet', \Twitter\Core\NotYetImplementedAction::class);

        //Delete Tweet
        $this->delete('/tweet/{tweet}', \Twitter\Core\NotYetImplementedAction::class);

        //Follow User
        $this->post('/follow/{user}', \Twitter\Core\NotYetImplementedAction::class);

        //Unfollow User
        $this->delete('/follow/{user}', \Twitter\Core\NotYetImplementedAction::class);

        //Get your Twitter Feed
        $this->get('/feed', \Twitter\Core\NotYetImplementedAction::class);

        //Update Your Profile
        $this->put('/profile', \Twitter\Core\NotYetImplementedAction::class);
    })->add(\Twitter\Middleware\AuthenticatedMiddleware::class); //Make sure we have an authenticated user
});
