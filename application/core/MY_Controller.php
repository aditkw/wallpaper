<?php

/*-----------------*/
/*
* CLASS UTAMA MY_CONTROLLER
*/
/*-----------------*/
class MY_Controller extends CI_Controller
{
	/*-----------------*/
	/*
	*	DIRECTORY_SEPARATOR membaca separator path sesuai OS yang digunakan | digunakan ketika meload file gambar dari path
	* @thumb_pre = preffix name / nama depan yang dihunakan untuk thumbnail yg dibuat dari gambar yang diupload | digunakan ketika proses upload dan pada atribut src dalam tag img <img src>
	*	@img_path = lokasi utama penyimpanan gambar yang diupload | digunakan ketika upload dan menampilkan file gambar
	*	@file_path = lokasi utama penyimpanan file / dokumen yang diupload | digunakan ketika upload dan menampilkan file gambar
	*/
	/*-----------------*/
	const DS 										= DIRECTORY_SEPARATOR;
	protected $thumb_pre 				= 'thumb-';
	protected $img_path 				= 'uploads/img/';
	protected $file_path 				= 'uploads/files/';

	/*-----------------*/
	/*
	*	@invoice_site = kode awal untuk membuat invoice | digunakan ketika input transaksi di controller > transaksi
	*	@origin_type = menentukan kota (city) atau kecamatan (subdistrict) sebagai awal lokasi pengiriman. hanya bernilai city atau subdistrict | digunakan setiap memanggil fungsi dari library lawave_shipment
	* @origin_code = kode lokasi awal pengiriman, berupa kode kota (city) atau kode kecamatan (subdistrict). tergantung dari @origin_type yang digunakan | digunakan setiap memanggil fungsi dari library lawave_shipment
	*	@destination_type =  menentukan kota (city) atau kecamatan (subdistrict) sebagai lokasi tujuan pengiriman. hanya bernilai city atau subdistrict | digunakan setiap memanggil fungsi dari library lawave_shipment
	*	@courier = kurir yang ingin disediakan sebagai pilihan jasa pengiriman | digunakan setiap memanggil fungsi dari library lawave_shipment
	*	@service = menampilkan service yang ingin disediakan dari jasa pengiriman. | digunakan setiap melakukan pengulangan (foreach) untuk menampilkan paket pengiriman
	*/
	/*-----------------*/
	protected $invoice_site = 'erakomp';
	protected $origin_type = 'city';
	protected $origin_code = '152';
	protected $destination_type = 'subdistrict';
	protected $courier = 'jne:tiki'; // jne:tiki:pos:rpx:esl:pcp:pandu:wahana:sicepat:jnt:pahala:cahaya:sap:jet:indah:dse:slis:first
	protected $service = array('OKE','SPS','REG','YES','ECO','ONS','SDS','HDS');

	/*-----------------*/
	/*
	* SUBJECT EMAIL | DIGUNAKAN KETIKA MENGIRIM EMAIL
	*	@customer_order = untuk customer ketika melakukan order
	*	@customer_delivery = untuk customer ketika pesanan sudah dalam proses pengiriman
	* @admin_order = untuk admin ketika ada order baru
	*	@admin_confirm = untuk admin ketika customer telah melakukan konfirmasi pembayaran
	*	@admin_accept = untuk admin ketika barang yang dikirim telah diterima oleh customer
	*/
	/*-----------------*/
	protected $customer_order = 'Pesanan anda | Erakomp.com';
	protected $customer_delivery = 'Pesanan anda dalam pengiriman | Erakomp.com';
	protected $customer_register = 'Varifikasi akun | Erakomp.com';
	protected $customer_forgot = 'Varifikasi akun | Erakomp.com';

	protected $admin_order = 'Pesanan baru | Erakomp.com';
	protected $admin_confirm = 'Konfirmasi pembayaran baru | Erakomp.com';
	protected $admin_accept = 'Pesanan telah diterima | Erakomp.com';
	protected $admin_register = 'Member baru | Erakomp.com';
	protected $to_admin = TRUE;
	protected $to_customer = TRUE;

