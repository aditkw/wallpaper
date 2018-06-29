<?php

/**
* 
*/
class About extends Backend_Controller
{
	protected $id 							= '1';
	protected $max_size					= 1024 * 2048;
	protected $wt 							= 100;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'about'; 

	public function index()
	{
		$array_id 	= array('info_id' => $this->id);

		$this->data['content'] 	= 'admin/pages/about/view';
		$this->data['about'] 		= $this->about_model->get($array_id);
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$array_id 				= array('info_id' => $this->id);
		$post 						= $this->input->post(NULL, TRUE);	
		$get_data 				= $this->about_model->get($array_id);
		$rules 						= $this->about_model->rules;

		$this->form_validation->set_rules($rules);

		$array_data['info_name'] = $post['name'];
		$array_data['info_desc'] = $post['desc'];

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/about'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($too_large_text, '-1');
				}

				else {
					$this->lawave_image->delete_image($this->modul_file, $get_data->info_image, $this->thumb_pre);
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));

					$this->image_moo 
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->wt,$this->ht) 
						->save_pa($this->thumb_pre,''); 
					
					$array_data['info_image'] = $upload_image['image']['file_name'];

					$this->about_model->update($array_data, $array_id);

					$this->session->set_flashdata('success',$this->edit_text);

					redirect(site_url('admin/about'));
				}
			}

			else {
				$this->about_model->update($array_data, $array_id);
				$this->session->set_flashdata('success',$this->edit_text);

				redirect(site_url('admin/about'));
			}
		}
	}

}