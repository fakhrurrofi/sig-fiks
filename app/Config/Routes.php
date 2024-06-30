<?php

namespace Config;

$routes = Services::routes();

// Mengatur namespace default
$routes->setDefaultNamespace('App\Controllers');

// Controller default yang dipanggil pertama kali saat aplikasi dijalankan
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// Routing URL untuk Controller Dashboard
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('getdata', 'Dashboard::getdata');

// Routing URL untuk Controller Kecamatan
$routes->get('kecamatan', 'Kecamatan::index');
$routes->get('tambahkecamatan', 'Kecamatan::tambah');
$routes->get('editkecamatan/(:num)', 'Kecamatan::edit/$1');
$routes->get('hapuskecamatan/(:num)', 'Kecamatan::hapus/$1');
$routes->post('simpankecamatan', 'Kecamatan::simpan');
$routes->post('updatekecamatan', 'Kecamatan::update');

// Routing URL untuk Controller universitas
$routes->get('universitas', 'universitas::index');
$routes->get('tambahuniversitas', 'universitas::tambah');
$routes->get('edituniversitas/(:num)', 'universitas::edit/$1');
$routes->get('hapusuniversitas/(:num)', 'universitas::hapus/$1');
$routes->post('simpanuniversitas', 'universitas::simpan');
$routes->post('updateuniversitas', 'universitas::update');

// Memuat route tambahan berdasarkan lingkungan jika ada
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
?>
