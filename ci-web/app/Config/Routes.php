<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/authlogin','Home::auth_login');
$routes->post('/authregister','Home::auth_register');
$routes->get('/logout','Home::logout');
