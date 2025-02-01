<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// dashboard routes
 $routes->get('/', 'Home::index');

//  produk routes
 $routes->get('produk', 'ProductController::index');
// produk add routes
 $routes->get('produk/create', 'ProductController::create');
// produk store routes
 $routes->post('produk/store', 'ProductController::store');
// produk edit routes
 $routes->get('produk/edit/(:segment)', 'ProductController::edit/$1');
// produk update routes
 $routes->post('produk/update', 'ProductController::update');
// produk delete routes
 $routes->post('produk/delete', 'ProductController::delete');
