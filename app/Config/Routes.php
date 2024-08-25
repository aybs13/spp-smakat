<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

// Rute untuk Admin Dashboard
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/logout', 'DashboardController::logout');

// Rute untuk Users
$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');

// Rute untuk Jurusan
$routes->get('/jurusan', 'JurusanController::index');
$routes->get('/jurusan/create', 'JurusanController::create');
$routes->post('/jurusan/store', 'JurusanController::store');
$routes->get('/jurusan/edit/(:num)', 'JurusanController::edit/$1');
$routes->post('/jurusan/update/(:num)', 'JurusanController::update/$1');
$routes->get('/jurusan/delete/(:num)', 'JurusanController::delete/$1');

// Rute untuk Kelas
$routes->get('/kelas', 'KelasController::index');
$routes->get('/kelas/create', 'KelasController::create');
$routes->post('/kelas/store', 'KelasController::store');
$routes->get('/kelas/edit/(:num)', 'KelasController::edit/$1');
$routes->post('/kelas/update/(:num)', 'KelasController::update/$1');
$routes->get('/kelas/delete/(:num)', 'KelasController::delete/$1');

// Rute untuk Pembayaran
$routes->get('/pembayaran', 'PembayaranController::index');
$routes->get('/pembayaran/bayar/(:num)', 'PembayaranController::bayar/$1');
$routes->post('/pembayaran/selesai', 'PembayaranController::selesai');

// Rute untuk Laporan Admin
$routes->get('/admin/laporan', 'PembayaranController::laporan');
$routes->get('/admin/laporan/exportExcel', 'PembayaranController::exportExcel');

// Group Rute untuk Siswa
$routes->get('/siswa/profil', 'UserController::profil', ['filter' => 'auth']);
$routes->get('/siswa/dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'UserController::profil');
    $routes->get('pembayaran', 'PembayaranController::index');
    $routes->get('riwayat', 'PembayaranController::riwayat');
});