	/*-----------------*/
	/*
	* PARENT UTAMA MY_CONTROLLER
	*	SEMUA YANG AKAN DITAMPILKAN DI FRONT-END DAN JUGA BACK-END DAPAT DIDEKLARASIKAN DISINI
	*/
	/*-----------------*/
	public function __construct()
	{
		parent::__construct();

		/*-----------------*/
		/*
		* meload model yang dibutuhkan
		*/
		/*-----------------*/
		$this->load->model(
			array(
				'about_model',
				'howto_model',
				'category_model',
				'subcat_model',
				'bank_model',
				'user_model',
				'contact_model',
				'term_model',
				'faq_model',
				'shipment_model',
				'statusprd_model',
				'product_model',
				'banner_model',
				'slide_model',
				'login_model',
				'image_model',
				'site_model',
				'seo_model',
				'member_model',
				'reason_model',
				'tag_model',
				'articlecat_model',
				'article_model',
				'brand_model',
				'province_model',
				'city_model',
				'order_model',
				'transaction_item_model',
				'transaction_model',
				'payment_model',
				'sample_model'
			)
		);

		/*-----------------*/
		/*
		* mendeklarasikan uri-segment ke 1 sampai ke 3 yang biasa digunakan di back-end maupun front-end
		*/
		/*-----------------*/
		$this->data['uri_1'] = $this->uri->segment(1);
		$this->data['uri_2'] = $this->uri->segment(2);
		$this->data['uri_3'] = $this->uri->segment(3);
		/*kirim base-url*/
		$this->data['base_url'] = base_url();
		$this->data['site_url'] = site_url();
		/*contact*/
		$this->data['contact'] = $this->contact_model->get(1);
		/*general_site*/
		$this->data['site'] = $this->site_model->get(1);
		/*session cart*/
	}
}

