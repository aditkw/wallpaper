<?php

/**
*
*/
class Berita extends Frontend_Controller
{

	function index()
	{
		$this->where_article['{PRE}image.image_seq'] = '0';

		// $url 				= $this->uri->segment(1);
		// $num_rows		=	$this->article_model->count();
		// $per_page 	= 5;
		// $num_links	= 2;

		// $this->lawave_paging->pagination($url, $num_rows, $per_page, $num_links);

		/*konfigurasi nilai offset dan informasi halaman*/
		// $on_page 	= ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
		// $offset 	= ($on_page - 1) * $per_page;
		// $num_page	= ceil($num_rows/$per_page);

		$this->data['content'] 		= 'pages/article/view';

		/*data[num_rows, on_page, num_page], digunakan untuk kebutuhan informasi halaman*/
		// $this->data['num_rows']		= $num_rows;
		// $this->data['on_page']		= $on_page;
		// $this->data['num_page']		= $num_page;
		// $this->data['pagination'] = $this->pagination->create_links();
		$this->data['tags'] 			= $this->tag_model->get();
		$this->data['articles']		= $this->article_model->get_article(
			$this->where_article,
			NULL,
			NULL,
			FALSE,
			NULL
			);

		$this->load->view('index', $this->data);
	}

	public function baca($link)
	{
		$where_article = array('article_link' => $link);

		$this->data['content'] 		= 'pages/article/detail';
		$this->data['article']		= $this->article_model->get_article($where_article, NULL, NULL, TRUE);
		$this->data['others']		= $this->article_model->get();
		$this->data['tags'] 			= $this->tag_model->get();
		$this->data['info_date']	= indonesian_date($this->data['article']->article_date);

		$this->load->view('index', $this->data);
	}
}
