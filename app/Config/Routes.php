<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

if (file_exists(APPPATH . 'Config/RoutesApi.php')) {
    require APPPATH . 'Config/RoutesApi.php';
}
