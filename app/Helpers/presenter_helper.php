<?php

use CodeIgniter\Router\RouteCollection;

if (!function_exists('presenter')) {
  function presenter(RouteCollection $routes, array $config): void
  {
    $route         = $config['route'] ?? '';
    $controller    = $config['controller'] ?? '';
    $options       = $config['options'] ?? [];
    $methodOptions = $config['methodOptions'] ?? [];
    $methods       = [
      'index'   => ['get', '', ''],
      'trash'   => ['get', 'trash', ''],
      'show'    => ['get', 'show/(:segment)', '/$1'],
      'new'     => ['get', 'new', ''],
      'create'  => ['post', 'create', ''],
      'edit'    => ['get', 'edit/(:segment)', '/$1'],
      'update'  => ['post', 'update/(:segment)', '/$1'],
      'delete'  => ['post', 'delete/(:segment)', '/$1'],
      'restore' => ['post', 'restore/(:segment)', '/$1'],
    ];

    $routes->group(
      $route,
      $options,
      static function ($routes) use ($route, $methods, $controller, $methodOptions) {
        foreach ($methods as $method => [$httpMethod, $uri, $placeholder]) {
          $callback = sprintf('%s::%s%s', $controller, $method, $placeholder);
          $name     = sprintf('%s.%s', $route, $method);

          $routes->{$httpMethod}($uri, $callback, array_merge([
            'as' => $name,
          ], $methodOptions[$method] ?? []));
        }
      }
    );
  }
}
