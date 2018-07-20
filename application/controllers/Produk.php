<?php

/**
*
*/
class Produk extends Frontend_Controller
{

	function index()
	{
		redirect(site_url());
	}

	public function kategori($category, $brand=NULL)
	{
		$get_category = $this->category_model->get_by(array('category_link' => $category), NULL, NULL, TRUE);
		$row_data			=	$this->category_model->count(array('category_link' => $category));

		/*Antisipasi parameter tidak tersedia*/
		if ($category == NULL) redirect(site_url());

		elseif ($brand == NULL) {
			$where_brand['category_link'] = $category;
			isset($_GET['motif']) ? $where_brand['motif_link'] = $_GET['motif'] : '';
			isset($_GET['tampil']) ? $tampil = $_GET['tampil'] : $tampil = 8;

			$url 				= 'produk/'.$this->uri->segment(2);
			$num_rows		=	$this->brand_model->count_brand($where_brand);
			$per_page 	= $tampil;
			$num_links	= 2;

			$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);

			/*konfigurasi nilai offset dan informasi halaman*/
			$on_page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
			$offset 	= ($on_page - 1) * $per_page;
			$num_page	= ceil($num_rows/$per_page);

			$this->data['num_rows']		= $num_rows;
			$this->data['on_page']		= $on_page;
			$this->data['num_page']		= $num_page;
			$this->data['pagination'] = $this->pagination->create_links();

			$this->data['brand_item'] = $this->brand_model->get_brand(
				$where_brand,
				$per_page,
				$offset,
				FALSE,
				NULL,
				NULL,
				$this->sort_brand
			);

			$this->data['motif'] = $this->motif_model->get();
			$this->data['content'] 		= 'pages/product/view';
		}

		else {
			$get_brand = $this->brand_model->get_by(array('brand_link' => $brand), null, null, true);
			if(!$get_brand && $brand!='all') redirect(site_url());

			if ($brand == 'all') {
				$where_product = array('image_parent_name' => 'product', 'image_seq' => '0');
			}else {
				$where_product = array('brand_link' => $brand, 'image_parent_name' => 'product', 'image_seq' => '0');
			}
			$this->data['brands'] = $this->brand_model->get_brand(array('category_link' => $category));
			$this->data['motif'] = $this->motif_model->get();
			$this->data['color'] = $this->color_model->get();
			$this->data['brand'] = $this->brand_model->get_brand(array('brand_link' => $brand), NULL, NULL, TRUE);

			isset($_GET['tampil']) ? $tampil = $_GET['tampil'] : $tampil = 9;

			$id_color = array();
			$num_color = 0;
			if(isset($_GET['color'])){
				$get_color = $_GET['color'];
				if (strpos($get_color, ',') !== false) {
					$ex_color = explode(',', $get_color);
					$j=0;
					foreach ($ex_color as $ex)
				  {
						$id_color[] = $this->color_model->get_by(array('color_link' => $ex), 1, NULL, TRUE);
						$num_color += $this->product_model->count_product(array('color_id' => $id_color[$j]->color_id, 'brand_link' => $brand, 'image_parent_name' => 'product', 'image_seq' => 0));
						$j++;
					}

				}else {
					$color = $this->color_model->get_by(array('color_link' => $get_color), 1, NULL, TRUE);
					if ($color)
						$where_product['{PRE}product.color_id ='] 	= $color->color_id;
				}
			}

			if (!empty($_GET['from']) OR !empty($_GET['to'])) {
				/*prncarian berdasarkan harga*/
				if(!empty($_GET['from'])){
					$from = $_GET['from'];
					$where_product['{PRE}product.product_price >='] 	= $from;
				}
				if(!empty($_GET['to'])) {
					$to = $_GET['to'];
					$where_product['{PRE}product.product_price <='] 	= $to;
				}
			}

			($num_color) ? $num = $num_color : $num = $this->product_model->count_product($where_product);

			$url 				= 'produk/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
			$num_rows		=	$num;
			$per_page 	= $tampil;
			$num_links	= 2;

			$this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);

			/*konfigurasi nilai offset dan informasi halaman*/
			$on_page 	= ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
			$offset 	= ($on_page - 1) * $per_page;
			$num_page	= ceil($num_rows/$per_page);

			$this->data['num_rows']		= $num_rows;
			$this->data['on_page']		= $on_page;
			$this->data['num_page']		= $num_page;
			$this->data['pagination'] = $this->pagination->create_links();

			$this->data['banner'] = $this->product_model->get_product(array('brand_link' => $brand, 'image_parent_name' => 'product', 'image_seq' => '1'), NULL, NULL, FALSE, 'image_name');

			$this->data['product'] = $this->product_model->get_product(
				$where_product,
				$per_page,
				$offset,
				FALSE,
				NULL,
				NULL,
				NULL,
				$id_color
			);

			$this->data['content'] 		= 'pages/product/brand';
		}

		// elseif ($row_data < 1) {
		// 	redirect(site_url('produk'));
		// }


		$this->load->view('index', $this->data);
	}

	public function detail($code, $link)
	{
		$get_data 	= $this->product_model->get_by(array('product_code' => $code, 'product_link' => $link), NULL, NULL, TRUE);

		if (empty($get_data->product_id)) {
			redirect(site_url());
		}

		// else {
			$where_img					= array('parent_id' => $get_data->product_id, 'image_parent_name' => 'product');

			$this->data['content'] 		= 'pages/product/detail';
			$product = $this->product_model->get_product(
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
			$this->data['product']						= $product;
			$this->data['product_image'] 			= $this->image_model->get_by($where_img, 5, 2);
			$this->data['products']						= $this->product_model->get_product(
				array(
					'{PRE}'.'product.brand_id' => $get_data->brand_id,
					'{PRE}'.'product.product_pub' => '99',
					'{PRE}'.'image.image_seq' 		=> '0'
					)
				);

			$this->load->view('index', $this->data);
		// }
	}
}
