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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'welcome/dashboard';

// $route['admin/pengumuman'] = 'welcome/index';
// $route['admin/pengumuman/create'] = 'welcome/create';
// $route['api/pengumuman'] = 'welcome/data';

// pengumuman
$route['pengumuman'] = 'pengumuman/index_user';
$route['pengumuman/(:any)'] = 'pengumuman/show_user/$1';
$route['admin/pengumuman'] = 'pengumuman/index';
$route['admin/pengumuman/data'] = 'pengumuman/pengumuman_data';
$route['admin/pengumuman/create'] = 'pengumuman/create';
$route['admin/pengumuman/store'] = 'pengumuman/store';
$route['admin/pengumuman/update'] = 'pengumuman/update';
$route['admin/pengumuman/edit/(:any)'] = 'pengumuman/edit/$1';
$route['admin/pengumuman/delete/(:any)'] = 'pengumuman/delete/$1';
$route['admin/pengumuman/(:any)'] = 'pengumuman/show/$1';

// alamat instansi
$route['alamatinstansi'] = 'alamat_instansi/index_user';
$route['admin/alamat-instansi'] = 'alamat_instansi/index';
$route['admin/alamat-instansi/data'] = 'alamat_instansi/alamat_instansi_data';
$route['admin/alamat-instansi/create'] = 'alamat_instansi/create';
$route['admin/alamat-instansi/store'] = 'alamat_instansi/store';
$route['admin/alamat-instansi/update'] = 'alamat_instansi/update';
$route['admin/alamat-instansi/edit/(:any)'] = 'alamat_instansi/edit/$1';
$route['admin/alamat-instansi/delete/(:any)'] = 'alamat_instansi/delete/$1';
$route['admin/alamat-instansi/(:any)'] = 'alamat_instansi/show/$1';