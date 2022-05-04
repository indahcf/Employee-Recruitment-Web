<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pengguna::home');
$routes->get('/job_listing', 'Pengguna::job_listing');
$routes->get('/job_details/(:num)', 'Pengguna::job_details/$1');
$routes->post('/pengguna/ajax_lowongan', 'Pengguna::ajax_lowongan');

$routes->group('hrd', ['filter' => 'role:hrd'], function ($routes) {
    $routes->get('/', 'Hrd::index');

    $routes->get('kategori', 'Kategori::index');
    $routes->get('kategori/create', 'Kategori::create');
    $routes->get('kategori/edit/(:segment)', 'Kategori::edit/$1');
    $routes->delete('kategori/(:num)', 'Kategori::delete/$1');

    $routes->get('lowongan', 'Lowongan::index');
    $routes->get('lowongan/create', 'Lowongan::create');
    $routes->get('lowongan/edit/(:num)', 'Lowongan::edit/$1');
    $routes->delete('lowongan/(:num)', 'Lowongan::delete/$1');

    $routes->get('lamaran', 'Lamaran::index');
    $routes->get('lamaran/detail/(:num)', 'Lamaran::detail/$1');
    $routes->get('lamaran/download_resume/(:num)', 'Lamaran::download_resume/$1');
    $routes->get('lamaran/download_portofolio/(:num)', 'Lamaran::download_portofolio/$1');
    $routes->post('lamaran/update_status', 'Lamaran::update_status');
});

$routes->group('pelamar', ['filter' => 'role:pelamar'], function ($routes) {
    $routes->get('/', 'Pelamar::lowongan');
    $routes->get('riwayat_lamaran', 'Pelamar::riwayat_lamaran');
    $routes->get('job_details/(:num)', 'Pelamar::job_details/$1');
    $routes->post('ajax_lowongan', 'Pelamar::ajax_lowongan');
    $routes->get('form_pendaftaran/(:num)', 'Pelamar::form_pendaftaran/$1');
    $routes->get('pilih_lowongan/(:num)', 'Pelamar::pilih_lowongan/$1');
    $routes->post('create', 'Pelamar::create');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
