<?php

/**
*
*/
class Product extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $wt 							= 70;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'product';

	function index()
	{
		$this->data['content'] 		= 'admin/pages/product/view';
		$this->data['product'] 		= $this->product_model->get_product(
			array(
				'{PRE}'.'image.image_seq' => '0'
				)
			);
		$this->data['thumb_pre']	= $this->thumb_pre;
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function add()
	{
		$this->data['content'] 		= 'admin/pages/product/add';
		$this->data['category'] 	= $this->category_model->get();
		$this->data['brand'] 			= $this->brand_model->get();
		$this->data['color'] 			= $this->color_model->get();
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$rules 			= $this->product_model->rules;
		$alt 				= title_url($post['alt']);
		$link 			= title_url($post['name']);
		$dimension 	= $post['width'].', '.$post['height'];

		// $get_brand = $this->brand_model->get($post['brand']);

		$this->form_validation->set_rules('code','Product Code','required|is_unique[{PRE}product.product_code]');
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/product'));
		}

		else {
			$upload_image = $this->lawave_image->upload_images($this->modul_file, $this->image_input_name, $alt, $this->thumb_pre, $this->wt, $this->ht);

			$array_data['product_code'] 				= $post['code'];
			$array_data['category_id'] 					= $post['category'];
			$array_data['brand_id'] 						= $post['brand'];
			// $array_data['motif_id'] 						= $get_brand->motif_id;
			$array_data['color_id'] 						= $post['color'];
			// $array_data['statusprd_id'] 				= $post['status'];
			$array_data['product_name'] 				= $post['name'];
			// $array_data['product_desc'] 				= $post['desc'];
			$array_data['product_price'] 				= $post['price'];
			$array_data['product_price_strip'] 	= $post['strip'];
			$array_data['product_stock'] 				= $post['stock'];
			$array_data['product_weight'] 			= $post['weight'];
			$array_data['product_dimension'] 		= $dimension;
			$array_data['product_alt'] 					= $post['alt'];
			$array_data['product_link']					= $link;
			$array_data['product_seq']	  			= $post['page'];
			$array_data['product_discount']	    = $post['discount'];

			$product_id = $this->product_model->insert($array_data);

			// $this->brandcateg_model->insert(array('category_id' => $post['category'], 'brand_id' => $post['brand'], 'product_id' => $product_id));

			for ($i=0; $i < 7; $i++) {
				$array_img[] = array(
					'parent_id' 				=> $product_id,
					'image_parent_name'	=> 'product',
					'image_name' 				=> $upload_image[$i],
					'image_seq'					=> $i
					);
			}

			$this->image_model->insert($array_img, TRUE);

			$this->session->set_flashdata('success',$this->add_text);

			redirect(site_url('admin/product'));
		}
	}

	public function edit($id)
	{
		$where_img_index		= array('parent_id' => $id, 'image_parent_name' => 'product', 'image_seq' => 0);
		$where_img_banner		= array('parent_id' => $id, 'image_parent_name' => 'product', 'image_seq' => 1);
		$where_img					= array('parent_id' => $id, 'image_parent_name' => 'product');

		$this->data['content'] 		= 'admin/pages/product/edit';
		$this->data['product'] 		= $this->product_model->get($id);
		$this->data['image_index']= $this->image_model->get_by($where_img_index, NULL, NULL, TRUE);
		$this->data['image_banner']= $this->image_model->get_by($where_img_banner, NULL, NULL, TRUE);
		$this->data['image'] 			= $this->image_model->get_by($where_img);
		$this->data['thumb_pre']	= $this->thumb_pre;
		$this->data['category'] 	= $this->category_model->get();
		$this->data['brand'] 			= $this->brand_model->get();
		$this->data['color'] 			= $this->color_model->get();
		$this->data['motif'] 			= $this->motif_model->get();
		// $this->data['status'] 		= $this->statusprd_model->get();
		$this->data['dimension']	= explode(', ', $this->data['product']->product_dimension);
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$id 				= $post['id'];
		$where_img	= array('parent_id' => $id, 'image_parent_name' => 'product');
		$get_data 	= $this->product_model->get($id); // dapatkan data berdasarkan id
		$get_image 	= $this->image_model->get_by($where_img); // dapatkan data berdasarkan id
		$rules 			= $this->product_model->rules;	// dapatkan rules dari model
		$array_id 	= array('product_id' => $id);		// id untuk update berbentuk array
		$files 			= $_FILES[$this->image_input_name]['name'];
		$count_file = count($files);

		// $get_brand = $this->brand_model->get($post['brand']);

		$alt 				= title_url($post['alt']);
		$link 			= title_url($post['name']);
		$dimension 	= $post['width'].', '.$post['height'];

		$array_data['product_code'] 				= $post['code'];
		$array_data['category_id'] 					= $post['category'];
		$array_data['brand_id'] 						= $post['brand'];
		// $array_data['motif_id'] 						= $get_brand->motif_id;
		$array_data['color_id'] 						= $post['color'];
		// $array_data['statusprd_id'] 				= $post['status'];
		$array_data['product_name'] 				= $post['name'];
		// $array_data['product_desc'] 				= $post['desc'];
		$array_data['product_price'] 				= $post['price'];
		$array_data['product_price_strip'] 	= $post['strip'];
		$array_data['product_stock'] 				= $post['stock'];
		$array_data['product_weight'] 			= $post['weight'];
		$array_data['product_dimension'] 		= $dimension;
		$array_data['product_alt'] 					= $post['alt'];
		$array_data['product_link']					= $link;
		$array_data['product_seq']	  			= $post['page'];
		$array_data['product_discount']	    = $post['discount'];

		$is_unique = $this->product_model->unique_update($post['code'], $id, 'product_code');

		$this->form_validation->set_rules('code','Product Code','required'.$is_unique);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/product'));
		}

		else {
			// update data produk
			$this->product_model->update($array_data, $array_id);

			// $this->brandcateg_model->update(array('category_id' => $post['category'], 'brand_id' => $post['brand']), $array_id);

			// upload gambar baru
			$upload_image = $this->lawave_image->upload_images($this->modul_file, $this->image_input_name, $alt, $this->thumb_pre, $this->wt, $this->ht);

			// perulangan untuk update data gambar
			for ($i=0; $i < $count_file; $i++) {

				// array WHERE untuk update gambar berdasarkan id_gambar
				$id_img = array('image_id' => $post['id_image_'.$i]);

				// jika _file[image][name] tidak kosong
				if (!empty($post['delete_image_'.$i])) {
					die('kok gamasuk ya');
					$image 	= $this->image_model->get($post['id_image_'.$i]);
					// hapus gambar lama
					$this->lawave_image->delete_image($this->modul_file, $image->image_name, $this->thumb_pre);
					// array yang akan dikirim ke function update
					$array_img = array(
						'image_name' 	=> ''
						);
					// proses update gambar
					$this->image_model->update($array_img, $id_img); // insert_batch gambar
				}

				else if (!empty($files[$i])) {
					$image 	= $this->image_model->get($post['id_image_'.$i]);
					// hapus gambar lama
					$this->lawave_image->delete_image($this->modul_file, $image->image_name, $this->thumb_pre);
					// array yang akan dikirim ke function update
					$array_img = array(
						'image_name' 	=> $upload_image[$i]
						);
					// proses update gambar
					$this->image_model->update($array_img, $id_img); // insert_batch gambar
				}
			}

			$this->session->set_flashdata('success', $this->edit_text);
			redirect(site_url('admin/product'));
		}
	}

	public function delete($id)
	{
		$get_data 		= $this->product_model->get($id);
		// hapus gambar
		$where_image 	= array('parent_id' => $id);
		$image 	= $this->image_model->get_by($where_image);
		foreach ($image as $key => $image) {
			$this->lawave_image->delete_image($this->modul_file, $image->image_name, $this->thumb_pre);
		}

		// hapus data
		$this->product_model->delete($id);
		$this->image_model->delete_by($where_image);
		// $this->brandcateg_model->delete_by(array('product_id' => $id));
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/product'));
	}

	public function publish($id)
	{
		$array_id = array('product_id' => $id);

		$get_data = $this->product_model->get($id);

		if ($get_data->product_pub == '88') {
			$array_data['product_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['product_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->product_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/product'));
	}

	public function status($status, $id)
	{
		if ($status == 'bestseller') {
			$status_id = 1;
		}

		elseif ($status == 'popular') {
			$status_id = 2;
		}

		$get_data 	= $this->product_model->get($id);
		$array_stat = explode(',', $get_data->statusprd_id);

		if (status_product($get_data->statusprd_id, $status_id) == $status_id) {
			$diff = array_diff($array_stat, array($status_id));
			$fill = array_filter($diff);

			$data['statusprd_id'] = (!empty($fill)) ? implode(',', $fill) : '';

			$this->product_model->update($data, array('product_id' => $id));
			redirect(site_url('admin/product'));
		}

		else {
			$data['statusprd_id'] = $get_data->statusprd_id.','.$status_id.',';

			$this->product_model->update($data, array('product_id' => $id));
			redirect(site_url('admin/product'));
		}
	}

	public function ajax_brand()
	{
		$id 					= $this->input->post('dataID');
		$array_where 	= array('category_id' => $id);
		$get_data 		= $this->brand_model->get_by($array_where);
		$output 			= '<option disabled selected>No Brand</option>';

		if ($get_data) {
			$output = '<option disabled selected>Select Brand</option>';
			foreach ($get_data as $result) {
				$output .= '<option value="'.$result->brand_id.'">';
				$output .= ucwords($result->brand_name);
				$output .= '</option>';
			}
			echo $output;
		}
		else {
			echo $output;
		}
	}
}
