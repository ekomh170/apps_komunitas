<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class LogLogin_model extends CI_Model {

    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tb_log_login',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function GetDataLogLogin()
    {
    	$query = $this->db->get('tb_log_login');
		return $query->result_array();
    }

    public function DeleteAllLogin()
    {
        $this->db->truncate('tb_log_login');
    }

     public function DeleteDatalogin($id_log)
    {
        $this->db->get_where('tb_log_login', ['id_log' => $id_log])->row_array($id_log);
    }
}