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


//banner
$route['admin/banner'] = 'Banner/index';
$route['admin/banner/data'] = 'Banner/banner_data';
$route['admin/banner/create'] = 'Banner/create';
$route['admin/banner/store'] = 'Banner/store';
$route['admin/banner/update'] = 'Banner/update';
$route['admin/banner/edit/(:any)'] = 'Banner/edit/$1';
$route['admin/banner/delete/(:any)'] = 'banner/delete/$1';
$route['admin/banner/(:any)'] = 'banner/show/$1';


//user
$route['home'] = 'Beranda';



// sub domain
$route['subdomain'] = 'subdomain/index_user';
$route['admin/subdomain'] = 'subdomain/index';
$route['admin/subdomain/data'] = 'subdomain/subdomain_data';
$route['admin/subdomain/create'] = 'subdomain/create';
$route['admin/subdomain/store'] = 'subdomain/store';
$route['admin/subdomain/update'] = 'subdomain/update';
$route['admin/subdomain/edit/(:any)'] = 'subdomain/edit/$1';
$route['admin/subdomain/delete/(:any)'] = 'subdomain/delete/$1';

// jabatan bupati
$route['bupatidarimasa'] = 'jabatanbupati/index_user';
$route['admin/jabatan-bupati'] = 'jabatanbupati/index';
$route['admin/jabatan-bupati/data'] = 'jabatanbupati/jabatan_bupati_data';
$route['admin/jabatan-bupati/create'] = 'jabatanbupati/create';
$route['admin/jabatan-bupati/store'] = 'jabatanbupati/store';
$route['admin/jabatan-bupati/update'] = 'jabatanbupati/update';
$route['admin/jabatan-bupati/edit/(:any)'] = 'jabatanbupati/edit/$1';
$route['admin/jabatan-bupati/delete/(:any)'] = 'jabatanbupati/delete/$1';
$route['admin/jabatan-bupati/(:any)'] = 'jabatanbupati/show/$1';

// galeri users
$route['galeri/foto'] = 'Galeri/index_foto_user';
$route['galeri/foto/(:any)'] = 'Galeri/detail_foto_user/$1';
$route['galeri/video'] = 'Galeri/index_video_user';
$route['galeri/video/(:any)'] = 'Galeri/detail_video_user/$1';

//galeri admin
$route['admin/galeri'] = 'Galeri/index';
$route['admin/galeri/data'] = 'Galeri/galeri_data';
$route['admin/galeri/create'] = 'Galeri/create';
$route['admin/galeri/store'] = 'Galeri/store';
$route['admin/galeri/edit/(:any)'] = 'Galeri/edit/$1';
$route['admin/galeri/update'] = 'Galeri/update';
$route['admin/galeri/(:any)'] = 'Galeri/show/$1';
$route['admin/galeri/media/data/(:any)'] = 'Galeri/galeri_media_data/$1';
$route['admin/galeri/media/store/(:any)/(:any)'] = 'Galeri/store_media/$1/$2';

// galeri users
$route['arsip/artikel'] = 'Artikel_berita/index_artikel_user';
$route['arsip/artikel/(:any)'] = 'Artikel_berita/detail_artikel_user/$1';
$route['arsip/berita'] = 'Artikel_berita/index_berita_user';
$route['arsip/berita/(:any)'] = 'Artikel_berita/detail_berita_user/$1';


//artikel berita admin
$route['admin/artikel_berita'] = 'Artikel_berita/index';
$route['admin/artikel_berita/data'] = 'Artikel_berita/artikel_berita_data';
$route['admin/artikel_berita/create'] = 'Artikel_berita/create';
$route['admin/artikel_berita/store'] = 'Artikel_berita/store';
$route['admin/artikel_berita/edit/(:any)'] = 'Artikel_berita/edit/$1';
$route['admin/artikel_berita/update'] = 'Artikel_berita/update';
$route['admin/artikel_berita/(:any)'] = 'Artikel_berita/show/$1';
$route['admin/artikel_berita/media/data/(:any)'] = 'Artikel_berita/artikel_berita_media_data/$1';
$route['admin/artikel_berita/media/store/(:any)/(:any)'] = 'Artikel_berita/store_media/$1/$2';

// kontak person
$route['admin/kontak'] = 'kontak/index';
$route['admin/kontak/data'] = 'kontak/kontak_data';
$route['admin/kontak/narahubung/store'] = 'kontak/save_narahubung';
$route['kontak'] = 'kontak/create';
$route['kontak/store'] = 'kontak/store';
$route['admin/kontak/delete/(:any)'] = 'kontak/delete/$1';
$route['admin/kontak/(:any)'] = 'kontak/show/$1';

$route['arsip/koranPaswara'] = 'media_cetak/index_user';

//media cetak admin
$route['admin/media_cetak'] = 'media_cetak/index';
$route['admin/media_cetak/data'] = 'media_cetak/media_cetak_data';
$route['admin/media_cetak/create'] = 'media_cetak/create';
$route['admin/media_cetak/store'] = 'media_cetak/store';
$route['admin/media_cetak/edit/(:any)'] = 'media_cetak/edit/$1';
$route['admin/media_cetak/update'] = 'media_cetak/update';
$route['admin/media_cetak/(:any)'] = 'media_cetak/show/$1';
//tampilan media cetak user
$route['media_cetak/arsip/paswara'] = 'media_cetak/index_user';

//laporan admin
$route['admin/laporan'] = 'laporan/index';
$route['admin/laporan/data'] = 'laporan/laporan_data';
$route['admin/laporan/create'] = 'laporan/create';
$route['admin/laporan/store'] = 'laporan/store';
$route['admin/laporan/edit/(:any)'] = 'laporan/edit/$1';
$route['admin/laporan/update'] = 'laporan/update';
$route['admin/laporan/(:any)'] = 'laporan/show/$1';
//jenis laporan admin
$route['admin/laporan/jenis/index'] = 'laporan/index_jenis';
$route['admin/laporan/jenis/data'] = 'laporan/jenis_data';
$route['admin/laporan/jenis/store'] = 'laporan/store_jenis';
$route['admin/laporan/jenis/edit/(:any)'] = 'laporan/edit_jenis/$1';
$route['admin/laporan/jenis/update'] = 'laporan/update_jenis';

//laporan user
$route['laporan/arsip/(:any)'] = 'laporan/index_user/$1';


//kegiatan admin
$route['admin/kegiatan'] = 'kegiatan/index';
$route['admin/kegiatan/create'] = 'kegiatan/create';
$route['admin/kegiatan/store'] = 'kegiatan/store';
$route['admin/kegiatan/data'] = 'kegiatan/kegiatan_data';
$route['admin/kegiatan/edit/(:any)'] = 'kegiatan/edit/$1';
$route['admin/kegiatan/update'] = 'kegiatan/update';
$route['admin/kegiatan/(:any)'] = 'kegiatan/show/$1';
//kegiatan user
$route['arsip/kegiatan'] = 'kegiatan/index_user';
$route['arsip/kegiatan/(:any)'] = 'kegiatan/detail_kegiatan/$1';