<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// === route login === //
$routes->get('aksesLogin', 'Auth\Login::indexAkses');
$routes->get('login', 'Auth\Login::index');

// === route admin === //
$routes->get('dashboard', 'Admin\Admin::index');
