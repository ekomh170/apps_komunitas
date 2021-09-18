<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Log_model extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tb_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function GetDataLog()
    {
    	$query = $this->db->get('tb_log');
		return $query->result_array();
    }

    public function DeleteAllData()
    {
        $this->db->truncate('tb_log');
    }

    public function DeleteData($id_log)
    {
        $this->db->get_where('tb_log' , ['id_log' => $id_log])->row_array();
    }
}    

   // function ambildata() {
   //      $ambildata = $this->db->get('tb_log');
   //      if ($ambildata->num_rows() > 0) {
   //          foreach ($ambildata->result() as $data) {
   //              $hasilsiswa[] = $data;
   //          }
   //          return $hasilsiswa;
   //      }
   //  }

   //  function remove_checked_siswa() {
   //      $action = $this->input->post('action');
   //      if ($action == "delete") { 
   //          $delete = $this->input->post('msg');
   //          for ($i=0; $i < count($delete) ; $i++) { 
   //              $this->db->where('id_log', $delete[$i]);
   //              $this->db->delete('tb_log');
   //          }
   //      }
   //  }