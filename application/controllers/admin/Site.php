<?php 

/**
* 
*/
class Site extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $wt 							= 20;
	protected $ht 							= 0; 
	protected $modul_file 			= 'site';

	function index()
	{
		$this->data['content']		= 'admin/pages/site/view';
		$this->data['site']				= $this->site_model->get('1');
		$this->data['file_path'] 	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$get_data = $this->site_model->get('1');
		$rules 		= $this->site_model->rules;
		$array_id = array('site_id' => '1');

		$array_data['site_name'] 		= $post['name'];
		$array_data['site_email'] 	= $post['email'];
		$array_data['site_title'] 	= $post['title'];
		$array_data['site_keyword'] = $post['keyword'];
		$array_data['site_desc'] 		= $post['desc'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/site'));
		}

		else {

			if (!empty($_FILES['logo']['name'])) {
				$this->lawave_image->delete_image($this->modul_file, $get_data->site_logo);
				$upload_image = $this->lawave_image->upload_image($this->modul_file, 'logo', title_url($post['name']));
				
				$array_data['site_logo'] = $upload_image['image']['file_name'];
			}

			if (!empty($_FILES['favicon']['name'])) {
				$this->lawave_image->delete_image($this->modul_file, $get_data->site_favicon, $this->thumb_pre);
				$upload_image = $this->lawave_image->upload_image($this->modul_file, 'favicon', title_url($post['name']));
				
				$this->image_moo
					->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
					->resize($this->wt,$this->ht)
					->save_pa($this->thumb_pre,'');

				$array_data['site_favicon'] = $upload_image['image']['file_name'];
			}

			$this->site_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->edit_text);
			redirect(site_url('admin/site'));
		}
	}
}