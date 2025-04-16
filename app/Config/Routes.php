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
$routes->post('AuthProses', 'Auth\AuthController::MasukAdmin');
$routes->get('logout', 'Auth\AuthController::logout');

// === route admin === //
$routes->get('dashboard', 'Admin\Admin::index');
$routes->get('data_obat', 'Admin\data_obat\DtoController::index');
$routes->get('data_supplier', 'Admin\data_supplier\DspController::index');

// === route subDomain === //
$routes->get('tambah_obat', 'Admin\data_obat\DtoController::create');
$routes->get('tambah_supplier', 'Admin\data_supplier\DspController::create');
$routes->get('edit_supplier/(:segment)', 'Admin\data_supplier\DspController::edit/$1');

// === route post === //
$routes->post('store_data_supplier','Admin\data_supplier\DspController::store');
$routes->post('store_data_obat','Admin\data_obat\DtoController::storeObat');

// === route edit === //
$routes->get('edit_supplier/(:segment)', 'Admin\data_supplier\DspController::edit/$1');
$routes->get('edit_obat/(:segment)', 'Admin\data_obat\DtoController::edit/$1');

// === route update === //
$routes->post('edit_data_supplier/(:segment)','Admin\data_supplier\DspController::storeEdit/$1');
$routes->post('update_data_obat/(:segment)', 'Admin\data_obat\DtoController::update/$1');

// === route delete === //
$routes->delete('hapus_penyedia/(:num)', 'Admin\Data_supplier\DspController::delete/$1');
$routes->delete('delete_data_obat/(:segment)', 'Admin\data_obat\DtoController::delete/$1');

// === route password hash === //
$routes->get('passwordHash', 'Auth\Login::passwordHash');
