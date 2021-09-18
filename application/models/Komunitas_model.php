<?php

class Komunitas_model extends CI_Model {
	public function GetDataKomunitas()
	{
		$query = $this->db->get('tb_komunitas');
		return $query->result_array();
	}

	public function TambahDataKomunitas()
	{	
		$id_komunitas =  $this->input->post('id_komunitas', true);
		$nama_komunitas = $this->input->post('nama_komunitas', true);
		$daerah = $this->input->post('daerah', true);
		$data_created = date('Y-m-d H:i:s');
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
			'id_komunitas' => $id_komunitas,
			'nama_komunitas' => $nama_komunitas,
			// 'jumlah_member' => $jumlah,
			'daerah' => $daerah,
			'data_created' => $data_created,
			'image' => $image 
		);

		$this->db->insert('tb_komunitas', $data);
		$nama_komunitas = $this->input->post('nama_komunitas', true);
			if($this->db->affected_rows() > 0)
			{
				$assign_to  = '';
				$assign_type= '';
				activity_log("Data Komunitas", "Tambah Data", $nama_komunitas, $assign_to, $assign_type);
				return true;
			}
			else
			{
			return false;
			}
		}
	}		

	public function CariDataKomunitas()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama_komunitas', $cari);
		$this->db->or_like('id_komunitas', $cari);
		return $this->db->get('tb_komunitas')->result_array();
	}

	public function HapusDataKomunitas($id_komunitas)
	{
		$this->db->delete('tb_komunitas', ['id_komunitas' => $id_komunitas]);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Komunitas", "Hapus Data", $id_komunitas, $assign_to, $assign_type);
			return true;
		}
		else
		{
		return false;
		}
	}

	public function IdentitasDataKomunitas($id_komunitas)
	{
		return $this->db->get_where('tb_komunitas', ['id_komunitas' => $id_komunitas])->row_array();
	}

	public function UbahDataKomunitas()
	{
		$nama_komunitas = $this->input->post('nama_komunitas', true);		
		$image = $_FILES['image'];
		$daerah = $this->input->post('daerah', true);
		$data_created = $this->input->post('data_created', true);
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
				$image = $this->upload->data('file_name');
			}
			
			$data = array(
				'nama_komunitas' => $nama_komunitas,
				'image' => $image,
				'daerah' => $daerah,
				'data_created' => $data_created
			);
		}
		$this->db->where('id_komunitas', $this->input->post('id_komunitas'));
		$this->db->update('tb_komunitas', $data);
		$nama_komunitas = $this->input->post('nama_komunitas', true);
		if($this->db->affected_rows() > 0)
		{
			$assign_to  = '';
			$assign_type= '';
			activity_log("Data Komunitas", "Ubah Data", $nama_komunitas, $assign_to, $assign_type);
			return true;
			}
			else
			{
			return false;
			}
	}

	public function hitungJumlahMemberKomunitas()
	{
	   $query = $this->db->get('tb_user');
	   if($query->num_rows()>0)
	   {
	     return $query->num_rows();
	   }
	   else
	   {
	     return 0;
	   }
	}	
}	