<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['berita'] = 'home/berita';
$route['about'] = 'home/about';
$route['blank'] = 'home/blank';
$route['admin/add_content'] = 'menu/index';
$route['artikel/(:any)'] = 'home/artikel/$1';
$route['tentang'] = 'home/tentang';
$route['acara'] = 'home/acara';
$route['kategori/(:any)'] = 'home/kategori/$1';
$route['cari'] = 'home/cari';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
