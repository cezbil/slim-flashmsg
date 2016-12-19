<?php

session_start();

require_once '../vendor/autoload.php';

$container = new \Slim\Container;

$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages();
};

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('../resources/views');

    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    $view->getEnvironment()->addGlobal('flash', $c['flash']);

    return $view;
};

$app = new \Slim\App($container);

require_once 'routes.php';
