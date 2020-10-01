<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Admin', 'action' => 'dashBoard']);

    $builder->connect('/view-login', ['controller' => 'Admin', 'action' => 'getLogin']);

    $builder->post('/process-login',['controller' => 'Admin', 'action' => 'processLogin']);

    $builder->fallbacks();
});

