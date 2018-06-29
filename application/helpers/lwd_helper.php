<?php

/*clean url*/
function title_url($str, $replace=array(), $delimiter='-')
{
	setlocale(LC_ALL, 'en_US.UTF8');

	if( !empty($replace) )
	{
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}

function parse_http_lwd($http, $index)
{
	/*parse_str() memisahkan string yang terbuat dari http_build_query menjadi bentuk array, dan ditampung dalam array $http*/
	/*hapus array yang akan dipanggil ulang berdasarkan index (disini index array 'sort')*/
	/*buat kembali http_build_query*/
	parse_str($http, $res);
	unset($res[$index]);
	$http_result = http_build_query($res);

	return $http_result;
}

/*alert javascript*/
function alert_js($text, $back){
	$script = '<script>';
	$script .= 'alert("'.$text.'");';
	$script .= 'history.go('.$back.');';
	$script .= '</script>';

	echo $script;
}

/*active menu*/
function active_perent($src, $array = array())
{
	if (in_array($src, $array)) {
		return 'active';
	}
}

function active_menu($uri, $link)
{
	if ($uri == $link) {
		return 'active';
	}
}

/*send email localhost*/
function lwd_send_email($to, $subject, $email)
{
	$_this =& get_instance();
	$_this->load->library('email');
	$_this->load->helper('email');
	$config['protocol'] = "smtp";
	$config['smtp_host'] = "ssl://smtp.gmail.com";
	$config['smtp_port'] = "25";
	$config['smtp_user'] = "syariflwd@gmail.com";
	$config['smtp_pass'] = "syarif12345";
	$config['charset'] = "utf-8";
	$config['mailtype'] = "html";
	$config['newline'] = "\r\n";

	$_this->email->initialize($config);

	$_this->email->from('syariflwd@gmail.com');
	$_this->email->to($to);
	$_this->email->subject($subject);
	$_this->email->message($email);
	$_this->email->send();
}

/*title page*/
function title_meta($primary_segment, $site_general)
{
	$_this = get_instance();
	$_this->load->helper('url');
	$title = '';

	if (!empty($_this->uri->segment($primary_segment))) {
		$title = $_this->uri->segment($primary_segment);
		return $title;
	}

	else {
		return $site_general;
	}
}

/*sort date yyyymmdd*/
function sort_date($date)
{
	$array = explode('-', $date);
	$i = implode('', $array);
	return $i;
}

/**
	@data, string gabungan dari id_statusprd.
	@status_id, nilai id dari produk.
	fungsi ini mengecek dan mengembalikan @status_id ketika di dalam @data (array $array_data) terdapat nilai @status_id
	fungsi ini digunakan untuk mengetahui status produk. seperti favorit, best seller dan lain-lain.
**/
function status_product($data, $status_id)
{
	$array_data = explode(',', $data);

	if (in_array($status_id, $array_data)) {
		return $status_id;
	}

	else {
		return FALSE;
	}
}

/*
| VALIDASI AKSES HALAMAN ADMINISTRATOR
|
| $id => hasil dari dekripsi (decode) session user_session.
| pengambilan data table lwd_user.user_id dengan filter user_id = $id.
| session is_login. Untuk dapat mengakses halaman admin, session ini harus bernilai TRUE.
| session user_session. Untuk mengakses halaman admin, nilai session ini tidak boleh kosong.
| hasil decode session user_session harus sesuai dengan salah satu record pada table lwd_user.user_id.
| melakukan direct jika (salah satu atau semua) kondisi tidak terpenuhi.
*/
function is_logged_in()
{

	$_this =& get_instance();
	$userdata = $_this->session->userdata;

	if (isset($userdata['is_login']) && $userdata['is_login'] == TRUE && isset($userdata['user_session'])) {
		$id = $_this->encrypt->decode(hash_link_decode($userdata['user_session']));
		$user_log = $_this->login_model->get($id);

		if ($id === $user_log->user_id) {
			return TRUE;
		}

		else {
			return FALSE;
		}
	}

	else {
		redirect(site_url('login'));
	}

	/*VALIDASI LAMA*/
	// $id = $this->encrypt->decode(hash_link_decode($this->session->userdata('user_session')));
	// $user_log = $this->login_model->get($id);

	// $this->session->userdata('is_login') == TRUE &&
	// !empty($this->session->userdata('user_session')) &&
	// $id === $user_log->user_id
	// 	|| redirect(site_url());
}

function paging($url = NULL, $num_rows = NULL, $per_page = NULL, $num_links = NULL)
{
	$_this =& get_instance();

	$config['base_url'] = base_url($url);
	/*jumlah rows yang ditampilkan*/
	$config['total_rows'] = $num_rows;
	/*TRUE, artinya akan tetap menggunakan url yang ada selain base_url*/
	$config['reuse_query_string'] = TRUE;

	/*banyaknya record yang ditampilkan dalam 1 halaman*/
	if ($per_page) {
		$config['per_page'] = $per_page;
	}

	else {
		$config['per_page'] = 10;
	}

	/*jumlah link sebelum dan sesudah link aktif*/
	if ($num_links) {
		$config['num_links'] = $num_links;
	}

	else {
		$config['num_links'] = 2;
	}

	$config['use_page_numbers'] = TRUE;

	/* Configurasi Style. Default library ini menggunakan bootstrap */
	/*full tag / tag induk*/
	$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul>';

	/*first / ling menuju pej wan*/
	$config['first_link'] = 'First';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';

	/*last / link menuju pej paling akhir*/
	$config['last_link'] = 'Last';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';

	/*next / link page selanjutnya*/
	$config['next_link'] = 'Next';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';

	/*prev / link page sebelumnya*/
	$config['prev_link'] = 'Prev';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';

	/*active / link aktiv*/
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';

	/*nomor / penutup link nomor*/
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';

	/*inisialisasi*/
	$_this->pagination->initialize($config);
}