/*-----------------*/
/*
* CLASS UTAMA FRONT-END YANG MENGINDUK PADA MY_CONTROLLER
*	SEMUA CLASS FRONT-END MENGINDUK PADA CLASS INI
*	ELEMEN YANG AKAN SELALU DITAMPILKAN DI FRONT-END (HANYA DI FRONT-END) DAPAT DIDEKLARASIKAN DISINI
*/
/*-----------------*/
class Frontend_Controller extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		/*-----------------*/
		/*
		*	@where_product = syarat untuk menapilkan produk. array ini menghasilkan nilai where dengan kondisi join, karena dalam model product (product_model) query yang dihasilkan merupakan query yang telah menggunakan join. ex: WHERE lwd_product.product_pub = '99'.
		*	@where_count_product = syarat untuk menhitung jmlah baris dalam tabel produk. array ini menghasilkan nilai where. ex: WHERE product_pub = '99'.
		*	@sort = bernilai array tanpa value. sort akan digunakan (dibawah) untuk malakukan sortir berdasarkan harga dan id (lama / baru)
		*	@like_product = bernilai array tanpa value. akan digunakan untuk menampilkan produk berdasarkan pencarian nama produk.
		*	@http_build = membangun url $_get
		*	@member_access = digunakan untuk mengakses halaman member-area jika bernilai TRUE
		*	@cart_session = membungkus fungsi $this->session->userdata['cart'] jika sudah tersedia. session ini dibuat di controller > keranjang | digunakan sebagai session keranjang belanja
		*	@cart_count = untuk menghitung jumlah item yang dibeli berdasarkan cart_session
		*	cart_product_session = digunakan untuk menampung id_product yg telah diorder berdasarkan cart_session
		*/
		/*-----------------*/
		$this->where_product['{PRE}product.product_pub'] 	= '99';
		$this->where_product['{PRE}image.image_seq'] 			= '0';
		$this->where_count_product['product_pub']					= '99';
		$this->sort 																			= array();
		$this->like_product																= array();
		$this->like_count_product													= array();
		$http_build																				= array();
		$this->member_access 															= FALSE;
		$cart_session																			= '';
		$cart_count																				= '';
		$cart_product_session															= '';

		/*-----------------*/
		/*
		*	cek session keranjang
		*	deklarasi cart_session, cart_count dan cart_product_session jika session cart telah ada
		*	@cart_product_session = mengganti @product_id yang berupa array, menjadi string
		*/
		/*-----------------*/
		if (!empty($this->session->userdata('cart'))) {
			$cart_session 				= $this->session->userdata('cart');
			$cart_count						= $this->order_model->count(array('order_no' => $cart_session));
			$get_product 					=	$this->order_model->get_by(array('order_no' => $cart_session));

			$product_id 					= array();
			foreach ($get_product as $value) {
				$product_id[] = $value->product_id;
			}

			$cart_product_session 	= ','.implode(',', $product_id).',';
		}

		/*-----------------*/
		/*
		*	cek login member
		*	jika member_sesion tersedia, maka $member_id bernilai session member_session
		*	jika tidak, maka bernilai null
		*/
		/*-----------------*/
		$member_id = (!empty($this->session->userdata('member_session')))
			?
				($this->encrypt->decode(hash_link_decode($this->session->userdata('member_session'))))
					:
						NULL;

		/*-----------------*/
		/*
		*	jika @member_id tersedia, maka perikas semua session member, yaitu
		*	is_login_member harus TRUE
		*	@member_name harus tersedia
		*	@member_email harus tersedia
		*	@member_id yang telah didekripsi / decode harus sesuai dengan data member_id pada tabel member
		*	@get_member = mengambil data member sesuai id
		*/
		/*-----------------*/
		if ($member_id != NULL) {
			$get_member = $this->member_model->get($member_id);

			$this->member_access = (
				$this->session->userdata('is_login_member') == TRUE
					&& !empty($this->session->userdata('member_name'))
						&& !empty($this->session->userdata('member_email'))
							&& $member_id === $get_member->member_id)
				?
					TRUE
						:
							FALSE ;

			/*Semua yang dideklarasikan berikut ini, akan tersedia ketika @member_id tidak bernilai NULL*/
			$this->member_active = ($get_member->member_block == 'active') ? TRUE : FALSE;
			$this->member_city_selected					= $get_member->city_id;
			$this->member_district_selected			= $get_member->district_id;
			$this->data['member_sesion']	 			= $this->session->userdata('member_session');
			$this->data['member_city']					= $this->city_model->get_by(array('province_id' => $get_member->province_id));
			$this->data['member_district']			= $this->lawave_shipment->subdistrict($get_member->city_id);
		}

		/*Where & Count Array*/
		if (!empty($_GET['brand'])) {
			$get_brand = $this->brand_model->get_by(array('brand_link' => $_GET['brand']), NULL, NULL, TRUE);
			/*pencarian sesuai brand*/
			$this->where_product['{PRE}product.brand_id'] 		= $get_brand->brand_id;
			$this->where_count_product['brand_id']						= $get_brand->brand_id;
			/*http $_get yang dibangun dari link brand */
			$http_build['brand']															= $_GET['brand'];
		}

		if (!empty($_GET['cari'])) {
			/*prncarian berdasarkan kata pencarian*/
			$this->like_product['{PRE}product.product_name'] 	= $_GET['cari'];
			$this->like_count_product['product_name']					= $_GET['cari'];
			$http_build['cari']																= $_GET['cari'];
		}

		if (!empty($_GET['sort'])) {
			/*sortir produk berdasarkan $_GET['sort']*/
			if ($_GET['sort'] == 'terbaru') {
				$this->sort 	= array('product_id' => 'ASC');
			}

			if ($_GET['sort'] == 'terlama') {
				$this->sort 	= array('product_id' => 'DESC');
			}

			if ($_GET['sort'] == 'termahal') {
				$this->sort 	= array('product_price' => 'DESC');
			}

			if ($_GET['sort'] == 'termurah') {
				$this->sort 	= array('product_price' => 'ASC');
			}
			/*membuat http $_get sort*/
			$http_build['sort']		= $_GET['sort'];
		}

		/*pengaturan metadata*/
		/*jika uri-1 tidak tersedia, maka gunakan data general_site untuk mengisi meta data*/
		if (empty($this->data['uri_1'])) {
			$this->data['metadata_site'] = $this->site_model->get(1);
		}

		else {
			/*jika uri-1 tersedia dan nilai dari uri-1 terdapad dalam table seo->seo_page*/
			/*maka metadata menggunakan data dari seo*/
			$count_seo = $this->seo_model->count(array('seo_page' => $this->data['uri_1']));

			if ($count_seo > 0) {
				$this->data['metadata_seo'] = $this->seo_model->get_by(array('seo_page' => $this->data['uri_1']), 1, NULL, TRUE);
			}

			else {
				$this->data['metadata_site'] = $this->site_model->get(1);
			}
		}

		/*data yang dikirim kesitiap load->view*/

		/*invoice*/
		$this->data['invoice_no'] 						= $this->invoice_site.$cart_session;
		$this->data['cart_session']						= $cart_session;
		$this->data['cart_count']							= $cart_count;
		$this->data['cart_product']						= $cart_product_session;
		/*provinsi dan kota*/
		$this->data['province']								= $this->province_model->get();
		$this->data['city']										= $this->city_model->get();
		/*akses member*/
		$this->data['member_access']					= $this->member_access;
		/*hasil dari $http_build*/
		$this->data['http_result']						= http_build_query($http_build);
		/*bagian side halaman*/
		$this->data['side_member']						= 'component/sidebar-member';
		$this->data['categories'] 						= $this->category_model->get_by(array('category_pub' => '99'));
		$this->data['side_category']					= $this->category_model->get_by(array('category_pub' => '99'));
		$this->data['side_brand']							= $this->brand_model->get_by(array('brand_pub' => '99'));
	}
}

