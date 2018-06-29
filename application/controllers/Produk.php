<?php

/**
*
*/
class Produk extends Frontend_Controller
{

	function index()
	{
		/*Konfigurasi pagination*/
		/*URL, digunakan untuk base url pagination*/
		/*num_rows, banyak nya jumlah record yang akan ditampilkan*/
		/*per_page, jumlah records yang ditampilkan per halaman*/
		/*num_link, banyaknya link yang ditampilkan sebelum dan sesudah link aktif*/
		$url 				= $this->uri->segment(1);
		$num_rows		=	$this->product_model->count_product($this->where_count_product, $this->like_count_product);
		$per_page 	= 4;
		$num_links	= 2;

		$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);
		/*pagination($url = NULL, $num_rows = NULL, $per_page = NULL, $num_links = NULL)*/

		/*konfigurasi nilai offset dan informasi halaman*/
		$on_page 	= ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
		$offset 	= ($on_page - 1) * $per_page;
		$num_page	= ceil($num_rows/$per_page);

		$this->data['content'] 		= 'pages/product/view';

		/*data[num_rows, on_page, num_page], digunakan untuk kebutuhan informasi halaman*/
		$this->data['num_rows']		= $num_rows;
		$this->data['on_page']		= $on_page;
		$this->data['num_page']		= $num_page;
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['product']		= $this->product_model->get_product(
			$this->where_product,
			$per_page,
			$offset,
			FALSE,
			NULL,
			$this->like_product,
			$this->sort
			);

		$this->load->view('index', $this->data);
	}

	public function kategori($category)
	{
		$get_category = $this->category_model->get_by(array('category_link' => $category), NULL, NULL, TRUE);
		$row_data			=	$this->category_model->count(array('category_link' => $category));

		/*Antisipasi parameter tidak tersedia*/
		if ($category == NULL) {
			redirect(site_url('produk'));
		}

		elseif ($row_data < 1) {
			redirect(site_url('produk'));
		}

		$this->where_product['{PRE}product.category_id'] 	= $get_category->category_id;
		$this->where_count_product['category_id'] 				= $get_category->category_id;

		$url 				= 'produk/kategori/'.$this->uri->segment(3);
		$num_rows		=	$this->product_model->count_product($this->where_count_product, $this->like_count_product);
		$per_page 	= 4;
		$num_links	= 2;

		$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);
		/*pagination($url = NULL, $num_rows = NULL, $per_page = NULL, $num_links = NULL)*/

		/*konfigurasi nilai offset dan informasi halaman*/
		$on_page 	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$offset 	= ($on_page - 1) * $per_page;
		$num_page	= ceil($num_rows/$per_page);

		$this->data['content'] 		= 'pages/product/view';
		$this->data['num_rows']		= $num_rows;
		$this->data['on_page']		= $on_page;
		$this->data['num_page']		= $num_page;
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['category']		= $this->category_model->get($get_category->category_id);
		$this->data['product']		= $this->product_model->get_product(
			$this->where_product,
			$per_page,
			$offset,
			FALSE,
			NULL,
			$this->like_product,
			$this->sort
			);

		$this->load->view('index', $this->data);
	}

	public function brand($brand)
	{
		$get_brand 	= $this->brand_model->get_by(array('brand_link' => $brand), NULL, NULL, TRUE);

		$this->where_product['{PRE}product.brand_id'] 	= $get_brand->brand_id;
		$this->where_count_product['brand_id']					= $get_brand->brand_id;

		$url 				= 'produk/brand/'.$this->uri->segment(3);
		$num_rows		=	$this->product_model->count_product($this->where_count_product, $this->like_count_product);
		$per_page 	= 4;
		$num_links	= 2;

		$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);
		/*pagination($url = NULL, $num_rows = NULL, $per_page = NULL, $num_links = NULL)*/

		/*konfigurasi nilai offset dan informasi halaman*/
		$on_page 	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$offset 	= ($on_page - 1) * $per_page;
		$num_page	= ceil($num_rows/$per_page);

		$this->data['content'] 		= 'pages/product/view';

		/*data[num_rows, on_page, num_page], digunakan untuk kebutuhan informasi halaman*/
		$this->data['num_rows']		= $num_rows;
		$this->data['on_page']		= $on_page;
		$this->data['num_page']		= $num_page;
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['brand']			= $this->brand_model->get($get_brand->brand_id);
		$this->data['product']		= $this->product_model->get_product(
			$this->where_product,
			$per_page,
			$offset,
			FALSE,
			NULL,
			$this->like_product,
			$this->sort
			);

		$this->load->view('index', $this->data);
	}

	public function detail($code, $link)
	{
		$get_data 	= $this->product_model->get_by(array('product_code' => $code, 'product_link' => $link), NULL, NULL, TRUE);

		if (empty($get_data->product_id)) {
			redirect(site_url('produk'));
		}

		else {
			$where_img					= array('parent_id' => $get_data->product_id, 'image_parent_name' => 'product');

			$this->data['content'] 		= 'pages/product/detail';
			$this->data['product']		= $this->product_model->get_product(
				array(
					'{PRE}'.'product.product_code' 	=> $code,
					'{PRE}'.'product.product_link' 	=> $link,
					'{PRE}'.'product.product_pub' 	=> '99',
					'{PRE}'.'image.image_seq' 			=> '0'
					),
				NULL,
				NULL,
				TRUE
				);
			$this->data['products']		= $this->product_model->get_product(
				array(
					'{PRE}'.'product.category_id' => $get_data->category_id,
					'{PRE}'.'product.product_pub' => '99',
					'{PRE}'.'image.image_seq' 		=> '0'
					)
				);

			$this->load->view('index', $this->data);
		}
	}
}
