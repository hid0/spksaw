<?php

namespace Config;

use App\Controllers\AdminController;
use App\Controllers\GurubkController;
use App\Controllers\HubinController;
use App\Controllers\KoordinatorController;
use App\Controllers\SiswaController;

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
    $routes->post('user', 'AdminController::user_add'); //with method post
    $routes->post('user/delete', 'AdminController::del_user');
    $routes->get("user/:num", 'AdminController::edit_user/$1'); //admin/user/{id}
    $routes->post('edit-user', 'AdminController::update_user');

    // students
    $routes->get('students', 'AdminController::students');
    $routes->post('student/add', 'AdminController::add_student');

    // DUDI
    $routes->get('dudi', 'AdminController::dudi');
    $routes->post('dudi/add', 'AdminController::add_dudi');
    $routes->get('dudi/:num', 'AdminController::detail_dudi');

    // criterias
    // $routes->get('criterias', 'AdminController::criterias');
    // $routes->post('criteria/add', 'AdminController::add_criteria');
});
// Siswa routes
$routes->group("siswa", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "SiswaController::index");

    // recommendation
    $routes->get('daftar-rekomendasi', 'SiswaController::rekomendasi');
    $routes->get('dudi/:num/:num', 'SiswaController::dudi');
    // biodata
    $routes->get('biodata', 'SiswaController::biodata');
    $routes->post('biodata/upload', 'SiswaController::saveBio');
});
// Koordinator routes
$routes->group("koordinator", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "KoordinatorController::index");
    // kelengkapan data
    $routes->get('dokumen', 'KoordinatorController::dokumen');
    $routes->get('dokumen/:num', 'KoordinatorController::penilaian/$1');
    $routes->post('dokumen/nilai', 'KoordinatorController::save_nilai');
    // input nilai rapor
    $routes->get('rapor', 'KoordinatorController::rapor');
    $routes->get('rapor/:num', 'KoordinatorController::c1');
    $routes->post('rapor/nilai', 'KoordinatorController::save_rapor');
    // lihat rekap nilai
    $routes->get('rekapNilai', 'KoordinatorController::rekapNilai');
});
// Hubin routes
$routes->group("hubin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "HubinController::index");
    // input nilai tes tertulis
    $routes->get('tesTulis', 'HubinController::tesTulis');
    $routes->get('tes-tulis/:num', "HubinController::tulisNilai");
    $routes->post('tes-tulis/save', 'HubinController::tulisNilaiSave');
    // input nilai tes tertulis
    $routes->get('tesWawancara', 'HubinController::tesWawancara');
    $routes->get('tes-wawancara/:num', 'HubinController::wawancaraNilai');
    $routes->post('tes-wawancara/save', 'HubinController::wawancaraSave');
    // lihat rekap nilai
    $routes->get('rekapNilai', 'HubinController::rekapNilai');
    // hitung SAW
    $routes->get('hitung', 'HubinController::hitung');
    $routes->post('normalisasi', 'HubinController::normalisasi');
    $routes->get('normalisasi/reset', 'HubinController::reset');
    $routes->post('normalisasi/referensi', 'HubinController::referensi');
    // Lihat Hasil
    $routes->get('lihatHasil', 'HubinController::lihatHasil');
    // detail Hasil
    $routes->get('dudi/:num/:num', 'HubinController::dudi');
    // $routes->get('detailHasil', 'HubinController::detailHasil');
    // cetak laporan
    $routes->get('cetak/:num/:num', 'HubinController::cetak');
});
// Gurubk routes
$routes->group("gurubk", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "GurubkController::index");
    // input jumlah alpa
    $routes->get('presensi', 'GurubkController::presensi');
    $routes->get('presensi/:num', 'GurubkController::presensiJml');
    $routes->post('presensi/save', 'GurubkController::presensiSave');
    // lihat rekap nilai
    $routes->get('rekapNilai', 'GurubkController::rekapNilai');
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
