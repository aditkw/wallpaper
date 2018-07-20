<?php

/**
* Class testi
*/
class Testi extends Backend_Controller
{

	function index()
	{
		$this->data['content'] 		= 'admin/pages/testi/view';
		$this->data['testi'] 			= $this->testi_model->get();

		/*
		| tampung semua data (yang akan ditampilkan di view) kedalam array $this->data
		| 'content' 		-> lokasi view
		| 'testi'				-> data dari database
		*/

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->testi_model->rules;

		/*
		| $post nilai dari $this->input->post()
		| simpan array rules dari testi_model ke dalam variable '$rules'
		*/

		$this->form_validation->set_rules($rules);

		/*
		| validasi form CI, nilai yang dimasukan telah ditampung dalam '$rules'
		*/

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/testi'));

			/*
			| pesan error akan dikirim kehalaman view sebagai flashdata
			*/

		}

		else {
				$array_data['testi_name'] 		= $post['name'];
				$array_data['testi_desc'] 		= $post['desc'];
				$array_data['testi_job']		  = $post['job'];

				/*
				| tampung semua data yang dimasukan kedalam '$array_data'
				*/

				$this->testi_model->insert($array_data);
				$this->session->set_flashdata('success',$this->add_text);

				/*
				| proses insert data, data yang masuk harus berupa array
				| pesan berhasil akan dikirim kehalaman view sebagai flashdata
				*/

				redirect(site_url('admin/testi'));
		}
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$get_data = $this->testi_model->get($id);
		$rules 		= $this->testi_model->rules;
		$array_id = array('testi_id' => $id);

		/*
		| $get_data -> mendapatkan data dari database berdasarkan id
		| $array_id -> digunakan sebagai where untuk update data
		*/

		$array_data['testi_name'] 		= $post['name'];
		$array_data['testi_desc'] 		= $post['desc'];
		$array_data['testi_job']		  = $post['job'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/testi'));
		}

		else {

				/*
				| update tanpa mengganti gambar
				*/

				$this->testi_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->edit_text);

				redirect(site_url('admin/testi'));
		}
	}

	public function delete($id)
	{

		$this->testi_model->delete($id);

		$this->transaction_model->update(array('testi_id' => NULL), array('testi_id' => $id));

		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/testi'));
	}

	public function publish($id)
	{
		$array_id = array('testi_id' => $id);

		$get_data = $this->testi_model->get($id);

		if ($get_data->testi_pub == '88') {
			$array_data['testi_pub'] = '99';
			$text_msg = $this->publish_text;
		}

		else {
			$array_data['testi_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->testi_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/testi'));
	}

	public function update_load()
	{
		$id 			= $this->input->post('dataID');
		$get_data = $this->testi_model->get($id);

		/*
		| $id 			-> menampung nilai dataID yang dikirim menggunakan AJAX
		| $get_data -> menampung data dari database berdasarkan $id
		*/

		$this->data['id'] 			= $get_data->testi_id;
		$this->data['name']	 		= $get_data->testi_name;
		$this->data['desc'] 		= $get_data->testi_desc;
		$this->data['job'] 			= $get_data->testi_job;

		/*
		| tampung semua data yang didapat dari database kedalam array '$this->data'
		*/

		echo json_encode($this->data);

		/*
		| fungsi json_endcode menubah data menjadi json dan mengirim data
		*/
	}
}
