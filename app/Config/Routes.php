<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//ROTTE PER LE RICETTE
$routes->get('/ricette/(:num)', 'Ricette::get/$1');
$routes->get('/ricette/recent/(:num)', 'Ricette::getRecent/$1');
$routes->get('/ricette', 'Ricette::getAll');
$routes->post('/ricette', 'Ricette::post');
$routes->patch('/ricette/(:num)', 'Ricette::patch/$1');
$routes->delete('/ricette/(:num)', 'Ricette::delete/$1');
//ROTTE CON RIFERIMENTO ALLE RICETTE
$routes->get('/ricette/paesi/(:num)', 'Paesi::getPaesiOf/$1');
$routes->get('/ricette/ingredienti/(:num)', 'Ingredienti::getIngredientiOf/$1');
$routes->get('/ricette/portate/(:num)', 'Portate::getPortateOf/$1');
$routes->get('/ricette/cotture/(:num)', 'Portate::getCottureOf/$1');
//ROTTE PER INGREDIENTI
$routes->get('/ingredienti/(:num)', 'Ingredienti::get/$1');
$routes->get('/ingredienti', 'Ingredienti::getAll');
$routes->post('/ingredienti', 'Ingredienti::post');
$routes->patch('/ingredienti/(:num)', 'Ingredienti::patch/$1');
$routes->delete('/ingredienti/(:num)', 'Ingredienti::delete/$1');
//ROTTE PER CATEGORIE
$routes->get('/categorie/(:num)', 'Categorie::get/$1');
$routes->get('/categorie', 'Categorie::getAll');
$routes->post('/categorie', 'Categorie::post');
$routes->patch('/categorie/(:num)', 'Categorie::patch/$1');
$routes->delete('/categorie/(:num)', 'Categorie::delete/$1');
//ROTTE PER COTTURE
$routes->get('/cotture/(:num)', 'Cotture::get/$1');
$routes->get('/cotture', 'Cotture::getAll');
$routes->post('/cotture', 'Cotture::post');
$routes->patch('/cotture/(:num)', 'Cotture::patch/$1');
$routes->delete('/cotture/(:num)', 'Cotture::delete/$1');
//ROTTE PER IMMAGINI
$routes->get('/immagini/(:num)', 'Immagini::get/$1');
$routes->get('/immagini', 'Immagini::getAll');
$routes->post('/immagini', 'Immagini::post');
$routes->patch('/immagini/(:num)', 'Immagini::patch/$1');
$routes->delete('/immagini/(:num)', 'Immagini::delete/$1');
//ROTTE PER PAESI
$routes->get('/paesi/(:num)', 'Paesi::get/$1');
$routes->get('/paesi', 'Paesi::getAll');
$routes->post('/paesi', 'Paesi::post');
$routes->patch('/paesi/(:num)', 'Paesi::patch/$1');
$routes->delete('/paesi/(:num)', 'Paesi::delete/$1');
//ROTTE PER PORTATE
$routes->get('/portate/(:num)', 'Portate::get/$1');
$routes->get('/portate', 'Portate::getAll');
$routes->post('/portate', 'Portate::post');
$routes->patch('/portate/(:num)', 'Portate::patch/$1');
$routes->delete('/portate/(:num)', 'Portate::delete/$1');
