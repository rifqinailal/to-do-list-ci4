<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

// API Routes
$routes->group('api', function ($routes) {
    $routes->get('tasks', 'Api\TasksApiController::index');
    $routes->post('/tasks/create', 'Api\TasksApiController::create');
    $routes->put('/tasks/update/(:num)', 'Api\TasksApiController::update/$1');
    $routes->delete('/tasks/delete/(:num)', 'Api\TasksApiController::delete/$1');
});