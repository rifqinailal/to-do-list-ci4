<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//route web

$routes->group('', function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('index', 'Web\TasksController::index');
    $routes->post('create', 'Web\TasksController::create');
    $routes->get('detail/(:num)', 'Web\TasksController::detail/$1');
    $routes->post('delete/(:num)', 'Web\TasksController::delete/$1');
});


if (file_exists(APPPATH . 'Config/RoutesApi.php')) {
    require APPPATH . 'Config/RoutesApi.php';
}
