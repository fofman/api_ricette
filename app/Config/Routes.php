<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//ROTTE PER LE RICETTE
$routes->get('/ricette/recent/(:num)', 'Ricette::getRecent/$1');
$routes->get('/ricette/(:num)', 'Ricette::get/$1');
$routes->get('/ricette', 'Ricette::getAll');
$routes->post('/ricette', 'Ricette::post');
$routes->patch('/ricette', 'Ricette::patch');
$routes->delete('/ricette/(:num)', 'Ricette::delete/$1');
//ROTTE PER CATEGORIE
$routes->get('/categorie/(:num)', 'Categorie::get/$1');
$routes->post('/categorie', 'Categorie::post');
$routes->patch('/categorie', 'Categorie::patch');
$routes->delete('/categorie/(:num)', 'Categorie::delete/$1');
//ROTTE PER COTTURE
$routes->get('/cotture/(:num)', 'Cotture::get/$1');
$routes->post('/cotture', 'Cotture::post');
$routes->patch('/cotture', 'Cotture::patch');
$routes->delete('/cotture/(:num)', 'Cotture::delete/$1');
//ROTTE PER IMMAGINI
$routes->get('/immagini/(:num)', 'Immagini::get/$1');
$routes->post('/immagini', 'Immagini::post');
$routes->patch('/immagini', 'Immagini::patch');
$routes->delete('/immagini/(:num)', 'Immagini::delete/$1');