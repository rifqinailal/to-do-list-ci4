<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

// API Routes
$routes->group('api', function ($routes) {
    $routes->get('tasks', 'Api\TasksApiController::index');
    $routes->get('task/(:num)', 'Api\TasksApiController::detail/$1');
    $routes->post('task/create', 'Api\TasksApiController::create');
    $routes->put('task/update/(:num)', 'Api\TasksApiController::update/$1');
    $routes->delete('task/delete/(:num)', 'Api\TasksApiController::delete/$1');
});