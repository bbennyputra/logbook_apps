<?php
 	defined('BASEPATH') OR exit('No direct script access allowed');

	class Logbook extends CI_Controller {

		function __construct(){
			parent::__construct();

			$this->load->model('m_logbook');
			$this->load->model('model_login');
			$this->auth->cek_auth();
			$this->load->helper(array('form', 'url'));
		}

		function login(){
			$session=$this->session->userdata('isLogin');
			if ($session==FALSE) {
				$this->load->view('login_form');
			}
			else{
				redirect('dashboard');
			}
		}

		function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}

		function index(){
			$ambil_akun=$this->model_login->ambil_user($this->session->userdata('username'));
			$data=array(
				'user'=>$ambil_akun,
			);
			
			$stat=$this->session->userdata('level_id');
			
			if ($stat==1) 
				{
					redirect('logbook/user', $data);
				}
			elseif ($stat==2) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==3) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==4) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==5) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==6) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==7) 
				{
					redirect('logbook/dashboard', $data);
				}
			elseif ($stat==8) 
				{
					redirect('logbook/dashboard', $data);
					// echo $stat;
				}
			else 
				{
					echo "HALAMAN TIDAK DITEMUKAN";
				}
		}

		function user(){	
			// if($_SESSION['level_id']=="1"){

			// 	$username = $this->session->userdata('username');
			// 	$sess_data=array(
			// 		'username'=>$username,
			// 	);
			// 	$this->session->set_userdata($sess_data);
				$username = $this->session->userdata('username');
				$data=array(
					'title'=>'User | Logbook Apps',
					'data_user' => $this->m_logbook->joinUserWithLevel(),
					'data_level'=>$this->m_logbook->getAllData('ref_level'),
					'data_user1' => $this->m_logbook->getSingleDataUser($username),
					// 'data_user1' => $this->m_logbook->getSingleDataUser($username),
					// 'username'=>$this->session->userdata('username'),
				);

				$this->load->view('layout/header',$data);
				$this->load->view('layout/sidebar');
	      		$this->load->view('logbook/v_user');
	      		$this->load->view('layout/footer');
   //    		}

   //    		else 
   //    		{
			// 	die("Anda Bukan Admin! <a href=\"javascript:history.back()\">Kembali</a>");//jika bukan admin jangan lanjut
			// }
		}

		function tambah_user(){
			$data=array(
				// 'id'=>$this->input->post('id'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'nama'=>$this->input->post('nama'),
				'level_id'=>$this->input->post('level_id'),
				'status'=>$this->input->post('status'),
			);

			$this->m_logbook->insertData('tbl_user', $data);
			redirect('logbook/user');
		}

		function edit_user(){
			$id['id']=$this->input->post('id');
			$data=array(
				'username'=>$this->input->post('username'),
				'nama'=>$this->input->post('nama'),
				'level_id'=>$this->input->post('level_id'),
				'status'=>$this->input->post('status'),
			);

			$this->m_logbook->updateData('tbl_user', $data, $id);
			redirect('logbook/user');
		}

		function hapus_user(){
			$id['id']=$this->input->post('id');

			$this->m_logbook->deleteData('tbl_user', $id);
			redirect('logbook/user');
		}

		function dashboard(){
			// if($_SESSION['level_id']=="1" || $_SESSION['level_id']=="4" || $_SESSION['level_id']=="2"){

			// 	$username = $this->session->userdata('username');
			// 	$sess_data=array(
			// 		'username'=>$username,
			// 	);

			// 	$this->session->set_userdata($sess_data);
				$username = $this->session->userdata('username');
				$skr = date("Y-m-d");
				$data=array(
					'title'=>'Dashboard | Logbook Apps',
					'header_box_title'=>'Dashboard',
				
					// 'data_visit_per_month'=>$this->m_logbook->getDataVisitPerMonth(),
					'data_user1' => $this->m_logbook->getSingleDataUser($username),
					'total_pembukaan_rekening_individu'=>$this->m_logbook->total_pembukaan_rekening_individu(),
					'selesai_pembukaan_rekening_individu'=>$this->m_logbook->selesai_pembukaan_rekening_individu(),
					'pending_pembukaan_rekening_individu'=>$this->m_logbook->pending_pembukaan_rekening_individu(),
					'reject_pembukaan_rekening_individu'=>$this->m_logbook->reject_pembukaan_rekening_individu(),
					'total_pembukaan_rekening_institusi'=>$this->m_logbook->total_pembukaan_rekening_institusi(),
					'selesai_pembukaan_rekening_institusi'=>$this->m_logbook->selesai_pembukaan_rekening_institusi(),
					'pending_pembukaan_rekening_institusi'=>$this->m_logbook->pending_pembukaan_rekening_institusi(),
					'reject_pembukaan_rekening_institusi'=>$this->m_logbook->reject_pembukaan_rekening_institusi(),
					'total_subscription'=>$this->m_logbook->total_subscription(),
					'selesai_subscription'=>$this->m_logbook->selesai_subscription(),
					'pending_subscription'=>$this->m_logbook->pending_subscription(),
					'cancel_subscription'=>$this->m_logbook->cancel_subscription(),
					'total_redemption'=>$this->m_logbook->total_redemption(),
					'selesai_redemption'=>$this->m_logbook->selesai_redemption(),
					'pending_redemption'=>$this->m_logbook->pending_redemption(),
					'total_switching'=>$this->m_logbook->total_switching(),
					'selesai_switching'=>$this->m_logbook->selesai_switching(),
					'pending_switching'=>$this->m_logbook->pending_switching(),
					// 'new_form_edit_count'=>$this->m_logbook->notif_new_form_edit_count(),
					// 'total_visit_count'=>$this->m_logbook->notif_total_visit_count(),
					// 'total_form_edit_count'=>$this->m_logbook->notif_total_form_edit_count(),
					// 'data_user1' => $this->m_logbook->getSingleDataUser($username),
					// 'username'=>$this->session->userdata('username'),
			);

				$this->load->view('layout/header',$data);
				$this->load->view('layout/sidebar');
      			$this->load->view('logbook/v_dashboard2');
      			$this->load->view('layout/footer');
      		
   //    		}

   //    		else 
   //    		{
			// 	die("Anda Bukan Admin! <a href=\"javascript:history.back()\">Kembali</a>");//jika bukan admin jangan lanjut
			// }
		}

		function subscription(){
			$username = $this->session->userdata('username');
			$data=array(
				'title'=>'Subscripton | Logbook Apps',
				'page'=>'Marketing',
				
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'kode_subs'=>$this->m_logbook->kode_subscription(),
				'data_subscription'=>$this->m_logbook->data_subscription(),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_subscription');
      		$this->load->view('layout/footer');
		}

		function approval_subscription(){
			$username = $this->session->userdata('username');
			$kode_subscription=$this->input->get('kode_subscription');
			$data=array(
				'title'=>'Approval Subscripton | Logbook Apps',
				'page'=>'Marketing',

				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				
				'data_subscription'=>$this->m_logbook->data_approval_subscription($kode_subscription),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval_with_reject'=>$this->m_logbook->list_approval_with_reject(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_approval_yesno'=>$this->m_logbook->list_approval_yesno(),
				'ref_approval_goodfund'=>$this->m_logbook->list_approval_goodfund(),
				'ref_fungsi'=>$this->m_logbook->list_fungsi(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_approval_subscription3');
      		$this->load->view('layout/footer');
		}

		function tambah_subscription(){
			$nama_nasabah1=$this->input->post('nama_nasabah');
			$nama_nasabah2=$this->input->post('nama_nasabah2');
			$nama_sales1=$this->input->post('nama_sales');
			$nama_sales2=$this->input->post('nama_sales2');

			if ($nama_nasabah1!='') {
				$nama_nasabah=$nama_nasabah1;
			}
			else {
				$nama_nasabah=$nama_nasabah2;
			}

			if ($nama_sales1!='') {
				$nama_sales=$nama_sales1;
			}
			else {
				$nama_sales=$nama_sales2;
			}

			$data=array(
				'kode_subscription'=>$this->input->post('kode_subscription'),
				'tanggal_input'=>date("Y-m-d", strtotime($this->input->post('tanggal_input'))),
				'kode_fund'=>$this->input->post('kode_fund'),
				'nama_fund'=>$this->input->post('nama_fund'),
				'no_rekening_fund'=>$this->input->post('no_rekening_fund'),
				'nama_bank_rekening_fund'=>$this->input->post('nama_bank_rekening_fund'),
				'nominal'=>str_replace('.', '', $this->input->post('nominal')),
				'nama_sales'=>$nama_sales,
				'fee'=>str_replace('.', '', $this->input->post('fee')),
				'nama_nasabah'=>$nama_nasabah,
				'sid_nasabah'=>$this->input->post('sid_nasabah'),
				'numerator'=>$this->input->post('numerator'),
				'ttd_nasabah'=>$this->input->post('ttd_nasabah'),
				'ttd_sales'=>$this->input->post('ttd_sales'),
				'timestamp'=>$this->input->post('timestamp'),		
				'approval_sales'=>'2',
				'approval_input_sinvest'=>'5',
				'approval_input_s21'=>'5',
				'approval_spv_settlement'=>'5',
				'approval_head_operation'=>'2',
				'approval_good_fund'=>'2',
				'approval_softcopy'=>'2',
				'approval_surat_konfirmasi_asli'=>'2',
				'status'=>'2',
			);

			$this->m_logbook->insertData('tbl_subscription', $data);
			redirect('logbook/subscription');
		}

		function edit_subscription(){
			$id['kode_subscription']=$this->input->post('kode_subscription');
			$data=array(
				// 'kode_fund'=>$this->input->post('kode_fund'),
				// 'nama_fund'=>$this->input->post('nama_fund'),
				// 'no_rekening_fund'=>$this->input->post('no_rekening_fund'),
				// 'nama_bank_rekening_fund'=>$this->input->post('nama_bank_rekening_fund'),
				'nominal'=>$this->input->post('nominal'),
				// 'nama_sales'=>$this->input->post('nama_sales'),
				'fee'=>$this->input->post('fee'),
				// 'nama_nasabah'=>$this->input->post('nama_nasabah'),
				// 'sid_nasabah'=>$this->input->post('sid_nasabah'),
				'numerator'=>$this->input->post('numerator'),
				'ttd_nasabah'=>$this->input->post('ttd_nasabah'),
				'ttd_sales'=>$this->input->post('ttd_sales'),
				'timestamp'=>$this->input->post('timestamp'),		
			);

			$this->m_logbook->updateData('tbl_subscription', $data, $id);
			redirect('logbook/subscription');
		}

		function hapus_subscription(){
			$id['kode_subscription']=$this->input->post('kode_subscription');

			$this->m_logbook->deleteData('tbl_subscription', $id);
			redirect('logbook/subscription');
		}

		// function update_approval_subscription(){
		// 	$data123=$this->input->post('kode_subscription');
		// 	$id['kode_subscription'] = $this->input->post('kode_subscription');

		// 	$data = array(
		// 		'approval_sales' => $this->input->post('approval_sales'),
		// 		'approval_input_s21' => $this->input->post('approval_input_s21'),
		// 		'approval_input_sinvest' => $this->input->post('approval_input_sinvest'),
		// 		'approval_good_fund' => $this->input->post('approval_good_fund'),
		// 		'approval_softcopy' => $this->input->post('approval_softcopy'),
		// 		'approval_surat_konfirmasi_asli' => $this->input->post('approval_surat_konfirmasi_asli'),
		// 		'approval_konfirmasi_nasabah' => $this->input->post('approval_konfirmasi_nasabah'),
		// 	);

		// 		if ($data['approval_sales']==2) {
		// 			$data = array(
		// 				'approval_sales' => 2,
		// 				'approval_input_s21' => 2,
		// 				'approval_input_sinvest' => 2,
		// 				'approval_good_fund' => 2,
		// 				'approval_softcopy' => 2,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==2 ) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 2,
		// 				'approval_input_sinvest' => 2,
		// 				'approval_good_fund' => 2,
		// 				'approval_softcopy' => 2,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==2) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 1,
		// 				'approval_input_sinvest' => 2,
		// 				'approval_good_fund' => 2,
		// 				'approval_softcopy' => 2,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		// elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_good_fund'] == 3) {
		// 		// 	$data = array(
		// 		// 		'approval_sales' => 1,
		// 		// 		'approval_input_s21' => 1,
		// 		// 		'approval_input_sinvest' => 1,
		// 		// 		'approval_good_fund' => 3,
		// 		// 		'approval_softcopy' => 2,
		// 		// 		'approval_surat_konfirmasi_asli' => 2,
		// 		// 		'approval_konfirmasi_nasabah' => 3,
		// 		// 	);				
		// 		// }
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_good_fund'] == 2) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 1,
		// 				'approval_input_sinvest' => 1,
		// 				'approval_good_fund' => 2,
		// 				'approval_softcopy' => 2,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_good_fund'] == 1 && $data['approval_softcopy'] == 2) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 1,
		// 				'approval_input_sinvest' => 1,
		// 				'approval_good_fund' => 1,
		// 				'approval_softcopy' => 2,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_good_fund'] == 1 && $data['approval_softcopy'] == 1 && $data['approval_konfirmasi_nasabah']==2) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 1,
		// 				'approval_input_sinvest' => 1,
		// 				'approval_good_fund' => 1,
		// 				'approval_softcopy' => 1,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 2,
		// 			);				
		// 		}
		// 		elseif ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_good_fund'] == 1 && $data['approval_softcopy'] == 1 && $data['approval_konfirmasi_nasabah']==1 && $data['approval_surat_konfirmasi_asli']==2) {
		// 			$data = array(
		// 				'approval_sales' => 1,
		// 				'approval_input_s21' => 1,
		// 				'approval_input_sinvest' => 1,
		// 				'approval_good_fund' => 1,
		// 				'approval_softcopy' => 1,
		// 				'approval_surat_konfirmasi_asli' => 2,
		// 				'approval_konfirmasi_nasabah' => 1,
		// 			);				
		// 		}
		// 		else {

		// 		}

		// 	$this->m_logbook->updateData('tbl_subscription', $data, $id);
		// 	redirect('logbook/approval_subscription?kode_subscription='.$data123);
		// }

		function update_approval_subscription(){
			$data123=$this->input->post('kode_subscription');
			$id['kode_subscription'] = $this->input->post('kode_subscription');

			$data=array(
				'data_subs'=>$this->m_logbook->data_subscription(),
			);

			$stat=$this->session->userdata('level_id');

			$approval_sales = $this->input->post('approval_sales');
			$approval_input_s21 = $this->input->post('approval_input_s21');
			$approval_input_sinvest = $this->input->post('approval_input_sinvest');
			$approval_head_operation = $this->input->post('approval_head_operation');
			$approval_good_fund = $this->input->post('approval_good_fund');
			$approval_softcopy = $this->input->post('approval_softcopy');
			$approval_spv_settlement = $this->input->post('approval_spv_settlement');
			$approval_surat_konfirmasi_asli = $this->input->post('approval_surat_konfirmasi_asli');

			if ($approval_good_fund==6) {
				$status1=6;
			}
			elseif ($approval_good_fund==2) {
				$status1=2;
			}
			elseif ($approval_surat_konfirmasi_asli==1) {
				$status1=1;
			}
			elseif ($approval_surat_konfirmasi_asli==2) {
				$status1=2;
			}
			else {
				$status1=2;
			}

			if ($approval_head_operation=='2') {
				$ops='2';
			}
			elseif ($approval_head_operation=='') {
				$ops='2';
			}
			elseif ($approval_head_operation=='1') {
				$ops='1';
			}
			else {
				$ops='2';
			}

			if ($approval_good_fund=='2') {
				$dana='2';
			}
			elseif ($approval_good_fund=='') {
				$dana='2';
			}
			elseif ($approval_good_fund=='3') {
				$dana='3';
			}
			elseif ($approval_good_fund=='1') {
				$dana='1';
			}
			elseif ($approval_good_fund=='6') {
				$dana='6';
			}
			else {
				$dana='2';
			}

			if ($approval_softcopy=='2') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='1') {
				$softcopy='1';
			}
			else {
				$softcopy='2';
			}

			if ($approval_surat_konfirmasi_asli=='2') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='1') {
				$surat='1';
			}
			else {
				$surat='2';
			}

			$data = array(
				'approval_head_operation' => $ops,
				'approval_good_fund' => $dana,
				'approval_softcopy' => $softcopy,
				'approval_surat_konfirmasi_asli' => $surat,
				'status' => $status1
				
			);

			if ($stat==2 || $stat==7) {
				$data=array(
					'approval_sales' => $approval_sales,
					'approval_surat_konfirmasi_asli'=>$approval_surat_konfirmasi_asli,
					'status' => $status1
				);
			}

			elseif ($stat==3) {
				$data=array(
					'approval_input_sinvest' => $approval_input_sinvest,
					'approval_input_s21' => $approval_input_s21,
					'approval_good_fund' => $approval_good_fund,
					'approval_softcopy' => $approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==4) {
				$data=array(
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_good_fund' => $approval_good_fund,
					'approval_softcopy' => $approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==5) {
				$data=array(
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_head_operation' => $approval_head_operation,
					'approval_good_fund' => $approval_good_fund,
					'approval_softcopy' => $approval_softcopy,
					'status' => $status1
				);
			}

			// elseif ($stat==5) {
			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_good_fund']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_good_fund' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_good_fund']==3) {
			// 		$data = array(
			// 			'approval_good_fund' => 3,
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_good_fund']==6) {
			// 		$data = array(
			// 			'approval_good_fund' => 6,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_good_fund']==1 && $data['approval_softcopy']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_good_fund' => 1,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_good_fund']==1 && $data['approval_softcopy']==1 && $data['approval_surat_konfirmasi_asli']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_good_fund' => 1,
			// 			'approval_softcopy' => 1,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}
			// }

			$this->m_logbook->updateData('tbl_subscription', $data, $id);
			// redirect('logbook/approval_subscription?kode_subscription='.$data123);
			redirect('logbook/subscription');
		}

		function redemption(){
			$username = $this->session->userdata('username');
			$data=array(

				'title'=>'Redemption | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'kode_redm'=>$this->m_logbook->kode_redemption(),
				'data_redemption'=>$this->m_logbook->data_redemption(),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				// 'ref_max_redm'=>$this->m_logbook->list_max_redm(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_redemption');
      		$this->load->view('layout/footer');
		}

		function tambah_redemption(){
			$nominal_redemption = $this->input->post('nominal_redemption');
			$up_redemption=$this->input->post('up_redemption');
			$redm_all=$this->input->post('redm_all');
			$no_rek1=$this->input->post('no_rekening_penerima');
			$no_rek2=$this->input->post('no_rekening_penerima1');
			$nama_bank1=$this->input->post('nama_bank_rekening_penerima');
			$nama_bank2=$this->input->post('nama_bank_rekening_penerima1');

			if ($redm_all!='') {
				$nominal=$redm_all;
			}
			else {
				$nominal=$nominal_redemption;
			}

			if ($no_rek1!='') {
				$no_rek=$no_rek1;
			}
			else {
				$no_rek=$no_rek2;
			}

			if ($nama_bank1!='') {
				$nama_bank=$nama_bank1;
			}
			else {
				$nama_bank=$nama_bank2;
			}

			$data=array(
				'kode_redemption'=>$this->input->post('kode_redemption'),
				'tanggal_input'=>date("Y-m-d", strtotime($this->input->post('tanggal_input'))),
				'kode_fund'=>$this->input->post('kode_fund'),
				'nama_fund'=>$this->input->post('nama_fund'),
				'no_rekening_penerima'=>$no_rek,
				'nama_bank_rekening_penerima'=>$nama_bank,
				'nominal_redemption'=>str_replace('.', '', $nominal),
				'up_redemption'=>str_replace('.', '', $this->input->post('up_redemption')),
				'payment_date'=>$this->input->post('payment_date'),
				'no_hp'=>$this->input->post('no_hp'),
				'nama_sales'=>$this->input->post('nama_sales'),
				'redemption_fee'=>str_replace('.', '', $this->input->post('redemption_fee')),
				'nama_nasabah'=>$this->input->post('nama_nasabah'),
				'sid_nasabah'=>$this->input->post('sid_nasabah'),
				'numerator'=>$this->input->post('numerator'),
				'ttd_nasabah'=>$this->input->post('ttd_nasabah'),
				'ttd_sales'=>$this->input->post('ttd_sales'),
				'timestamp'=>$this->input->post('timestamp'),		
				'approval_sales'=>'2',
				'approval_input_sinvest'=>'5',
				'approval_input_s21'=>'5',
				'approval_spv_settlement'=>'5',
				'approval_head_operation'=>'2',
				'approval_monitoring_pembayaran'=>'2',
				'approval_softcopy'=>'2',
				'approval_surat_konfirmasi_asli'=>'2',
				'status'=>'2',
			);

			$this->m_logbook->insertData('tbl_redemption', $data);
			redirect('logbook/redemption');
		}

		function hapus_redemption(){
			$id['kode_redemption']=$this->input->post('kode_redemption');

			$this->m_logbook->deleteData('tbl_redemption', $id);
			redirect('logbook/redemption');
		}

		function approval_redemption(){
			$username = $this->session->userdata('username');
			$kode_redemption=$this->input->get('kode_redemption');
			$data=array(
				'title'=>'Approval Redempton | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),			
				'data_approval_redemption'=>$this->m_logbook->data_approval_redemption($kode_redemption),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval_with_reject'=>$this->m_logbook->list_approval_with_reject(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_approval_yesno'=>$this->m_logbook->list_approval_yesno(),
				'ref_approval_goodfund'=>$this->m_logbook->list_approval_goodfund(),
				'ref_fungsi'=>$this->m_logbook->list_fungsi(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_approval_redemption');
      		$this->load->view('layout/footer');
		}
		
		function update_approval_redemption(){
			$data123=$this->input->post('kode_redemption');
			$id['kode_redemption'] = $this->input->post('kode_redemption');

			$stat=$this->session->userdata('level_id');

			$approval_sales = $this->input->post('approval_sales');
			$approval_input_s21 = $this->input->post('approval_input_s21');
			$approval_input_sinvest = $this->input->post('approval_input_sinvest');
			$approval_head_operation = $this->input->post('approval_head_operation');
			$approval_monitoring_pembayaran = $this->input->post('approval_monitoring_pembayaran');
			$approval_softcopy = $this->input->post('approval_softcopy');
			$approval_spv_settlement = $this->input->post('approval_spv_settlement');
			$approval_surat_konfirmasi_asli = $this->input->post('approval_surat_konfirmasi_asli');

			if ($approval_monitoring_pembayaran==6) {
				$status1=6;
			}
			elseif ($approval_monitoring_pembayaran==2) {
				$status1=2;
			}
			elseif ($approval_surat_konfirmasi_asli==1) {
				$status1=1;
			}
			elseif ($approval_surat_konfirmasi_asli==2) {
				$status1=2;
			}
			else {
				$status1=2;
			}

			if ($approval_head_operation=='2') {
				$ops='2';
			}
			elseif ($approval_head_operation=='') {
				$ops='2';
			}
			elseif ($approval_head_operation=='1') {
				$ops='1';
			}
			else {
				$ops='2';
			}

			if ($approval_monitoring_pembayaran=='2') {
				$dana='2';
			}
			elseif ($approval_monitoring_pembayaran=='') {
				$dana='2';
			}
			elseif ($approval_monitoring_pembayaran=='3') {
				$dana='3';
			}
			elseif ($approval_monitoring_pembayaran=='1') {
				$dana='1';
			}
			elseif ($approval_monitoring_pembayaran=='6') {
				$dana='6';
			}
			else {
				$dana='2';
			}

			if ($approval_softcopy=='2') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='1') {
				$softcopy='1';
			}
			else {
				$softcopy='2';
			}

			if ($approval_surat_konfirmasi_asli=='2') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='1') {
				$surat='1';
			}
			else {
				$surat='2';
			}

			$data = array(
				'approval_head_operation' => $ops,
				'approval_monitoring_pembayaran' => $dana,
				'approval_softcopy' => $softcopy,
				'approval_surat_konfirmasi_asli' => $surat,
				'status' => $status1
				
			);

			if ($stat==2 || $stat==7) {
				$data=array(
					'approval_sales' => $approval_sales,
					'approval_surat_konfirmasi_asli'=>$approval_surat_konfirmasi_asli,
					'status' => $status1
				);
			}

			elseif ($stat==3) {
				$data=array(
					'approval_input_sinvest' => $approval_input_sinvest,
					'approval_input_s21' => $approval_input_s21,
					'approval_monitoring_pembayaran'=>$approval_monitoring_pembayaran,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==4) {
				$data=array(
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_monitoring_pembayaran'=>$approval_monitoring_pembayaran,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==5) {
				$data=array(
					'approval_head_operation'=>$approval_head_operation,
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_monitoring_pembayaran'=>$approval_monitoring_pembayaran,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			// elseif ($stat==5) {
			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pembayaran']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pembayaran' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_monitoring_pembayaran']==3) {
			// 		$data = array(
			// 			'approval_monitoring_pembayaran' => 3,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_monitoring_pembayaran']==6) {
			// 		$data = array(
			// 			'approval_monitoring_pembayaran' => 6,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pembayaran']==1 && $data['approval_softcopy']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pembayaran' => 1,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pembayaran']==1 && $data['approval_softcopy']==1 && $data['approval_surat_konfirmasi_asli']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pembayaran' => 1,
			// 			'approval_softcopy' => 1,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}
			// }

			// $approval_sales = $this->input->post('approval_sales');
			// $approval_input_s21 = $this->input->post('approval_input_s21');
			// $approval_input_sinvest = $this->input->post('approval_input_sinvest');
			// $approval_monitoring_pembayaran = $this->input->post('approval_monitoring_pembayaran');
			// $approval_softcopy = $this->input->post('approval_softcopy');
			// $approval_surat_konfirmasi_asli = $this->input->post('approval_surat_konfirmasi_asli');

			// if ($approval_sales=='2') {
			// 	$sales='2';
			// }
			// elseif ($approval_sales=='') {
			// 	$sales='2';
			// }
			// elseif ($approval_sales==1) {
			// 	$sales='1';
			// }
			// else {
			// 	$sales='';
			// }

			// if ($approval_input_s21=='2') {
			// 	$s21='2';
			// }
			// elseif ($approval_input_s21=='') {
			// 	$s21='2';
			// }
			// elseif ($approval_input_s21==1) {
			// 	$s21='1';
			// }
			// else {
			// 	$kadiv='';
			// }

			// if ($approval_input_sinvest=='2') {
			// 	$sinvest='2';
			// }
			// elseif ($approval_input_sinvest=='') {
			// 	$sinvest='2';
			// }
			// elseif ($approval_input_sinvest==1) {
			// 	$sinvest='1';
			// }
			// else {
			// 	$sinvest='';
			// }

			// if ($approval_monitoring_pembayaran=='2') {
			// 	$dana='2';
			// }
			// elseif ($approval_monitoring_pembayaran=='') {
			// 	$dana='2';
			// }
			// elseif ($approval_monitoring_pembayaran==1) {
			// 	$dana='1';
			// }
			// else {
			// 	$dana='';
			// }

			// if ($approval_softcopy=='2') {
			// 	$softcopy='2';
			// }
			// elseif ($approval_softcopy=='') {
			// 	$softcopy='2';
			// }
			// elseif ($approval_softcopy==1) {
			// 	$softcopy='1';
			// }
			// else {
			// 	$softcopy='';
			// }

			// if ($approval_surat_konfirmasi_asli=='2') {
			// 	$surat='2';
			// }
			// elseif ($approval_surat_konfirmasi_asli=='') {
			// 	$surat='2';
			// }
			// elseif ($approval_surat_konfirmasi_asli==1) {
			// 	$surat='1';
			// }
			// else {
			// 	$surat='';
			// }

			// $data = array(
			// 	'approval_sales' => $sales,
			// 	'approval_input_s21' => $s21,
			// 	'approval_input_sinvest' => $sinvest,
			// 	'approval_monitoring_pembayaran' => $dana,
			// 	'approval_softcopy' => $softcopy,
			// 	'approval_surat_konfirmasi_asli' => $surat,
				
			// );

			// 	if ($data['approval_sales']==2) {
			// 		$data = array(
			// 			'approval_sales' => 2,
			// 			'approval_input_s21' => 2,
			// 			'approval_input_sinvest' => 2,
			// 			'approval_monitoring_pembayaran' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}


			// 	if ($data['approval_sales']==1 && $data['approval_input_s21']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_s21' => 2,
			// 			'approval_input_sinvest' => 2,
			// 			'approval_monitoring_pembayaran' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_s21' => 1,
			// 			'approval_input_sinvest' => 2,
			// 			'approval_monitoring_pembayaran' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_monitoring_pembayaran']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_s21' => 1,
			// 			'approval_input_sinvest' => 1,
			// 			'approval_monitoring_pembayaran' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_monitoring_pembayaran']==1 && $data['approval_softcopy']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_s21' => 1,
			// 			'approval_input_sinvest' => 1,
			// 			'approval_monitoring_pembayaran' => 1,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_s21']==1 && $data['approval_input_sinvest']==1 && $data['approval_monitoring_pembayaran']==1 && $data['approval_softcopy']==1 && $data['approval_surat_konfirmasi_asli']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_s21' => 1,
			// 			'approval_input_sinvest' => 1,
			// 			'approval_monitoring_pembayaran' => 1,
			// 			'approval_softcopy' => 1,
			// 			'approval_surat_konfirmasi_asli' => 2,
						
			// 		);				
			// 	}
			// 	else {

			// 	}
				
				
			$this->m_logbook->updateData('tbl_redemption', $data, $id);
			// redirect('logbook/approval_redemption?kode_redemption='.$data123);
			redirect('logbook/redemption');
		}
		
		function switching(){
			$username = $this->session->userdata('username');
			$data=array(
				'title'=>'Switching | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'kode_swtc'=>$this->m_logbook->kode_switching(),
				'data_switching'=>$this->m_logbook->data_switching(),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				// 'ref_max_redm'=>$this->m_logbook->list_max_redm(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_switching');
      		$this->load->view('layout/footer');
		}

		function tambah_switching(){
			$nominal_switching = $this->input->post('nominal_switching');
			$up_switching=$this->input->post('up_switching');
			$swtc_all=$this->input->post('swtc_all');

			if ($swtc_all!='') {
				$nominal=$swtc_all;
			}
			else {
				$nominal=$nominal_switching;
			}

			$data=array(
				'kode_switching'=>$this->input->post('kode_switching'),
				'tanggal_input'=>date("Y-m-d", strtotime($this->input->post('tanggal_input'))),
				'kode_fund_redemption'=>$this->input->post('kode_fund_redemption'),
				'kode_fund_subscription'=>$this->input->post('kode_fund_subscription'),
				'nama_fund_redemption'=>$this->input->post('nama_fund_redemption'),
				'nama_fund_subscription'=>$this->input->post('nama_fund_subscription'),
				'nominal_switching'=>str_replace('.', '', $nominal),
				'up_switching'=>str_replace('.', '', $this->input->post('up_switching')),
				'no_hp'=>$this->input->post('no_hp'),
				'nama_sales'=>$this->input->post('nama_sales'),
				'fee'=>str_replace('.', '', $this->input->post('fee')),
				'nama_nasabah'=>$this->input->post('nama_nasabah'),
				'sid_nasabah'=>$this->input->post('sid_nasabah'),
				'numerator'=>$this->input->post('numerator'),
				'ttd_nasabah'=>$this->input->post('ttd_nasabah'),
				'ttd_sales'=>$this->input->post('ttd_sales'),
				'timestamp'=>$this->input->post('timestamp'),		
				'approval_sales'=>'2',
				'approval_input_sinvest'=>'5',
				'approval_input_s21'=>'5',
				'approval_spv_settlement'=>'5',
				'approval_head_operation'=>'2',
				'approval_monitoring_pemindahan_dana'=>'2',
				'approval_softcopy'=>'2',
				'approval_surat_konfirmasi_asli'=>'2',
				'status'=>'2',
			);

			$this->m_logbook->insertData('tbl_switching', $data);
			redirect('logbook/switching');
		}

		function hapus_switching(){
			$id['kode_switching']=$this->input->post('kode_switching');

			$this->m_logbook->deleteData('tbl_switching', $id);
			redirect('logbook/switching');
		}

		function approval_switching(){
			$username = $this->session->userdata('username');
			$kode_switching=$this->input->get('kode_switching');
			$data=array(
				'title'=>'Approval Switching | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'data_approval_switching'=>$this->m_logbook->data_approval_switching($kode_switching),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval_with_reject'=>$this->m_logbook->list_approval_with_reject(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_approval_yesno'=>$this->m_logbook->list_approval_yesno(),
				'ref_approval_goodfund'=>$this->m_logbook->list_approval_goodfund(),
				'ref_fungsi'=>$this->m_logbook->list_fungsi(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_approval_switching');
      		$this->load->view('layout/footer');
		}

		function update_approval_switching(){
			$data123=$this->input->post('kode_switching');
			$id['kode_switching'] = $this->input->post('kode_switching');

			$stat=$this->session->userdata('level_id');

			$approval_sales = $this->input->post('approval_sales');
			$approval_input_s21 = $this->input->post('approval_input_s21');
			$approval_input_sinvest = $this->input->post('approval_input_sinvest');
			$approval_head_operation = $this->input->post('approval_head_operation');
			$approval_monitoring_pemindahan_dana = $this->input->post('approval_monitoring_pemindahan_dana');
			$approval_softcopy = $this->input->post('approval_softcopy');
			$approval_spv_settlement = $this->input->post('approval_spv_settlement');
			$approval_surat_konfirmasi_asli = $this->input->post('approval_surat_konfirmasi_asli');

			if ($approval_good_fund==6) {
				$status1=6;
			}
			elseif ($approval_monitoring_pemindahan_dana==2) {
				$status1=2;
			}
			elseif ($approval_surat_konfirmasi_asli==1) {
				$status1=1;
			}
			elseif ($approval_surat_konfirmasi_asli==2) {
				$status1=2;
			}
			else {
				$status1=2;
			}

			if ($approval_head_operation=='2') {
				$ops='2';
			}
			elseif ($approval_head_operation=='') {
				$ops='2';
			}
			elseif ($approval_head_operation=='1') {
				$ops='1';
			}
			else {
				$ops='2';
			}

			if ($approval_monitoring_pemindahan_dana=='2') {
				$dana='2';
			}
			elseif ($approval_monitoring_pemindahan_dana=='') {
				$dana='2';
			}
			elseif ($approval_monitoring_pemindahan_dana=='3') {
				$dana='3';
			}
			elseif ($approval_monitoring_pemindahan_dana=='1') {
				$dana='1';
			}
			elseif ($approval_monitoring_pemindahan_dana=='6') {
				$dana='6';
			}
			else {
				$dana='2';
			}

			if ($approval_softcopy=='2') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='') {
				$softcopy='2';
			}
			elseif ($approval_softcopy=='1') {
				$softcopy='1';
			}
			else {
				$softcopy='2';
			}

			if ($approval_surat_konfirmasi_asli=='2') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='') {
				$surat='2';
			}
			elseif ($approval_surat_konfirmasi_asli=='1') {
				$surat='1';
			}
			else {
				$surat='2';
			}

			$data = array(
				'approval_head_operation' => $ops,
				'approval_monitoring_pemindahan_dana' => $dana,
				'approval_softcopy' => $softcopy,
				'approval_surat_konfirmasi_asli' => $surat,
				'status' => $status1
				
			);

			if ($stat==2 || $stat==7) {
				$data=array(
					'approval_sales' => $approval_sales,
					'approval_surat_konfirmasi_asli'=>$approval_surat_konfirmasi_asli,
					'status' => $status1
				);
			}

			elseif ($stat==3) {
				$data=array(
					'approval_input_sinvest' => $approval_input_sinvest,
					'approval_input_s21' => $approval_input_s21,
					'approval_monitoring_pemindahan_dana'=>$approval_monitoring_pemindahan_dana,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==4) {
				$data=array(
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_monitoring_pemindahan_dana'=>$approval_monitoring_pemindahan_dana,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			elseif ($stat==5) {
				$data=array(
					'approval_head_operation'=>$approval_head_operation,
					'approval_spv_settlement' => $approval_spv_settlement,
					'approval_monitoring_pemindahan_dana'=>$approval_monitoring_pemindahan_dana,
					'approval_softcopy'=>$approval_softcopy,
					'status' => $status1
				);
			}

			// elseif ($stat==5) {
			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pemindahan_dana']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pemindahan_dana' => 2,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_monitoring_pemindahan_dana']==3) {
			// 		$data = array(
			// 			'approval_monitoring_pemindahan_dana' => 3,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_monitoring_pemindahan_dana']==6) {
			// 		$data = array(
			// 			'approval_monitoring_pemindahan_dana' => 6,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pemindahan_dana']==1 && $data['approval_softcopy']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pemindahan_dana' => 1,
			// 			'approval_softcopy' => 2,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}

			// 	if ($data['approval_sales']==1 && $data['approval_input_sinvest']==4 && $data['approval_input_s21']==4 && $data['approval_spv_settlement']==4 && $data['approval_head_operation']==1 && $data['approval_monitoring_pemindahan_dana']==1 && $data['approval_softcopy']==1 && $data['approval_surat_konfirmasi_asli']==2) {
			// 		$data = array(
			// 			'approval_sales' => 1,
			// 			'approval_input_sinvest' => 4,
			// 			'approval_input_s21' => 4,
			// 			'approval_spv_settlement' => 4,
			// 			'approval_head_operation' => 1,
			// 			'approval_monitoring_pemindahan_dana' => 1,
			// 			'approval_softcopy' => 1,
			// 			'approval_surat_konfirmasi_asli' => 2,
			// 			'status' => $status1
			// 		);				
			// 	}
			// 	else {

			// 	}
			// }
				
			$this->m_logbook->updateData('tbl_switching', $data, $id);
			// redirect('logbook/approval_switching?kode_switching='.$data123);
			redirect('logbook/switching');
		}

		function pembukaan_rekening_individu(){
			$username = $this->session->userdata('username');
			$data=array(
				'title'=>'Pembukaan Rekening Individu| Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'kode_pembukaan_rekening_individu'=>$this->m_logbook->kode_pembukaan_rekening_individu(),
				'data_pembukaan_rekening_individu'=>$this->m_logbook->data_pembukaan_rekening_individu(),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_klasifikasi_resiko'=>$this->m_logbook->getAllData('ref_klasifikasi_resiko'),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_pembukaan_rekening_individu');
      		$this->load->view('layout/footer');
		}

		function tambah_pembukaan_rekening_individu(){
			$data=array(
				'kode_pembukaan_rekening_individu'=>$this->input->post('kode_pembukaan_rekening_individu'),
				'tanggal_input'=>date("Y-m-d", strtotime($this->input->post('tanggal_input'))),
				'nama_nasabah'=>$this->input->post('nama_nasabah'),
				'no_ktp'=>$this->input->post('no_ktp'),
				'email'=>$this->input->post('email'),
				'nama_sales'=>$this->input->post('nama_sales'),
				'checklist_ktp'=>$this->input->post('checklist_ktp'),
				'checklist_form_pembukaan_rekening'=>$this->input->post('checklist_form_pembukaan_rekening'),
				'checklist_npwp'=>$this->input->post('checklist_npwp'),
				'approval_crm'=>'2',
				'approval_kadiv_mkt'=>'2',
				'approval_input_s21'=>'5',
				'approval_input_sinvest'=>'5',
				'approval_senior_settlement'=>'5',
				'approval_head_operation'=>'2',
				'status'=>'2',
				'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
			);

			$this->m_logbook->insertData('tbl_pembukaan_rekening_individu', $data);
			redirect('logbook/pembukaan_rekening_individu');
		}

		function edit_pembukaan_rekening_individu(){
			$stat=$this->session->userdata('level_id');

			$id['kode_pembukaan_rekening_individu']=$this->input->post('kode_pembukaan_rekening_individu');
			
			if ($stat==6) {
				$data=array(
					'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
				);	
			}
			else {
				$data=array(
					'nama_nasabah'=>$this->input->post('nama_nasabah'),
					'no_ktp'=>$this->input->post('no_ktp'),
					'email'=>$this->input->post('email'),
					'nama_sales'=>$this->input->post('nama_sales'),
					'checklist_ktp'=>$this->input->post('checklist_ktp'),
					'checklist_npwp'=>$this->input->post('checklist_npwp'),
					'checklist_form_pembukaan_rekening'=>$this->input->post('checklist_form_pembukaan_rekening'),
					'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
				);
			}
			$this->m_logbook->updateData('tbl_pembukaan_rekening_individu', $data, $id);
			redirect('logbook/pembukaan_rekening_individu');
		}

		function hapus_pembukaan_rekening_individu(){
			$id['kode_pembukaan_rekening_individu']=$this->input->post('kode_pembukaan_rekening_individu');

			$this->m_logbook->deleteData('tbl_pembukaan_rekening_individu', $id);
			redirect('logbook/pembukaan_rekening_individu');
		}

		function approval_pembukaan_rekening_individu(){
			$username = $this->session->userdata('username');				
			$kode_pembukaan_rekening_individu=$this->input->get('kode_pembukaan_rekening_individu');
			$data=array(
				'title'=>'Approval Pembukaan Rekening Individu | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'data_approval_pembukaan_rekening_individu'=>$this->m_logbook->data_approval_pembukaan_rekening_individu($kode_pembukaan_rekening_individu),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval_with_reject'=>$this->m_logbook->list_approval_with_reject(),
				'ref_approval_yesno'=>$this->m_logbook->list_approval_yesno(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_fungsi'=>$this->m_logbook->list_fungsi(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_approval_pembukaan_rekening_individu');
      		$this->load->view('layout/footer');
		}

		function update_approval_pembukaan_rekening_individu(){
			$data123=$this->input->post('kode_pembukaan_rekening_individu');
			$id['kode_pembukaan_rekening_individu'] = $this->input->post('kode_pembukaan_rekening_individu');

			$stat=$this->session->userdata('level_id');

			$approval_crm=$this->input->post('approval_crm');
			$approval_kadiv_mkt=$this->input->post('approval_kadiv_mkt');
			$approval_input_s21=$this->input->post('approval_input_s21');
			$approval_input_sinvest=$this->input->post('approval_input_sinvest');
			$approval_senior_settlement=$this->input->post('approval_senior_settlement');
			$approval_head_operation=$this->input->post('approval_head_operation');

			if ($approval_kadiv_mkt==3) {
				$status1=3;
			}
			elseif ($approval_crm==1) {
				$status1=1;
			}
			elseif ($approval_crm==2) {
				$status1=2;
			}
			elseif ($approval_crm==3) {
				$status1=3;
			}
			else {
				$status1=2;
			}

			if ($stat==2) {
				$data=array(
					'approval_kadiv_mkt' => $approval_kadiv_mkt,
					'status' => $status1
				);
			}

			elseif ($stat==3) {
				$data=array(
					'approval_input_sinvest' => $approval_input_sinvest,
					'approval_input_s21' => $approval_input_s21,
				);
			}

			elseif ($stat==4) {
				$data=array(
					'approval_senior_settlement' => $approval_senior_settlement,
				);
			}

			elseif ($stat==5) {
				$data=array(
					'approval_head_operation' => $approval_head_operation,
				);
			}

			elseif ($stat==6) {
				$data=array(
					'approval_crm' => $approval_crm,
					'status' => $status1
				);
			}
				
			$this->m_logbook->updateData('tbl_pembukaan_rekening_individu', $data, $id);
			// redirect('logbook/approval_pembukaan_rekening_individu?kode_pembukaan_rekening_individu='.$data123);
			redirect('logbook/pembukaan_rekening_individu');
		}

		function pembukaan_rekening_institusi(){
			$username = $this->session->userdata('username');
			$data=array(
				'title'=>'Pembukaan Rekening Institusi| Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'kode_pembukaan_rekening_institusi'=>$this->m_logbook->kode_pembukaan_rekening_institusi(),
				'data_pembukaan_rekening_institusi'=>$this->m_logbook->data_pembukaan_rekening_institusi(),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_klasifikasi_resiko'=>$this->m_logbook->getAllData('ref_klasifikasi_resiko'),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_pembukaan_rekening_institusi');
      		$this->load->view('layout/footer');
		}

		function tambah_pembukaan_rekening_institusi(){
			$data=array(
				'kode_pembukaan_rekening_institusi'=>$this->input->post('kode_pembukaan_rekening_institusi'),
				'tanggal_input'=>date("Y-m-d", strtotime($this->input->post('tanggal_input'))),
				'nama_nasabah'=>$this->input->post('nama_nasabah'),
				'no_npwp'=>$this->input->post('no_npwp'),
				'email'=>$this->input->post('email'),
				'nama_sales'=>$this->input->post('nama_sales'),
				'checklist_form_pembukaan_rekening'=>$this->input->post('checklist_form_pembukaan_rekening'),
				'checklist_npwp'=>$this->input->post('checklist_npwp'),
				'checklist_siup'=>$this->input->post('checklist_siup'),
				'checklist_adart'=>$this->input->post('checklist_adart'),
				'checklist_skd'=>$this->input->post('checklist_skd'),
				'checklist_specimen'=>$this->input->post('checklist_specimen'),
				'checklist_ktp_pengurus'=>$this->input->post('checklist_ktp_pengurus'),
				'checklist_rekening_redemption'=>$this->input->post('checklist_rekening_redemption'),
				// 'minus_dokumen_pojk' => $this->input->post('minus_dokumen_pojk'),
				'approval_crm'=>'2',
				'approval_kadiv_mkt'=>'2',
				'approval_input_s21'=>'5',
				'approval_input_sinvest'=>'5',
				'approval_senior_settlement'=>'5',
				'approval_head_operation'=>'2',
				'status'=>'2',
				'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
			);

			$this->m_logbook->insertData('tbl_pembukaan_rekening_institusi', $data);
			redirect('logbook/pembukaan_rekening_institusi');
		}

		function edit_pembukaan_rekening_institusi(){
			$id['kode_pembukaan_rekening_institusi']=$this->input->post('kode_pembukaan_rekening_institusi');
			
			if ($stat==6) {
				$data=array(
					'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
				);	
			}
			else {
				$data=array(
					'nama_nasabah'=>$this->input->post('nama_nasabah'),
					'no_npwp'=>$this->input->post('no_npwp'),
					'email'=>$this->input->post('email'),
					'nama_sales'=>$this->input->post('nama_sales'),
					'checklist_form_pembukaan_rekening'=>$this->input->post('checklist_form_pembukaan_rekening'),
					'checklist_npwp'=>$this->input->post('checklist_npwp'),
					'checklist_siup'=>$this->input->post('checklist_siup'),
					'checklist_adart'=>$this->input->post('checklist_adart'),
					'checklist_skd'=>$this->input->post('checklist_skd'),
					'checklist_specimen'=>$this->input->post('checklist_specimen'),
					'checklist_ktp_pengurus'=>$this->input->post('checklist_ktp_pengurus'),
					'checklist_rekening_redemption'=>$this->input->post('checklist_rekening_redemption'),
					'klasifikasi_resiko'=>$this->input->post('klasifikasi_resiko'),
				);
			}

			$this->m_logbook->updateData('tbl_pembukaan_rekening_institusi', $data, $id);
			redirect('logbook/pembukaan_rekening_institusi');
		}

		function hapus_pembukaan_rekening_institusi(){
			$id['kode_pembukaan_rekening_institusi']=$this->input->post('kode_pembukaan_rekening_institusi');

			$this->m_logbook->deleteData('tbl_pembukaan_rekening_institusi', $id);
			redirect('logbook/pembukaan_rekening_institusi');
		}

		function approval_pembukaan_rekening_institusi(){
			$username = $this->session->userdata('username');
			$kode_pembukaan_rekening_institusi=$this->input->get('kode_pembukaan_rekening_institusi');
			$data=array(
				'title'=>'Approval Pembukaan Rekening Institusi | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'data_approval_pembukaan_rekening_institusi'=>$this->m_logbook->data_approval_pembukaan_rekening_institusi($kode_pembukaan_rekening_institusi),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval_with_reject'=>$this->m_logbook->list_approval_with_reject(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_approval_yesno'=>$this->m_logbook->list_approval_yesno(),
				'ref_fungsi'=>$this->m_logbook->list_fungsi(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
      		$this->load->view('logbook/v_approval_pembukaan_rekening_institusi');
      		$this->load->view('layout/footer');
		}

		function update_approval_pembukaan_rekening_institusi(){
			$data123=$this->input->post('kode_pembukaan_rekening_institusi');
			$id['kode_pembukaan_rekening_institusi'] = $this->input->post('kode_pembukaan_rekening_institusi');

			$stat=$this->session->userdata('level_id');

			$approval_crm=$this->input->post('approval_crm');
			$approval_kadiv_mkt=$this->input->post('approval_kadiv_mkt');
			$approval_input_s21=$this->input->post('approval_input_s21');
			$approval_input_sinvest=$this->input->post('approval_input_sinvest');
			$approval_senior_settlement=$this->input->post('approval_senior_settlement');
			$approval_head_operation=$this->input->post('approval_head_operation');

			if ($approval_kadiv_mkt==3) {
				$status1=3;
			}
			elseif ($approval_crm==1) {
				$status1=1;
			}
			elseif ($approval_crm==2) {
				$status1=2;
			}
			elseif ($approval_crm==3) {
				$status1=3;
			}
			else {
				$status1=2;
			}

			if ($stat==2) {
				$data=array(
					'approval_kadiv_mkt' => $approval_kadiv_mkt,
					'status' => $status1,
				);
			}

			elseif ($stat==3) {
				$data=array(
					'approval_input_sinvest' => $approval_input_sinvest,
					'approval_input_s21' => $approval_input_s21,
				);
			}

			elseif ($stat==4) {
				$data=array(
					'approval_senior_settlement' => $approval_senior_settlement,
				);
			}

			elseif ($stat==5) {
				$data=array(
					'approval_head_operation' => $approval_head_operation,
				);
			}

			elseif ($stat==6) {
				$data=array(
					'approval_crm' => $approval_crm,
					'status' => $status1,
				);
			}
				
			$this->m_logbook->updateData('tbl_pembukaan_rekening_institusi', $data, $id);
			// redirect('logbook/approval_pembukaan_rekening_institusi?kode_pembukaan_rekening_institusi='.$data123);
			redirect('logbook/pembukaan_rekening_institusi');
		}

		function filter_pembukaan_rekening() {
			$username = $this->session->userdata('username');
			$kategori=$this->input->post('kategori');
			$nama_sales=$this->input->post('nama_sales');
			$status=$this->input->post('status');
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');

			if ($kategori==1 && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening1($nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening2($nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==1 && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening3($start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening4($nama_sales, $status);
			}
			elseif ($kategori==1 && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening5($nama_sales);
			}
			elseif ($kategori==1 && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening6($status);
			}
			elseif ($kategori==1 && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening7($start_date, $end_date);
			}
			elseif ($kategori==1) {
					$query_generate=$this->m_logbook->data_pembukaan_rekening_individu();
			}
			elseif ($kategori==2 && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening8($nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening9($nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==2 && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening10($start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening11($nama_sales, $status);
			}
			elseif ($kategori==2 && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening12($nama_sales);
			}
			elseif ($kategori==2 && $status!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening13($status);
			}
			elseif ($kategori==2 && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_pembukaan_rekening14($start_date, $end_date);
			}
			elseif ($kategori==2) {
					$query_generate=$this->m_logbook->data_pembukaan_rekening_institusi();
			}
			else {
					$query_generate=$this->m_logbook->data_pembukaan_rekening_individu();
			}

			$data=array(
				'title'=>'Filter | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'data_pembukaan_rekening'=>$query_generate,
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
			$this->load->view('logbook/v_filter_pembukaan_rekening');	
      		$this->load->view('layout/footer');
		}

		function filter_transaksi(){
			$username = $this->session->userdata('username');
			$kategori=$this->input->post('kategori');
			$nama_sales=$this->input->post('nama_sales');
			$status=$this->input->post('status');
			$start_date=$this->input->post('start_date');
			$end_date=$this->input->post('end_date');
			$nama_nasabah=$this->input->post('nama_nasabah');
  			$nama_fund=$this->input->post('nama_fund');
  			$query_generate="";

			if ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs3($nama_fund, $nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs4($nama_fund, $nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs5($nama_fund, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs6($nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs7($nama_fund, $nama_sales, $nama_nasabah);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs8($nama_fund, $nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs9($nama_fund, $nama_sales, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs10($nama_fund, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs11($nama_fund, $nama_nasabah, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs12($nama_fund, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs13($nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs14($nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs15($nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs16($nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs17($nama_fund, $nama_sales);
			}
			elseif ($kategori==1 && $nama_fund!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs18($nama_fund, $nama_nasabah);
			}
			elseif ($kategori==1 && $nama_fund!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs19($nama_fund, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_fund!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs20($nama_fund, $status);
			}
			elseif ($kategori==1 && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs21($nama_sales, $nama_nasabah);
			}
			elseif ($kategori==1 && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs22($nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs23($nama_sales, $status);
			}
			elseif ($kategori==1 && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs24($nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==1 && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs25($nama_nasabah, $status);
			}
			elseif ($kategori==1 && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs26($start_date, $end_date, $status);
			}
			elseif ($kategori==1 && $nama_fund!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs27($nama_fund);
			}
			elseif ($kategori==1 && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs28($nama_sales);
			}
			elseif ($kategori==1 && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs29($nama_nasabah);
			}
			elseif ($kategori==1 && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs30($start_date, $end_date);
			}
			elseif ($kategori==1 && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_subs31($status);
			}
			elseif ($kategori==1) {
					$query_generate=$this->m_logbook->data_subscription();
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm3($nama_fund, $nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm4($nama_fund, $nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm5($nama_fund, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm6($nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm7($nama_fund, $nama_sales, $nama_nasabah);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm8($nama_fund, $nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm9($nama_fund, $nama_sales, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm10($nama_fund, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm11($nama_fund, $nama_nasabah, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm12($nama_fund, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm13($nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm14($nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm15($nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm16($nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm17($nama_fund, $nama_sales);
			}
			elseif ($kategori==2 && $nama_fund!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm18($nama_fund, $nama_nasabah);
			}
			elseif ($kategori==2 && $nama_fund!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm19($nama_fund, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_fund!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm20($nama_fund, $status);
			}
			elseif ($kategori==2 && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm21($nama_sales, $nama_nasabah);
			}
			elseif ($kategori==2 && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm22($nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm23($nama_sales, $status);
			}
			elseif ($kategori==2 && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm24($nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==2 && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm25($nama_nasabah, $status);
			}
			elseif ($kategori==2 && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm26($start_date, $end_date, $status);
			}
			elseif ($kategori==2 && $nama_fund!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm27($nama_fund);
			}
			elseif ($kategori==2 && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm28($nama_sales);
			}
			elseif ($kategori==2 && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm29($nama_nasabah);
			}
			elseif ($kategori==2 && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm30($start_date, $end_date);
			}
			elseif ($kategori==2 && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_redm31($status);
			}
			elseif ($kategori==2) {
					$query_generate=$this->m_logbook->data_redemption();
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc3($nama_fund, $nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc4($nama_fund, $nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc5($nama_fund, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc6($nama_sales, $nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc7($nama_fund, $nama_sales, $nama_nasabah);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc8($nama_fund, $nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc9($nama_fund, $nama_sales, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc10($nama_fund, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc11($nama_fund, $nama_nasabah, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc12($nama_fund, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_sales!='' && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc13($nama_sales, $nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_sales!='' && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc14($nama_sales, $nama_nasabah, $status);
			}
			elseif ($kategori==3 && $nama_sales!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc15($nama_sales, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_nasabah!='' && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc16($nama_nasabah, $start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc17($nama_fund, $nama_sales);
			}
			elseif ($kategori==3 && $nama_fund!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc18($nama_fund, $nama_nasabah);
			}
			elseif ($kategori==3 && $nama_fund!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc19($nama_fund, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_fund!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc20($nama_fund, $status);
			}
			elseif ($kategori==3 && $nama_sales!='' && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc21($nama_sales, $nama_nasabah);
			}
			elseif ($kategori==3 && $nama_sales!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc22($nama_sales, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_sales!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc23($nama_sales, $status);
			}
			elseif ($kategori==3 && $nama_nasabah!='' && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc24($nama_nasabah, $start_date, $end_date);
			}
			elseif ($kategori==3 && $nama_nasabah!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc25($nama_nasabah, $status);
			}
			elseif ($kategori==3 && $start_date!='' && $end_date!='' && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc26($start_date, $end_date, $status);
			}
			elseif ($kategori==3 && $nama_fund!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc27($nama_fund);
			}
			elseif ($kategori==3 && $nama_sales!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc28($nama_sales);
			}
			elseif ($kategori==3 && $nama_nasabah!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc29($nama_nasabah);
			}
			elseif ($kategori==3 && $start_date!='' && $end_date!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc30($start_date, $end_date);
			}
			elseif ($kategori==3 && $status!='') {
					$query_generate=$this->m_logbook->filter_transaksi_swtc31($status);
			}
			elseif ($kategori==3) {
					$query_generate=$this->m_logbook->data_switching();
			}


			$data=array(
				'title'=>'Filter | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				'data_transaksi'=>$query_generate,
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
			$this->load->view('logbook/v_filter_transaksi');	
      		$this->load->view('layout/footer');
		}

		function report(){
			$username = $this->session->userdata('username');

			$tanggal_input = date("Y-m-d", strtotime($this->input->post('tanggal_input')));

			// if ($tanggal_input!='') {
			// 	$tanggal_input = $this->input->post('tanggal_input');
			// }
			// else {
			// 	$tanggal_input = date('d-m-Y');
			// }

			$data=array(
				'title'=>'Report | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				
				// 'data_subscription'=>$this->m_logbook->data_subscription(),
				// 'data_redemption'=>$this->m_logbook->data_redemption(),
				// 'data_switching'=>$this->m_logbook->data_switching(),

				'data_subscription_report'=>$this->m_logbook->data_subscription_report($tanggal_input),
				'data_redemption_report'=>$this->m_logbook->data_redemption_report($tanggal_input),
				'data_switching_report'=>$this->m_logbook->data_switching_report($tanggal_input),
				
				'ref_data_nasabah'=>$this->m_logbook->ref_data_nasabah(),
				'ref_data_fund'=>$this->m_logbook->ref_data_fund(),
				'ref_approval'=>$this->m_logbook->list_approval(),
				'ref_sales'=>$this->m_logbook->list_sales(),
			);
	
			$this->load->view('layout/header',$data);
			$this->load->view('layout/sidebar');
			$this->load->view('logbook/v_report');	
      		$this->load->view('layout/footer');
		}


		function print_report(){
			$username = $this->session->userdata('username');

			$tanggal_input = date("Y-m-d", strtotime($this->input->post('tanggal_input')));

			$data=array(
				'title'=>'Print Report | Logbook Apps',
				'page'=>'Marketing',
				'data_user1' => $this->m_logbook->getSingleDataUser($username),
				
				// 'data_subscription'=>$this->m_logbook->data_subscription(),
				// 'data_redemption'=>$this->m_logbook->data_redemption(),
				// 'data_switching'=>$this->m_logbook->data_switching(),

				'data_subscription_report'=>$this->m_logbook->data_subscription_report($tanggal_input),
				'data_redemption_report'=>$this->m_logbook->data_redemption_report($tanggal_input),
				'data_switching_report'=>$this->m_logbook->data_switching_report($tanggal_input),
				'tanggal_input'=>$tanggal_input
			);

			$this->db->where(array('tanggal_input'=>$tanggal_input));

			$this->load->view('logbook/v_print_report', $data, $tanggal_input);
		}

		function get_nama_fund(){
			$kode_fund = $this->input->get('kode_fund');
			$fund = $this->m_logbook->ref_rekening_fund($kode_fund);

			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='nama_fund' value='".$data->nama_fund."''>".$data->nama_fund."</option>";
				}
			}
		}

		function ref_no_rekening_fund(){
			$kode_fund = $this->input->get('kode_fund');
			$rek_fund = $this->m_logbook->ref_rekening_fund($kode_fund);

			echo "<option> Pilih Rekening Fund </option>";
			if (isset($rek_fund)){
                foreach ($rek_fund as $data){
					echo "<option name='no_rekening_fund' value='".$data->no_rekening_fund."''>".$data->no_rekening_fund. ' - '.$data->nama_bank_rekening_fund ."</option>";
				}
			}
		}

		function ref_nama_bank_rekening_fund(){
			$no_rekening_fund = $this->input->get('no_rekening_fund');
			$rek_fund = $this->m_logbook->ref_nama_bank_rekening_fund($no_rekening_fund);

			if (isset($rek_fund)){
                foreach ($rek_fund as $data){
					echo "<option name='nama_bank_rekening_fund' value='".$data->nama_bank_rekening_fund."''>".$data->nama_bank_rekening_fund ."</option>";
				}
			}
		}

		function data_sid(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
	                $sid_nasabah=$data->sid_individu;

	                if ($sid_nasabah=='') {
	                    $sid1=$data->sid_institusi;
	                }
	                else {
	                    $sid1=$sid_nasabah;
	                }

                    echo "<option name='sid_nasabah' value='".$sid1."'>".$sid1."</option>";
				}
			}
		}

		function data_sales(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
                    echo "<option name='nama_sales' value='".$data->nama_sales."'>".$data->nama_sales."</option>";
				}
			}
		}

		function get_email_sales(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
                    echo "<option name='email_sales' value='".$data->email_sales."'>".$data->email_sales."</option>";
				}
			}	
		}

		function get_nama_nasabah(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
	                $nama_nasabah=$data->nama_nasabah_individu;

	                if ($nama_nasabah=='') {
	                    $nama_nasabah1=$data->nama_nasabah_institusi;
	                }
	                else {
	                    $nama_nasabah1=$nama_nasabah;
	                }

                    echo "<option name='nama_nasabah' value='".$nama_nasabah1."'>".$nama_nasabah1."</option>";
				}
			}
		}

		function get_rekening_nasabah(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			echo "<option value=''>-- Pilih Rekening --</option>";
			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
					if ($data->no_rekening_ind_1!='' && $data->no_rekening_ind_2!='') {
						echo "<option value='".$data->no_rekening_ind_1."'>".$data->no_rekening_ind_1.' - ' .$data->nama_bank_ind_1 ."</option>";
                    	echo "<option value='".$data->no_rekening_ind_2."'>".$data->no_rekening_ind_2.' - ' .$data->nama_bank_ind_2 ."</option>";
					}
					elseif ($data->no_rekening_ind_1!='') {
						echo "<option value='".$data->no_rekening_ind_1."'>".$data->no_rekening_ind_1.' - ' .$data->nama_bank_ind_1 ."</option>";
					}
					elseif ($data->no_rekening_ind_2!='') {
						echo "<option value='".$data->no_rekening_ind_2."'>".$data->no_rekening_ind_2.' - ' .$data->nama_bank_ind_2 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_2!='' && $data->no_rekening_ins_3!='') {
						echo "<option value='".$data->no_rekening_ins_1."'>".$data->no_rekening_ins_1.' - ' .$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->no_rekening_ins_2."'>".$data->no_rekening_ins_2.' - ' .$data->nama_bank_ins_2 ."</option>";
                    	echo "<option value='".$data->no_rekening_ins_3."'>".$data->no_rekening_ins_3.' - ' .$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_2!='') {
						echo "<option value='".$data->no_rekening_ins_1."'>".$data->no_rekening_ins_1.' - ' .$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->no_rekening_ins_2."'>".$data->no_rekening_ins_2.' - ' .$data->nama_bank_ins_2 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_3!='') {
						echo "<option value='".$data->no_rekening_ins_1."'>".$data->no_rekening_ins_1.' - ' .$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->no_rekening_ins_3."'>".$data->no_rekening_ins_3.' - ' .$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_2!='' && $data->no_rekening_ins_3!='') {
                    	echo "<option value='".$data->no_rekening_ins_2."'>".$data->no_rekening_ins_2.' - ' .$data->nama_bank_ins_2 ."</option>";
                    	echo "<option value='".$data->no_rekening_ins_3."'>".$data->no_rekening_ins_3.' - ' .$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='') {
						echo "<option value='".$data->no_rekening_ins_1."'>".$data->no_rekening_ins_1. ' - ' .$data->nama_bank_ins_1 ."</option>";
					}
					elseif ($data->no_rekening_ins_2!='') {
						echo "<option value='".$data->no_rekening_ins_2."'>".$data->no_rekening_ins_2. ' - ' .$data->nama_bank_ins_2 ."</option>";
					}
					elseif ($data->no_rekening_ins_3!='') {
						echo "<option value='".$data->no_rekening_ins_3."'>".$data->no_rekening_ins_3. ' - ' .$data->nama_bank_ins_3 ."</option>";
					}
					else {
						echo "<option value=''> Tidak Ada Rekening Terdaftar </option>";
					}
                    
				}
			}	
		}

		function get_nama_bank_by_rekenig(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$data_nasabah = $this->m_logbook->get_data_nasabah($kode_nasabah);

			echo "<option value=''>-- Sesuaikan Bank Rekening --</option>";
			if (isset($data_nasabah)) {
				foreach ($data_nasabah as $data) {
					if ($data->no_rekening_ind_1!='' && $data->no_rekening_ind_2!='') {
						echo "<option value='".$data->nama_bank_ind_1."'>".$data->nama_bank_ind_1 ."</option>";
                    	echo "<option value='".$data->nama_bank_ind_2."'>".$data->nama_bank_ind_2 ."</option>";
					}
					elseif ($data->no_rekening_ind_1!='') {
						echo "<option value='".$data->nama_bank_ind_1."'>".$data->nama_bank_ind_1 ."</option>";
					}
					elseif ($data->no_rekening_ind_2!='') {
						echo "<option value='".$data->nama_bank_ind_2."'>".$data->nama_bank_ind_2 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_2!='' && $data->no_rekening_ins_3!='') {
						echo "<option value='".$data->nama_bank_ins_1."'>".$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->nama_bank_ins_2."'>".$data->nama_bank_ins_2 ."</option>";
                    	echo "<option value='".$data->nama_bank_ins_3."'>".$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_2!='') {
						echo "<option value='".$data->nama_bank_ins_1."'>".$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->nama_bank_ins_2."'>".$data->nama_bank_ins_2 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='' && $data->no_rekening_ins_3!='') {
						echo "<option value='".$data->nama_bank_ins_1."'>".$data->nama_bank_ins_1 ."</option>";
                    	echo "<option value='".$data->nama_bank_ins_3."'>".$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_2!='' && $data->no_rekening_ins_3!='') {
                    	echo "<option value='".$data->nama_bank_ins_2."'>".$data->nama_bank_ins_2 ."</option>";
                    	echo "<option value='".$data->nama_bank_ins_3."'>".$data->nama_bank_ins_3 ."</option>";
					}
					elseif ($data->no_rekening_ins_1!='') {
						echo "<option value='".$data->nama_bank_ins_1."'>".$data->nama_bank_ins_1  ."</option>";
					}
					elseif ($data->no_rekening_ins_2!='') {
						echo "<option value='".$data->nama_bank_ins_2."'>".$data->nama_bank_ins_2  ."</option>";
					}
					elseif ($data->no_rekening_ins_3!='') {
						echo "<option value='".$data->nama_bank_ins_3."'>".$data->nama_bank_ins_3  ."</option>";
					}
					else {
						echo "<option value=''> Tidak Ada Rekening Terdaftar </option>";
					}
                    
				}
			}
		}

		function ref_max_redm(){
			$kode_fund = $this->input->get('kode_fund');
			$max_redm = $this->m_logbook->list_max_redm($kode_fund);

			if (isset($max_redm)){
                foreach ($max_redm as $data){
                	if ($data->kode_fund=='MARKETUSD') {
                		echo " <label class=''>Min. Saldo : $ ".number_format($data->max_redm,0,',','.') ."</label>";
                	}
                	else {
						echo " <label class=''>Min. Saldo : Rp ".number_format($data->max_redm,0,',','.') ."</label>";
					}
				}
			}
		}

		function get_client_id(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$fund = $this->m_logbook->data_fund($kode_nasabah);

			echo "<option>-- Pilih Fund --</option>";
			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='client_id' id='client_id' value='".$data->client_id."''>".$data->nama_fund."</option>";
				}
			}
		}

		function get_market_value(){
			$client_id = $this->input->get('client_id');
			$fund = $this->m_logbook->data_market_value_per_fund($client_id);

			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='market_value' id='market_value' value='".$data->market_value."''>".$data->market_value."</option>";
				}
			}
		}

		function get_kode_fund(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$fund = $this->m_logbook->data_fund($kode_nasabah);

			echo "<option>-- Pilih Fund --</option>";
			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='kode_fund' id='kode_fund' value='".$data->kode_fund."''>".$data->nama_fund."</option>";
				}
			}
		}

		function get_nama_fund1(){
			$kode_fund = $this->input->get('kode_fund');
			$fund = $this->m_logbook->get_nama_fund($kode_fund);

			// echo "<option>-- Pilih Fund --</option>";
			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='nama_fund' value='".$data->FundName."''>".$data->FundName."</option>";
				}
			}
		}

		function data_fund(){
			$kode_nasabah = $this->input->get('kode_nasabah');
			$fund = $this->m_logbook->data_fund_by_nasabah($kode_nasabah);

			echo "<option>-- Pilih Fund --</option>";
			if (isset($fund)){
                foreach ($fund as $data){
					echo "<option name='kode_fund' value='".$data->kode_fund."''>".$data->nama_fund."</option>";
				}
			}
		}

		function realtime_total_pembukaan_rekening_individu(){
			echo $this->m_logbook->total_pembukaan_rekening_individu();
		}

		function update_password(){
			$id['id']=$this->input->post('id');
			$password_baru=$this->input->post('password_baru');
			$password_ulang=$this->input->post('password_ulang');
			$stat=$this->session->userdata('level_id');
		

			if ($password_baru==$password_ulang) {
				$data=array(
					'password'=>md5($this->input->post('password_ulang')),
				);
				$this->m_logbook->updateData('tbl_user', $data, $id);

				if ($stat==1) {
					redirect('logbook/dashboard');
				}
				elseif ($stat==3||$stat==2||$stat==4) {
					redirect('logbook/dashboard');
				}
				else{
					redirect('logbook/dashboard');
				}
				
			}
			else {
				echo "<script>alert('Gagal Mengganti Password!')</script>";
				redirect('logbook/dashboard', 'refresh');
			}
		}

		function edit_kelengkapan_dokumen_pojk(){
			$data123=$this->input->post('kode_pembukaan_rekening_institusi');
			$id['kode_pembukaan_rekening_institusi'] = $this->input->post('kode_pembukaan_rekening_institusi');

			$stat=$this->session->userdata('level_id');

			$data=array(
				// 'checklist_form_pembukaan_rekening' => $this->input->post('checklist_form_pembukaan_rekening'),
				// 'checklist_npwp' => $this->input->post('checklist_npwp'),
				// 'checklist_siup' => $this->input->post('checklist_siup'),
				// 'checklist_adart' => $this->input->post('checklist_adart'),
				// 'checklist_skd' => $this->input->post('checklist_skd'),
				// 'checklist_specimen' => $this->input->post('checklist_specimen'),
				// 'checklist_ktp_pengurus' => $this->input->post('checklist_ktp_pengurus'),
				'minus_dokumen_pojk' => $this->input->post('minus_dokumen_pojk'),
				'checklist_rekening_redemption' => $this->input->post('checklist_rekening_redemption'),
			);

			$this->m_logbook->updateData('tbl_pembukaan_rekening_institusi', $data, $id);
			redirect('logbook/approval_pembukaan_rekening_institusi?kode_pembukaan_rekening_institusi='.$data123);
		}
	}