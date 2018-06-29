<?php

/**
* Class bank
*/
class Bank extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $wt 							= 100;
	protected $ht 							= 0; 
	protected $image_input_name = 'image';
	protected $modul_file 			= 'bank';

	/*
	| $max_size 				-> size maksimal gambar
	| $wt								-> lebar (width thumbnail)
	| $ht 							-> tinggi (height thumbnail)
	| $image_input_name -> nilai attribute "name"pada input file
	| $modul_file 			-> lokasi path untuk gambar modul ini 
	*/

	function index()
	{
		$this->data['content'] 		= 'admin/pages/bank/view';
		$this->data['bank'] 			= $this->bank_model->get();
		$this->data['thumb_pre'] 	= $this->thumb_pre;
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		/*
		| tampung semua data (yang akan ditampilkan di view) kedalam array $this->data
		| 'content' 		-> lokasi view
		| 'bank'				-> data dari database
		| 'thumb_pre'		-> nilai prefix thumbnail
		| 'path_file'		-> lokasi (path) file gambar modul disimpan
		*/

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{	
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->bank_model->rules;

		/*
		| $post nilai dari $this->input->post()
		| simpan array rules dari bank_model ke dalam variable '$rules'
		*/

		$this->form_validation->set_rules($rules);

		/*
		| validasi form CI, nilai yang dimasukan telah ditampung dalam '$rules'
		*/

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/bank'));

			/*
			| pesan error akan dikirim kehalaman view sebagai flashdata
			*/
		
		}

		else {
			$size 		= $_FILES['image']['size'];

			/*
			| mendapatkan nilai size gambar yang akan diupload
			*/
				
			if ($size > $this->max_size) {
				echo alert_js($this->too_large_text, '-1');
			
				/*
				| cek size gambar sesuai dengan batas maksimal
				*/

			}

			else {
				$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
				$this->image_moo
					->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
					->resize($this->wt,$this->ht)
					->save_pa($this->thumb_pre,'');

				/*
				| proses upload gambar dan menapung data gambar yang diupload kedalam variable '$upload_image'
				| proses pembuatan thumbnail menggunakan library image moo 
				*/

				$array_data['bank_name'] 		= $post['name'];
				$array_data['bank_no'] 			= $post['no'];
				$array_data['bank_account'] = $post['account'];
				$array_data['bank_image'] 	= $upload_image['image']['file_name'];

				/*
				| tampung semua data yang dimasukan kedalam '$array_data'
				*/

				$this->bank_model->insert($array_data);
				$this->session->set_flashdata('success',$this->add_text);

				/*
				| proses insert data, data yang masuk harus berupa array
				| pesan berhasil akan dikirim kehalaman view sebagai flashdata
				*/

				redirect(site_url('admin/bank'));
			}
		}
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$get_data = $this->bank_model->get($id);
		$rules 		= $this->bank_model->rules;
		$array_id = array('bank_id' => $id);

		/*
		| $get_data -> mendapatkan data dari database berdasarkan id
		| $array_id -> digunakan sebagai where untuk update data
		*/
 
		$array_data['bank_name'] 		= $post['name'];
		$array_data['bank_no'] 			= $post['no'];
		$array_data['bank_account'] = $post['account'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/bank'));
		}

		else {

			if (!empty($_FILES['image']['name'])) {

				/*
				| lakukan proses upload gambar dan update field image jika $_FILES tidak kosong
				*/

				$size = $_FILES['image']['size'];
				
				if ($size > $this->max_size) {
					echo alert_js($this->too_large_text, '-1');
				}

				else {
					$this->lawave_image->delete_image($this->modul_file, $get_data->bank_image, $this->thumb_pre);

					/*
					| hapus data gambar lama
					*/

					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
						->resize($this->wt,$this->ht)
						->save_pa($this->thumb_pre,'');

					$array_data['bank_image'] = $upload_image['image']['file_name'];

					$this->bank_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);

					/*
					| proses update data, data yang masuk dan id_where harus berupa array
					*/

					redirect(site_url('admin/bank'));
				}
			}

			else {

				/*
				| update tanpa mengganti gambar
				*/
				
				$this->bank_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->edit_text);

				redirect(site_url('admin/bank'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->bank_model->get($id);
		$this->lawave_image->delete_image($this->modul_file, $get_data->bank_image, $this->thumb_pre);

		$this->bank_model->delete($id);

		/*
		| proses delete row table
		*/
		
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/bank'));
	}

	public function publish($id)
	{
		$array_id = array('bank_id' => $id);

		$get_data = $this->bank_model->get($id);

		if ($get_data->bank_pub == '88') {
			$array_data['bank_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['bank_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->bank_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/bank'));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->bank_model->get($id);

		/*
		| $id 			-> menampung nilai dataID yang dikirim menggunakan AJAX
		| $get_data -> menampung data dari database berdasarkan $id
		*/

		$this->data['id'] 			= $get_data->bank_id;
		$this->data['name']	 		= $get_data->bank_name;
		$this->data['no'] 			= $get_data->bank_no;
		$this->data['account'] 	= $get_data->bank_account;

		/*
		| tampung semua data yang didapat dari database kedalam array '$this->data'
		*/

		echo json_encode($this->data);

		/*
		| fungsi json_endcode menubah data menjadi json dan mengirim data 
		*/		
	}	
}