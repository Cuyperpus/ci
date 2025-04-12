<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

helper('presenter');

service('auth')->routes($routes, [
  'except' => [
    'register',
    'magic-link',
    'verify-magic-link',
  ],
]);

$routes->view('/', 'pages/home.php');

$routes->group('admin', static function (RouteCollection $routes) {
  presenter($routes, [
    'route'      => 'books',
    'controller' => 'BooksController',
  ]);
});
