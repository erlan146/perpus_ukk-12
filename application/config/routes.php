<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*
| -------------------------------------------------------------------------
| ROUTES FIX TOTAL
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* ======================
   ANGGOTA
====================== */
$route['anggota'] = 'anggota/index';
$route['anggota/tambah'] = 'anggota/tambah';
$route['anggota/edit/(:num)'] = 'anggota/edit/$1';
$route['anggota/hapus/(:num)'] = 'anggota/hapus/$1';
$route['anggota/blacklist/(:num)'] = 'anggota/blacklist/$1';
$route['anggota/aktif/(:num)'] = 'anggota/aktif/$1';

/* ======================
   PEMINJAMAN
====================== */
$route['peminjaman'] = 'peminjaman/index';
$route['peminjaman/pinjam/(:num)'] = 'peminjaman/pinjam/$1';
$route['peminjaman/kembali/(:num)/(:num)'] = 'peminjaman/kembali/$1/$2';
$route['peminjaman/hapus/(:num)'] = 'peminjaman/hapus/$1';
$route['peminjaman/bayar/(:num)'] = 'peminjaman/bayar/$1';
$route['transaksi'] = 'peminjaman/transaksi_user';

/* ======================
   BUKU
====================== */
$route['buku'] = 'buku/index';
$route['buku/tambah'] = 'buku/tambah';
$route['buku/edit/(:num)'] = 'buku/edit/$1';
$route['buku/hapus/(:num)'] = 'buku/hapus/$1';

/* ======================
   DASHBOARD
====================== */
$route['dashboard/admin'] = 'dashboard/admin';
$route['dashboard/user']  = 'dashboard/user';