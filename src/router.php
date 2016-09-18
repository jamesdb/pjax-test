<?php

use League\Container\Container;
use League\Container\ContainerInterface;
use League\Route\RouteCollection;

$router = new RouteCollection(
    ($container instanceof ContainerInterface) ? $container : new Container
);

$router->middleware($container->get(App\Middleware\PjaxMiddleware::class));

$router->get('/', 'App\Controller\MainController::index');
$router->get('/test', 'App\Controller\MainController::test');
$router->get('/another', 'App\Controller\MainController::another');

return $router;
