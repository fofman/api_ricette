<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/ricette/recent/(:num)', 'Ricette::getRecent/$1');
$routes->get('/ricette/(:num)', 'Ricette::get/$1');
$routes->post('/ricette', 'Ricette::post');
$routes->patch('/ricette', 'Ricette::patch');
$routes->delete('/ricette/(:num)', 'Ricette::delete/$1');
