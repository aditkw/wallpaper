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
$route['default_controller'] 		= 'welcome';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 	= FALSE;

/* BACK END */
$route['admin'] 										= 'admin/dashboard';
$route['admin/term-and-condition'] 	= 'admin/term';
$route['admin/sample-modul'] 	= 'admin/sample';
$route['admin/sub-category'] 				= 'admin/subcat';
$route['admin/product-status'] 			= 'admin/statusprd';
$route['admin/how-to-buy'] 					= 'admin/howto';
$route['admin/article-category'] 		= 'admin/articlecat';
$route['admin/transaction/report/(:any)'] 		= 'admin/transaction/report/$1';
$route['admin/transaction/transaction-detail/(:any)/(:any)'] 		= 'admin/transaction/detail/$1/$2';
$route['admin/transaction/invoice-print/(:any)'] 		= 'admin/transaction/invoice/$1';
$route['admin/transaction/invoice-print/(:any)/(:any)'] 		= 'admin/transaction/invoice/$1/$2';
$route['logout'] 										= 'login/logout';


/* FRONT END */
$route['produk/(:num)'] 			= 'produk/index/$1';
$route['produk/(:any)'] 			= 'produk/kategori/$1';
$route['produk/(:any)/(:num)']= 'produk/kategori/$1';
$route['produk/(:any)/(:any)']= 'produk/kategori/$1/$2';
$route['produk/(:any)/(:any)/(:num)']= 'produk/kategori/$1/$2';
$route['member-login']				= 'member/login';
$route['registrasi']					= 'member/registrasi';
$route['member-area']					= 'member/index';
$route['member-area/profile']	= 'member/profile';
$route['member-area/transaksi']	= 'member/transaksi';
$route['member-area/transaksi/(:any)']	= 'member/transaksi/$1';
$route['member-logout']				= 'member/logout';
$route['keranjang-belanja']		= 'keranjang';
$route['keranjang-checkout']	= 'keranjang/checkout';
$route['pilih-pengiriman']		= 'keranjang/shipment';
$route['konfirmasi-pembayaran']		= 'konfirmasi';
$route['hubungi-kami']		= 'kontak';
$route['cara-order']		= 'cara';
$route['syarat-dan-ketentuan']		= 'sk';
