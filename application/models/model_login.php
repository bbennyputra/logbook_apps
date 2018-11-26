<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model{

	function __construct(){
		parent::__construct();

		$this->tbl ="tbl_user";	
	}

	function cek_user($username="",$password=""){
		$query = $this->db->join('ref_level', 'tbl_user.level_id = ref_level.level_id', 'left')
						  	->get_where($this->tbl, array('username'=>$username, 'password'=>$password));

		// $query = $this->db->query("SELECT a.username,
		// 								  a.password,
		// 								  a.nama,
		// 								  a.level_id,
		// 								  b.level_name 
		// 							FROM user a
		// 							LEFT JOIN ref_level b ON a.level_id = b.level_id 
		// 							WHERE a.username = '$username' AND a.password = '$password'");
		$query = $query->result_array();
		return $query;
				
	}

	function ambil_user($username=""){
		$query = $this->db->join('ref_level', 'tbl_user.level_id = ref_level.level_id', 'left')
							->get_where($this->tbl, array('username'=>$username));
		$query = $query->result_array();
		if ($query) {
			return $query[0];
		}
	}
}