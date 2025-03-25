<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// === route login === //
$routes->get('aksesLogin', 'Auth\Login::indexAkses');
$routes->get('login/admin', 'Auth\Login::index'); // akses login admin
$routes->get('login/kasir', 'Auth\Login::loginKasir'); // akses login kasir
$routes->get('login/owner', 'Auth\Login::loginOwner'); // akses login owner

// === route auth login akses === //
$routes->post('prosses', 'Auth\AuthController::MasukAdmin');


// === route admin === //
$routes->get('dashboard', 'Admin\Admin::index');
