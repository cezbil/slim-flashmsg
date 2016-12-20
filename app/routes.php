<?php

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/flash', function ($request, $response, $args) use ($app) {

    $this->flash->addMessage('global', 'You have registered!');

    return $response->withRedirect($app->router->pathFor('home'));
});
