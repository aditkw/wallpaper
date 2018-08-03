<?php
/**
*
*/
class Welcome extends Frontend_Controller {

	public function index()
	{
		$this->data['slide'] 		  = $this->slide_model->get_by(array('banner_type' => 'slide', 'banner_pub' => '99'));
		$this->data['banners'] 		  = $this->banner_model->get_by(array('banner_type' => 'banner', 'banner_pub' => '99'));
		$this->data['promo_wp']  = $this->product_model->get_product(array('image_parent_name' => 'product', 'image_seq' => 0, '{PRE}category.category_id' => 16), 8);
		$this->data['promot'] = $this->article_model->get_article(array('article_pub' => '99'), null, null, true);
		$this->data['brand_wp']  = $this->brand_model->get_brand(array('{PRE}category.category_id' => 16), 4);
		$this->data['merk'] 		  = $this->brand_model->get_by(array('brand_pub' => '99'));
		$this->data['color'] 		  = $this->color_model->get_by(array('color_pub' => '99'));
		$this->data['motif'] 		  = $this->motif_model->get_by(array('motif_pub' => '99'));
		$this->data['testimonial']= $this->testi_model->get_by(array('testi_pub' => '99'));
		$this->data['content']	  = 'pages/home';

		$this->load->view('index', $this->data);
	}
}
