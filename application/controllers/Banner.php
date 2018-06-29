<?php

/**
* 
*/
class Banner extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';
	protected $modul_file 			= 'banner'; 

	function index()
	{
		$array_where = array('banner_type' => 'banner');

		$this->data['content'] 	= 'admin/pages/banner/view';
		$this->data['banner'] 	= $this->banner_model->get_by($array_where);
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{	
		$array_where = array('banner_type' => 'banner');

		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->banner_model->rules;

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/banner'));
		}

		else {
			$size 		= $_FILES['image']['size'];
				
			if ($size > $this->max_size) {
				echo alert_js($this->too_large_text, '-1');
			}

			else {
				$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
				
				$this->image_moo
					->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
					->resize($this->width_thumbnail,$this->height_thumbnail)
					->save_pa($this->thumb_pre,'');

				$array_data['banner_link']		= $post['link'];
				$array_data['banner_alt']			= $post['alt'];
				$array_data['banner_type'] 		= 'banner';
				$array_data['banner_image'] 	= $upload_image['image']['file_name'];

				$this->banner_model->insert($array_data);
				$this->session->set_flashdata('success',$this->add_text);

				redirect(site_url('admin/banner'));
			}
		}
	}

	public function update()
	{

		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$get_data = $this->banner_model->get($id);
		$rules 		= $this->banner_model->rules;
		
		$array_id = array('banner_id' => $id);
		$array_where = array('banner_type' => 'banner');
 
		$array_data['banner_link'] 		= $post['link'];
		$array_data['banner_alt'] 		= $post['alt'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/banner'));
		}

		else {

			if (!empty($_FILES['image']['name'])) {
				$size = $_FILES['image']['size'];
				
				if ($size > $this->max_size) {
					echo alert_js($this->too_large_text, '-1');
				}

				else {
					$this->lawave_image->delete_image($this->modul_file, $get_data->banner_image, $this->thumb_pre);
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
					
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->width_thumbnail,$this->height_thumbnail) 
						->save_pa($this->thumb_pre,'');

					$array_data['banner_image'] = $upload_image['image']['file_name'];

					$this->banner_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);

					redirect(site_url('admin/banner'));
				}
			}

			else {
				$this->banner_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->edit_text);

				redirect(site_url('admin/banner'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->banner_model->get($id);
		
		$this->lawave_image->delete_image($this->modul_file, $get_data->banner_image, $this->thumb_pre);
		
		$this->banner_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/banner'));
	}

	public function publish($id)
	{
		$array_id = array('banner_id' => $id);

		$get_data = $this->banner_model->get($id);

		if ($get_data->banner_pub == '88') {
			$array_data['banner_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['banner_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->banner_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/banner'));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->banner_model->get($id);

		$this->data['id'] 			= $get_data->banner_id;
		$this->data['link']	 		= $get_data->banner_link;
		$this->data['alt']	 		= $get_data->banner_alt;

		echo json_encode($this->data);
	}	
}