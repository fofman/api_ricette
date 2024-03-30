<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/ricette/(:num)', 'Ricette::get/$1');
$routes->post('/ricette', 'Ricette::post');
$routes->put('/ricette', 'Ricette::put');
$routes->delete('/ricette', 'Ricette::delete');
