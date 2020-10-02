<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/admin', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Admin', 'action' => 'dashBoard']);

    $builder->connect('/login', ['controller' => 'Admin', 'action' => 'getLogin']);

    $builder->post('/process-login',['controller' => 'Admin', 'action' => 'processLogin']);

    $builder->get('/profile',['controller' => 'Admin', 'action' => 'profile']);

    $builder->post('/update-profile',['controller' => 'Admin', 'action' => 'updateProfile']);

    $builder->get('/check-exist-email',['controller'=>'Admin','action'=>'checkExistEmail']);

    $builder->fallbacks();
});

$routes->scope('/',function (RouteBuilder $builder){

    $builder->get('/',['controller' => 'User', 'action' =>'dashBoard']);

    $builder->get('/login',['controller'=>'User','action' =>'getLogin']);

    $builder->post('/process-login',['controller'=>'User','action' =>'processLogin']);

    $builder->get('/logout',['controller'=>'User','action'=>'logOut']);

    $builder->get('/register',['controller'=>'User','action'=>'register']);

    $builder->post('/process-register',['controller'=>'User','action'=>'processRegister']);

    $builder->get('/check-exist-email',['controller'=>'User','action'=>'checkExistEmail']);

    $builder->fallbacks();
});

$routes->scope('/product', function (RouteBuilder $builder) {
    $builder->get('/',['controller'=>'Product','action'=>'index']);
    $builder->fallbacks();
});

