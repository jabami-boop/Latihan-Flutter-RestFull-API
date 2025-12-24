<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', static function (RouteCollection $routes): void {
	// Handle CORS preflight (OPTIONS) for Flutter Web (different port origin).
	$routes->options('(:any)', static function () {
		return service('response')->setStatusCode(200);
	});

	$routes->resource('products', ['controller' => 'Api\\Products']);
});
