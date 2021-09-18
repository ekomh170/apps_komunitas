<?php  

class Admin_model extends CI_Model{
	public function hitungJumlahPengguna()
	{   
		    $query = $this->db->get('user');
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
	    }
	}

	public function GetDataAdmin($limit,$offset)
	{
		$query = $this->db->get('tb_admin');
		return $query->result_array();
	}

	public function TambahDataAdmin()
	{
		//$id_admin = $this->input->post('id_admin', true);
		$count_admin = $this->db->count_all('tb_admin');
		$helper = 1 + $count_admin;
		$date = date('s');
		
		$id_admin = "AM" . "-" . $date . "-" . $helper;

		$nama = $this->input->post('nama', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$agama = $this->input->post('agama', true);
		$tmpt_lahir = $this->input->post('tmpt_lahir', true);
		$tgl_lahir = $this->input->post('tgl_lahir', true);
		$alamat = $this->input->post('alamat', true);
		$no_telp = $this->input->post('no_telp', true);
		$image = $_FILES['image'];
		if ($image=''){}else{
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite'] = true;
			$config['max_filename'] = 255;
			$config['max_size'] = 25600;
			$config['width']  = '100';
			$config['height'] = '100';


			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				echo "Upload Gagal";die();
			}else{
				$image=$this->upload->data('file_name');
			}

		
			$data = array(
				'id_admin' => $id_admin,
				'nama' => $nama,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' => $agama,
				'tmpt_lahir' => $tmpt_lahir,
				'tgl_lahir' => $tgl_lahir,
				'alamat' => $alamat,
				'no_telp' => $no_telp,
				'image' => $image
			);
		}	
	
		$this->db->insert('tb_admin', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Admin", "Menambah Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function HapusDataAdmin($id_admin)
	{
		$this->db->delete('tb_admin', ['id_admin' => $id_admin]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Admin", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function IdentitasDataAdmin($id_admin)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id_admin])->row_array();
	}

	public function getAdminById($id_admin)
	{
		return $this->db->get_where('tb_admin', ['id_admin' => $id_admin])->row_array();
	}

	public function UbahDataAdmin()
	{
		$data = [
			"id_admin" => $this->input->post('id_admin', true),
			"nama" => $this->input->post('nama', true),
			"jenis_kelamin" => $this->input->post('jenis_kelamin', true),
			"agama" => $this->input->post('agama', true),
			"tmpt_lahir" => $this->input->post('tmpt_lahir', true),
			"tanggal_lahir" => $this->input->post('tanggal_lahir', true),
			"alamat" => $this->input->post('alamat', true),
			"no_telp" => $this->input->post('no_telp', true),
			"image" => $this->input->post('image', true)
		];



		$this->db->where('id_admin',  $this->input->post('id_admin'));
		$this->db->update('tb_admin', $data);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Admin", "Ubah Data", $id, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function CariDataAdmin()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama', $cari);
		$this->db->or_like('id_admin', $cari);
		return $this->db->get('tb_admin')->result_array();
	}

	//Pagination
	public function CoutAllDosen()
	{
		return $this->db->count_all('tb_dosen','tb_mapel');
	}

}