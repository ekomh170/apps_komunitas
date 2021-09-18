<?php
class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        //tanggal();
        // $this->load->model('Saran_model');
        // $this->load->model('Jawaban_model');
        $this->load->library('pagination');
        //$this->load->model('Post_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $tgl = date("Y-m-d");


        $query = $this->db->get_where('tb_post', array('tanggal_hapus' => $tgl))->result();
        foreach ($query as $value) {
            $tgl_data = $value->tanggal_hapus;

            if ($tgl_data == $tgl) {

                $this->db->where(array('tanggal_hapus' => $tgl_data));
                $this->db->delete('tb_post');
            }
        }
        $data['judul'] = 'Daftar Diskusi';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('id_post', 'desc');
        $data['data'] =  $this->db->select('tb_post.id_post, tb_post.nama_pengirim, tb_komunitas.nama_komunitas, tb_post.judul_post, tb_post.image, tb_post.date_created, tb_post.tanggal_hapus, tb_user.id, tb_post.isi_post')
                                        ->from('tb_post')
                                        ->join('tb_komunitas', 'tb_komunitas.id_komunitas = tb_post.id_komunitas')
                                        ->join('tb_user', 'tb_user.id = tb_post.id_user')
                                        ->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Post/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah Diskusi';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Post/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $tgl = date('Y-m-d H:i:s');
        $tgl = date('Y-m-d H:i:s', strtotime('+ 30 days', strtotime($tgl)));
        $query = $this->db->get_where('tb_post', array('tanggal_hapus' => $tgl))->result();
        foreach ($query as $value) {
            $tgl_data = $value->tanggal_hapus;


            if ($tgl_data == $tgl) {

                $this->db->where(array('tanggal_hapus' => $tgl_data));
                $this->db->delete('tb_post');
            }
        }
        $id_post = $this->input->post('id_post', true);
        $judul_post = $this->input->post('judul_post', true);
        $date_created = $this->input->post('date_created', true);
        $isi_post = $this->input->post('isi_post', true);
        $image = $_FILES['image'];
        if ($image = '') {
        } else {
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = true;
            $config['max_filename'] = 255;
            $config['max_size'] = 25600;
            $config['width']  = 150;
            $config['height'] = 150;


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Gagal";
                die();
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                'id_post' => $id_post,
                'nama_pengirim' => $this->session->userdata('nama'),
                'nama_komunitas' => $this->session->userdata('nama_komunitas'),
                'judul_post' => $judul_post,
                'date_created' => date('Y-m-d H:i:s'),
                'isi_post' => $isi_post,
                'image' => $image,
                'tanggal_hapus' => $tgl
            );

            $this->db->insert('tb_post', $data);
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            redirect(base_url('post'));
        }
    }

    public function HapusDataPost($id_post)
    {
        $this->db->delete('tb_post', ['id_post' => $id_post]);
        if ($this->db->affected_rows() > 0) {
            $assign_to  = '';
            $assign_type = '';
            activity_log("Data Pengguna", "Hapus Data", $id_post, $assign_to, $assign_type);
            redirect('Post/');
        } else {
            return false;
        }
    }


    public function jawaban()
    {
        $id_post = $this->input->post('id_post', true);
        $isi_post = $this->input->post('isi_post', true);
        $data = array(
            'id_post' => $id_post,
            'isi_post' => $isi_post,
            'date_created' => date('Y-m-d H:i:s'),
            'nama_pengirim' => $this->session->userdata('nama'),
            'nama_komunitas' => $this->session->userdata('nama_komunitas')
        );

        $this->db->insert('tb_post', $data);
        redirect('Jawaban');
    }
}
