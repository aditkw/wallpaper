<?php

/**
*
*/
class Sample extends Backend_Controller
{

	protected $max_size					= 1024 * 200;
	protected $wt 							= 70;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'article';

	function index()
	{
		$this->data['content'] 		= 'admin/pages/sample/view';
		$this->data['sample'] 		= $this->sample_model->get_sample();
		// $this->data['thumb_pre']	= $this->thumb_pre;
		// $this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function add()
	{
		$this->data['content'] 		= 'admin/pages/sample/add';

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$rules 			= $this->sample_model->rules;

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/sample'));
		}

		else {
			$array_data['nama'] 				= $post['nama'];
			$array_data['alamat'] 			= $post['alamat'];

			$article_id = $this->sample_model->insert($array_data);

			$this->session->set_flashdata('success',$this->add_text);

			redirect(site_url('admin/sample-modul'));
		}
	}

	public function edit($id)
	{
		$where_img_index		= array('parent_id' => $id, 'image_parent_name' => 'article', 'image_seq' => 0);

		$this->data['content'] 		= 'admin/pages/sample/edit';
		$this->data['sample'] 		= $this->sample_model->get($id);

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$id 				= $post['id'];
		$rules 			= $this->sample_model->rules;
		$array_id 	= array('id' => $id);

		$alt 				= title_url($post['nama']);
		$link 			= title_url($post['nama']);

		$array_data['nama']	= $post['nama'];
		$array_data['alamat'] 	= $post['alamat'];

		$is_unique = $this->sample_model->unique_update($post['nama'], $id, 'nama');

		$this->form_validation->set_rules('nama','nama Title','required'.$is_unique);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/sample-modul'));
		}

		else {
			// update data produk
			$this->sample_model->update($array_data, $array_id);

			// if (!empty($files)) {
			// 	$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);
      //
			// 	$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, $alt);
			// 	$this->image_moo
			// 		->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
			// 		->resize($this->wt,$this->ht)
			// 		->save_pa($this->thumb_pre,'');
      //
			// 	$array_img['image_name']				= $upload_image['image']['file_name'];
      //
			// 	$this->image_model->update($array_img, array('image_id' => $get_image->image_id));
			// }

			$this->session->set_flashdata('success', $this->edit_text);
			redirect(site_url('admin/sample-modul'));
		}
	}

	public function delete($id)
	{
		$get_data 		= $this->sample_model->get($id);

		// hapus data
		$this->sample_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/sample-modul'));
	}

	public function publish($id)
	{
		$array_id = array('id' => $id);

		$get_data = $this->sample_model->get($id);

		if ($get_data->sample_pub == '88') {
			$array_data['sample_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['sample_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->sample_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/sample-modul'));
	}

	public function ajax_subcat()
	{
		$id 					= $this->input->post('dataID');
		$array_where 	= array('article_cat_id' => $id);
		$get_data 		= $this->subcat_model->get_by($array_where);
		$output 			= '';

		if ($get_data) {
			$output .= '<option disabled selected>Select Sub Category</option>';
			foreach ($get_data as $result) {
				$output .= '<option value="'.$result->subcat_id.'">';
				$output .= ucwords($result->subcat_name);
				$output .= '</option>';
			}
			echo $output;
		}
	}
}