class Backend_Controller extends MY_Controller
{
	protected $delete_text 			= 'Data has been removed.';
	protected $add_text 				= 'Data has been added.';
	protected $edit_text 				= 'Data has been updated.';
	protected $publish_text			= 'Data has been published.';
	protected $unpublish_text		= 'Data unpublished.';
	protected $block_text				= 'Member has been disabled.';
	protected $unblock_text			= 'Member enabled.';
	protected $pass_inc_text 		= 'Incorrect old password.';
	protected $too_large_text 	= 'Image is too large.';

	public function __construct()
	{
		parent::__construct();
		/*count member*/
		$this->data['count_all_member'] = $this->member_model->count() - 1;
		$this->data['count_new_member'] = $this->member_model->count(array('member_status' => 'unverified'));
		$this->data['count_bl_member'] 	= $this->member_model->count(array('member_block' => 'block'));

		/*count transaction*/
		$this->data['count_all_trans'] = $this->transaction_model->count();
		$this->data['count_new_trans'] = $this->transaction_model->count(array('trans_status_id' => 1));
		$this->data['count_confirm_trans'] 	= $this->transaction_model->count(array('trans_status_id' => 2));
		$this->data['count_delivery_trans'] = $this->transaction_model->count(array('trans_status_id' => 3));
		$this->data['count_close_trans'] 	= $this->transaction_model->count(array('trans_status_id' => 4));
		$this->data['count_cancel_trans'] = $this->transaction_model->count(array('transaction_cancel' => '99'));
		$this->data['count_report'] = $this->payment_model->count(array('payment_status' => '99'));

		/*array active menu = digunakan untuk menentukan menu utama yang aktif ketika halaman / modul tertentu dibuka */
		$this->data['menu'] = array(
			'content' => array('about', 'contact', 'service', 'social-media', 'term-and-condition', 'faq', 'bank', 'shipment', 'how-to-buy', 'howto' ),
			'profile' => array('about', 'contact' ),
			'article' => array('tag', 'article-category', 'article'),
			'product' => array('category', 'sub-category', 'brand', 'subcat', 'product', 'product-status', 'statusprd'),
			'transaction' => array('transaction-detail', 'order', 'confirm', 'delivery', 'close', 'canceled', 'report'),
			'member' => array('member'),
			'misscellaneous' => array('slide', 'banner', 'video'),
			'seo' => array('seo', 'site')
			);

		/*Akses User/Admin*/
		is_logged_in();
	}
}
