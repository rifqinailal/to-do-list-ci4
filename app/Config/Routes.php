<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //route web

 $routes->group('', function ($routes) {
$routes->get('/', 'Home::index');
$routes->get('index','Web\TasksController::index');
});


if (file_exists(APPPATH . 'Config/RoutesApi.php')) {
    require APPPATH . 'Config/RoutesApi.php';
}
