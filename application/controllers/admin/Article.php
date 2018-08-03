<?php

/**
*
*/
class Article extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $wt 							= 70;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'article';

	function index()
	{
		$this->data['content'] 		= 'admin/pages/article/view';
		$this->data['article'] 		= $this->article_model->get_article(
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
		$this->data['content'] 		= 'admin/pages/article/add';
		// $this->data['category'] 	= $this->articlecat_model->get();
		$this->data['tag'] 				= $this->tag_model->get_by(array('tag_pub' => '99'));
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$rules 			= $this->article_model->rules;
		$tag 				= implode(', ', $post['tag']);
		$alt 				= title_url($post['title']);
		$link 			= title_url($post['title']);
		$date 			= date("Y-m-d");

		$this->form_validation->set_rules('title','Article Title','required|is_unique[lwd_article.article_title]');
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/article'));
		}

		else {
		$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, $alt);
		$this->image_moo
			->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
			->resize($this->wt,$this->ht)
			->save_pa($this->thumb_pre,'');

			$array_data['article_title'] 				= $post['title'];
			// $array_data['article_cat_id'] 			= $post['category'];
			$array_data['article_tag'] 					=	$tag;
			$array_data['article_desc'] 				= $post['desc'];
			$array_data['article_date'] 				= $date;
			$array_data['article_alt'] 					= $post['title'];
			$array_data['article_link']					= $link;

			$article_id = $this->article_model->insert($array_data);

			$array_img['parent_id']					= $article_id;
			$array_img['image_parent_name']	= 'article';
			$array_img['image_name']				= $upload_image['image']['file_name'];
			$array_img['image_seq']					= 0;

			$this->image_model->insert($array_img);

			$this->session->set_flashdata('success',$this->add_text);

			redirect(site_url('admin/article'));
		}
	}

	public function edit($id)
	{
		$where_img_index		= array('parent_id' => $id, 'image_parent_name' => 'article', 'image_seq' => 0);

		$this->data['content'] 		= 'admin/pages/article/edit';
		$this->data['article'] 		= $this->article_model->get($id);
		$this->data['image_index']= $this->image_model->get_by($where_img_index, NULL, NULL, TRUE);
		$this->data['thumb_pre']	= $this->thumb_pre;
		// $this->data['category'] 	= $this->articlecat_model->get();
		$this->data['tag'] 				= $this->tag_model->get();
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function update()
	{
		$post 			= $this->input->post(NULL, TRUE);
		$id 				= $post['id'];
		$where_img	= array('parent_id' => $id, 'image_parent_name' => 'article');
		$get_data 	= $this->article_model->get($id);
		$get_image 	= $this->image_model->get_by($where_img, NULL, NULL, TRUE);
		$rules 			= $this->article_model->rules;
		$array_id 	= array('article_id' => $id);
		$tag 				= implode(', ', $post['tag']);
		$files 			= $_FILES[$this->image_input_name]['name'];

		$alt 				= title_url($post['title']);
		$link 			= title_url($post['title']);

		$array_data['article_title'] 				= $post['title'];
		// $array_data['article_cat_id'] 			= $post['category'];
		$array_data['article_tag'] 					=	$tag;
		$array_data['article_desc'] 				= $post['desc'];
		$array_data['article_alt'] 					= $post['title'];
		$array_data['article_link']					= $link;

		$is_unique = $this->article_model->unique_update($post['title'], $id, 'article_title');

		$this->form_validation->set_rules('title','Article Title','required'.$is_unique);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/article'));
		}

		else {
			// update data produk
			$this->article_model->update($array_data, $array_id);

			if (!empty($files)) {
				$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);

				$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, $alt);
				$this->image_moo
					->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
					->resize($this->wt,$this->ht)
					->save_pa($this->thumb_pre,'');

				$array_img['image_name']				= $upload_image['image']['file_name'];

				$this->image_model->update($array_img, array('image_id' => $get_image->image_id));
			}

			$this->session->set_flashdata('success', $this->edit_text);
			redirect(site_url('admin/article'));
		}
	}

	public function delete($id)
	{
		$get_data 		= $this->article_model->get($id);
		// hapus gambar
		$where_image 	= array('parent_id' => $id);
		$image 	= $this->image_model->get_by($where_image);
		foreach ($image as $key => $image) {
			$this->lawave_image->delete_image($this->modul_file, $image->image_name, $this->thumb_pre);
		}

		// hapus data
		$this->article_model->delete($id);
		$this->image_model->delete_by($where_image);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/article'));
	}

	public function publish($id)
	{
		$array_id = array('article_id' => $id);

		$get_data = $this->article_model->get($id);
		$all_data = $this->article_model->get();

		if ($get_data->article_pub == '88') {
			foreach ($all_data as $article) {
				if ($article->article_id == $get_data->article_id) {
					$this->article_model->update(array('article_pub' => '99'), array('article_id' => $article->article_id));
				}else {
					$this->article_model->update(array('article_pub' => '88'), array('article_id' => $article->article_id));
				}
			}
			$text_msg = $this->publish_text;
		}

		else {
			foreach ($all_data as $article) {
				if ($article->article_id == $get_data->article_id) {
					$this->article_model->update(array('article_pub' => '99'), array('article_id' => $article->article_id));
				}else {
					$this->article_model->update(array('article_pub' => '88'), array('article_id' => $article->article_id));
				}
			}
			$text_msg = $this->unpublish_text;
		}

		// $this->article_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/article'));
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
