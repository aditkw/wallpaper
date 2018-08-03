<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['cara-belanja']		= 'cara';
$route['berita-event']		= 'berita';
$route['berita-event/(:any)']		= 'berita/baca/$1';
$route['tentang-kami']		= 'about';
$route['cara-order']		= 'cara';
$route['syarat-dan-ketentuan']		= 'sk';
