<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); // ==== home ====

// === route login === //
$routes->get('aksesLogin', 'Auth\Login::indexAkses'); // ==== akses login ====
$routes->get('login/admin', 'Auth\Login::index'); // ==== akses login admin ====
$routes->get('login/kasir', 'Auth\Login::loginKasir'); // ==== akses login kasir ====
$routes->get('login/owner', 'Auth\Login::loginOwner'); // ==== akses login owner ====

// === route auth login akses === //
$routes->post('AuthProses', 'Auth\AuthController::MasukAdmin'); // ==== proses login ====
$routes->get('logout', 'Auth\AuthController::logout'); // ==== logout ====

// === route admin === //
$routes->get('dashboard', 'Admin\Admin::index'); // ==== dashboard ====
$routes->get('data_obat', 'Admin\data_obat\DtoController::index'); // ==== data obat ====
$routes->get('data_supplier', 'Admin\data_supplier\DspController::index'); // ==== data supplier ====

// === route subDomain === //
$routes->get('tambah_obat', 'Admin\data_obat\DtoController::create'); // ==== tambah obat ====
$routes->get('tambah_supplier', 'Admin\data_supplier\DspController::create'); // ==== tambah supplier ====
$routes->get('edit_supplier/(:segment)', 'Admin\data_supplier\DspController::edit/$1'); // ==== edit supplier ====

// === route post === //
$routes->post('store_data_supplier','Admin\data_supplier\DspController::store'); // ==== store supplier ====
$routes->post('store_data_obat','Admin\data_obat\DtoController::storeObat'); // ==== store obat ====

// === route edit === //
$routes->get('edit_supplier/(:segment)', 'Admin\data_supplier\DspController::edit/$1'); // ==== edit supplier ====
$routes->get('edit_obat/(:segment)', 'Admin\data_obat\DtoController::edit/$1'); // ==== edit obat ====

// === route update === //
$routes->post('edit_data_supplier/(:segment)','Admin\data_supplier\DspController::storeEdit/$1'); // ==== store edit supplier ====
$routes->post('update_data_obat/(:segment)', 'Admin\data_obat\DtoController::update/$1'); // ==== update obat ====

// === route delete === //
$routes->delete('hapus_penyedia/(:num)', 'Admin\Data_supplier\DspController::delete/$1'); // ==== delete supplier ====
$routes->delete('delete_data_obat/(:segment)', 'Admin\data_obat\DtoController::delete/$1'); // ==== delete obat ====

// === route password hash === //
$routes->get('passwordHash', 'Auth\Login::passwordHash'); // ==== password hash ====
