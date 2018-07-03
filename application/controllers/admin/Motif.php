<?php

/**
*
*/
class Motif extends Backend_Controller
{
	protected $max_size					= 1024 * 2048;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'motif';

	function index()
	{
		$this->data['content'] 	= 'admin/pages/motif/view';
		$this->data['motif'] 		= $this->motif_model->get();
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post = $this->input->post();

		$array_data['motif_name'] = $post['name'];
		$array_data['motif_link'] = title_url($post['name']);

		$this->form_validation->set_rules('name', 'motif Name', 'required|is_unique[lwd_motif.motif_name]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/motif'));
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

					$array_data['motif_image'] 	= $upload_image['image']['file_name'];

					$this->motif_model->insert($array_data);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/motif'));
				}
			}

			else {
				$this->motif_model->insert($array_data);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/motif'));
			}
		}
	}

	public function update()
	{
		$post 						= $this->input->post();
		$id								= $post['id'];
		$rules 						= $this->motif_model->rules;
		$get_data 				= $this->motif_model->get($id);
		$array_id 				= array('motif_id' => $id);

		$array_data['motif_name'] = $post['name'];
		$array_data['motif_link'] = title_url($post['name']);

		$is_unique = $this->motif_model->unique_update($post['name'], $id, 'motif_name');

		$this->form_validation->set_rules('name', 'motif Name', 'required'.$is_unique);
		// $this->form_validation->set_rules('desc', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/motif'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($too_large_text, '-1');
				}

				else{
					$this->lawave_image->delete_image($this->modul_file, $get_data->motif_image, $this->thumb_pre);
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
					// image moo
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->width_thumbnail,$this->height_thumbnail)
						->save_pa($this->thumb_pre,'');

					$array_data['motif_image'] = $upload_image['image']['file_name'];

					$this->motif_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/motif'));
				}
			}

			else {
				$this->motif_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/motif'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->motif_model->get($id);

		$this->motif_model->delete($id);
		$this->session->set_flashdata('success', $this->delete_text);

		redirect(site_url('admin/motif'));
	}

	public function publish($id)
	{
		$array_id = array('motif_id' => $id);

		$get_data = $this->motif_model->get($id);

		if ($get_data->motif_pub == '88') {
			$array_data['motif_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['motif_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->motif_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/motif'));
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->motif_model->get($id);

		$this->data['id'] 	= $get_data->motif_id;
		$this->data['name'] = $get_data->motif_name;

		echo json_encode($this->data);
	}
}
