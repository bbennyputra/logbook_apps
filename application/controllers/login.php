<?php if(!defined('BASEPATH')) exit('No direct script access alolowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_login');
	}
	
	function index(){
		$session=$this->session->userdata('isLogin');
		if($session==FALSE){
			$this->load->view('login/login_view2');
		} else {
			redirect('logbook/index');
		}
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');

		$cek = $this->model_login->cek_user($username, md5($password));

		if(count($cek)==1){
			foreach ($cek as $cek1) {
				$level_id = $cek1['level_id'];
				$status = $cek1['status'];
				$nama = $cek1['nama'];
				$username = $cek1['username'];
				$level_name = $cek1['level_name'];
			}

			$this->session->set_userdata(array(
					'isLogin'=>TRUE,
					'username'=>$username,
					'nama'=>$nama,
					'level_id'=>$level_id,
					'status'=>$status,
					'level_name'=>$level_name,
			));

			redirect('logbook/index', 'refresh');
		} else {
			echo "<script>alert('Gagal Login!')</script>";
			redirect('login/index', 'refresh');
		}
	}

}				