<?php

/**
*
*/
class Brand extends Backend_Controller
{
	protected $max_size					= 1024 * 2048;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'brand';

	function index()
	{
		$this->data['content'] 	= 'admin/pages/brand/view';
		$this->data['brand'] 		= $this->brand_model->get_brand();
		$this->data['category']	= $this->category_model->get();
		$this->data['motif']  	= $this->motif_model->get();
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post = $this->input->post();

		$array_data['category_id'] = $post['category'];
		$array_data['motif_id'] = $post['motif'];
		$array_data['brand_name'] = $post['name'];
		$array_data['brand_price'] = $post['price'];
		$array_data['brand_price_strip'] = $post['price_strip'];
		$array_data['brand_discount'] = $post['discount'];
		$array_data['brand_size'] = $post['size'];
		$array_data['brand_weight'] = $post['weight'];
		$array_data['brand_launch'] = $post['launch'];
		$array_data['brand_link'] = title_url($post['name']);

		$this->form_validation->set_rules('name', 'Brand Name', 'required|is_unique[lwd_brand.brand_name]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/brand'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($too_large_text, '-1');
				}

				else{
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));

					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->width_thumbnail,$this->height_thumbnail)
						->save_pa($this->thumb_pre,'');

					$array_data['brand_image'] 	= $upload_image['image']['file_name'];

					$this->brand_model->insert($array_data);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/brand'));
				}
			}

			else {
				$this->brand_model->insert($array_data);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/brand'));
			}
		}
	}

	public function update()
	{
		$post 						= $this->input->post();
		$id								= $post['id'];
		$rules 						= $this->brand_model->rules;
		$get_data 				= $this->brand_model->get($id);
		$array_id 				= array('brand_id' => $id);

		$array_data['category_id'] = $post['category'];
		$array_data['motif_id'] = $post['motif'];
		$array_data['brand_name'] = $post['name'];
		$array_data['brand_price'] = $post['price'];
		$array_data['brand_price_strip'] = $post['price_strip'];
		$array_data['brand_discount'] = $post['discount'];
		$array_data['brand_size'] = $post['size'];
		$array_data['brand_weight'] = $post['weight'];
		$array_data['brand_launch'] = $post['launch'];
		$array_data['brand_link'] = title_url($post['name']);

		$is_unique = $this->brand_model->unique_update($post['name'], $id, 'brand_name');

		$this->form_validation->set_rules('name', 'brand Name', 'required'.$is_unique);
		// $this->form_validation->set_rules('desc', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/brand'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($too_large_text, '-1');
				}

				else{
					$this->lawave_image->delete_image($this->modul_file, $get_data->brand_image, $this->thumb_pre);
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
					// image moo
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->width_thumbnail,$this->height_thumbnail)
						->save_pa($this->thumb_pre,'');

					$array_data['brand_image'] = $upload_image['image']['file_name'];

					$this->brand_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/brand'));
				}
			}

			else {
				$this->brand_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/brand'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->brand_model->get($id);

		$this->brand_model->delete($id);
		$this->session->set_flashdata('success', $this->delete_text);

		redirect(site_url('admin/brand'));
	}

	public function publish($id)
	{
		$array_id = array('brand_id' => $id);

		$get_data = $this->brand_model->get($id);

		if ($get_data->brand_pub == '88') {
			$array_data['brand_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['brand_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->brand_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/brand'));
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->brand_model->get_brand(array('brand_id' => $id),1,NULL,TRUE);

		$this->data['id'] 	= $get_data->brand_id;
		$this->data['name'] = $get_data->brand_name;
		$this->data['category'] = $get_data->category_id;
		$this->data['motif'] = $get_data->motif_id;
		$this->data['price'] = $get_data->brand_price;
		$this->data['price_strip'] = $get_data->brand_price_strip;
		$this->data['discount'] = $get_data->brand_discount;
		$this->data['size'] = $get_data->brand_size;
		$this->data['launch'] = $get_data->brand_launch;
		$this->data['weight'] = $get_data->brand_weight;

		echo json_encode($this->data);
	}
}
