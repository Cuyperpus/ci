<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes, [
  'except' => [
    'register',
    'magic-link',
    'verify-magic-link',
  ],
]);

$routes->view('/', 'pages/home.php');
$routes->view('/about', 'pages/about.php');
