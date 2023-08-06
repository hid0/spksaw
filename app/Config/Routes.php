<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'UserController::login');


//...

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    // data users 
    $routes->get("/", "AdminController::index");
    $routes->get("users", "AdminController::users"); //admin/users
    $routes->get("user/:num", 'AdminController::edit_user/$1'); //admin/user/{id}
    $routes->post('user', 'AdminController::user_add'); //with method post
    $routes->get('del_user/:num', 'AdminController::del_user/$1');

    // students
    $routes->get('students', 'AdminController::students');

    // DUDI
    $routes->get('dudi', 'AdminController::dudi');

    // criterias
    $routes->get('criterias', 'AdminController::criterias');
});
// Siswa routes
$routes->group("siswa", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "SiswaController::index");

    // biodata
    $routes->get('biodata', 'SiswaController::biodata');
});
// Koordinator routes
$routes->group("koordinator", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "KoordinatorController::index");
    // kelengkapan data
    $routes->get('dokumen', 'KoordinatorController::dokumen');
    // input nilai rapor
    $routes->get('rapor', 'KoordinatorController::rapor');
    // lihat rekap nilai
    $routes->get('rekapNilai', 'KoordinatorController::rekapNilai');
});
// Hubin routes
$routes->group("hubin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "HubinController::index");
    // input nilai tes tertulis
    $routes->get('tesTulis', 'HubinController::tesTulis');
    // input nilai tes tertulis
    $routes->get('tesWawancara', 'HubinController::tesWawancara');
    // lihat rekap nilai
    $routes->get('rekapNilai', 'HubinController::rekapNilai');
    // hitung SAW
    $routes->get('hitung', 'HubinController::hitung');
    // Lihat Hasil
    $routes->get('lihatHasil', 'HubinController::lihatHasil');
    // detail Hasil
    $routes->get('detailHasil', 'HubinController::detailHasil');
    // cetak laporan
    $routes->get('cetak', 'HubinController::cetak');
});
// Gurubk routes
$routes->group("gurubk", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "GurubkController::index");
});
// Kepsek routes
$routes->group("kepsek", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "KepsekController::index");
    //lihat Hasil
    $routes->get('lihatHasil', 'KepsekController::lihatHasil');
    // detail Hasil
    $routes->get('detailHasil', 'KepsekController::detailHasil');
    // cetak laporan
    $routes->get('cetak', 'KepsekController::cetak');
});
$routes->get('logout', 'UserController::logout');

//...

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
