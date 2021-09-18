<?php
class Postdepan extends CI_Controller
{
    function _remap($params)
    {
        $this->_index($params);
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jawaban_model');
        $this->load->library('form_validation');
    }

    public function _index($title)
    {

        if ($title == 'index') {
            redirect(base_url('postdepan/'), 'refersh');
        } else {
            $data['judul'] = 'Halaman Depan';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['data'] = $this->db->get_where('tb_post', array('id_post' => $title))->result();

            $this->load->view('templates_Home/home_header', $data);
            $this->load->view('Home/postdepan');
            $this->load->view('templates_Home/home_footer');
        }
    }
}
