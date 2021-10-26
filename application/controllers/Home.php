<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->library('form_validation');
		// $this->load->library('pagination');
	}

	public function index($offset = NULL)
	{
		$data['judul'] = 'Halaman Utama';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->db->get('tb_post')->result();

		$limit = 3;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url'] = 'http://localhost/db-komunitas/Home/index/';
		$config['total_rows'] = $this->db->get('tb_post')->num_rows();
		$config['per_page'] = $limit;
		$config['num_links'] = 3;

		$data['pagination'] = $this->pagination->initialize($config);
		$data['offset'] = $this->uri->segment(3);
		$this->db->order_by('id_post', 'desc');
		$data['data'] = $this->Post_model->GetDataPost($limit, $offset);



		$this->load->view('templates_Home/home_header', $data);
		$this->load->view('Home/index', $data);
		$this->load->view('templates_Home/home_footer');
	}
}