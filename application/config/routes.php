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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = 'NgingasController/index';
$route['dashboard'] = 'NgingasController/dashboard';
$route['notifikasi'] = 'NgingasController/notifikasi';
$route['signup_ikm'] = 'NgingasController/signup_ikm';

//
// User Route
//
$route['Login']	= 'User/LoginAct';
$route['Logout'] = 'User/Logout';

//
// Data User
//
$route['data_user/home'] = 'NgingasController/data_user_home';
$route['data_user/create'] = 'NgingasController/data_user_create';

//
// Produksi
//
$route['produksi/pimpinan'] = 'NgingasController/produksi_pimpinan';
$route['produksi/operator'] = 'Operator/produksi_operator';
$route['produksi/detail_pimpinan'] = 'NgingasController/produksi_detail_pimpinan';
$route['produksi/tambah_operator'] = 'Operator/produksi_tambah_operator';
$route['produksi/tambah_berhasil_operator'] = 'Operator/produksi_tambah_berhasil_operator';

//
// Keuangan
//
$route['keuangan/pimpinan'] = 'NgingasController/keuangan_pimpinan';
$route['keuangan/operator'] = 'Operator/keuangan_operator';
$route['keuangan/detail_pimpinan'] = 'NgingasController/keuangan_detail_pimpinan';
$route['keuangan/detail_operator'] = 'Operator/keuangan_detail_operator';

//
// SDM
//
$route['sdm/tambah_sdm'] = 'NgingasController/sdm_tambah_sdm';
$route['sdm/list_sdm'] = 'NgingasController/sdm_list_sdm';

//
// Tekfo
//
$route['tekfo/pimpinan'] = 'NgingasController/tekfo_pimpinan';
$route['tekfo/operator'] = 'NgingasController/tekfo_operator';
$route['tekfo/detail_pimpinan'] = 'NgingasController/tekfo_detail_pimpinan';
$route['tekfo/tambah_operator'] = 'NgingasController/tekfo_tambah_operator';
$route['tekfo/tambah_berhasil_operator'] = 'NgingasController/tekfo_tambah_berhasil_operator';

