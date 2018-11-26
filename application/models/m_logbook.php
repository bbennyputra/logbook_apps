<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_logbook extends CI_Model{
		private $db2;

		public function __construct(){
			parent::__construct();

			$this->db2 = $this->load->database('s21_pnmim', TRUE);
			
		}

		public function getAllData($table){
			return $this->db->get($table)->result();
		}

		public function getSelectedData($table, $data){
			return $this->db->get_where($table, $data);
		}

		function insertData($table, $data){
			$this->db->insert($table, $data);
		}

		function updateData($table, $data, $field_key){
			$this->db->update($table, $data, $field_key);
		}

		function deleteData($table, $data){
			$this->db->delete($table, $data);
		}

		function kode_subscription(){
			$this->db->select('RIGHT(tbl_subscription.kode_subscription,5) as kode', FALSE);
			$this->db->order_by('kode_subscription', 'DESC');
			$this->db->limit(1);

			$query  = $this->db->get('tbl_subscription');
				if ($query->num_rows()<>0) {
					$data=$query->row();
					$kode=intval($data->kode)+1;
				}
				else {
					$kode=1;
				}

				$kodemax=str_pad($kode, 5, '0', STR_PAD_LEFT);
				$kodejadi="SUBS".date("Ymd").$kodemax;
				return $kodejadi;
		}

		function kode_redemption(){
			$this->db->select('RIGHT(tbl_redemption.kode_redemption,5) as kode', FALSE);
			$this->db->order_by('kode_redemption', 'DESC');
			$this->db->limit(1);

			$query  = $this->db->get('tbl_redemption');
				if ($query->num_rows()<>0) {
					$data=$query->row();
					$kode=intval($data->kode)+1;
				}
				else {
					$kode=1;
				}

				$kodemax=str_pad($kode, 5, '0', STR_PAD_LEFT);
				$kodejadi="REDM".date("Ymd").$kodemax;
				return $kodejadi;
		}

		function kode_switching(){
			$this->db->select('RIGHT(tbl_switching.kode_switching,5) as kode', FALSE);
			$this->db->order_by('kode_switching', 'DESC');
			$this->db->limit(1);

			$query  = $this->db->get('tbl_switching');
				if ($query->num_rows()<>0) {
					$data=$query->row();
					$kode=intval($data->kode)+1;
				}
				else {
					$kode=1;
				}

				$kodemax=str_pad($kode, 5, '0', STR_PAD_LEFT);
				$kodejadi="SWTC".date("Ymd").$kodemax;
				return $kodejadi;
		}

		function kode_pembukaan_rekening_individu(){
			$this->db->select('RIGHT(tbl_pembukaan_rekening_individu.kode_pembukaan_rekening_individu,5) as kode', FALSE);
			$this->db->order_by('kode_pembukaan_rekening_individu', 'DESC');
			$this->db->limit(1);

			$query  = $this->db->get('tbl_pembukaan_rekening_individu');
				if ($query->num_rows()<>0) {
					$data=$query->row();
					$kode=intval($data->kode)+1;
				}
				else {
					$kode=1;
				}

				$kodemax=str_pad($kode, 5, '0', STR_PAD_LEFT);
				$kodejadi="IND".date("Ymd").$kodemax;
				return $kodejadi;
		}

		function kode_pembukaan_rekening_institusi(){
			$this->db->select('RIGHT(tbl_pembukaan_rekening_institusi.kode_pembukaan_rekening_institusi,5) as kode', FALSE);
			$this->db->order_by('kode_pembukaan_rekening_institusi', 'DESC');
			$this->db->limit(1);

			$query  = $this->db->get('tbl_pembukaan_rekening_institusi');
				if ($query->num_rows()<>0) {
					$data=$query->row();
					$kode=intval($data->kode)+1;
				}
				else {
					$kode=1;
				}

				$kodemax=str_pad($kode, 5, '0', STR_PAD_LEFT);
				$kodejadi="INS".date("Ymd").$kodemax;
				return $kodejadi;
		}

		function list_fungsi(){
			$query = $this->db->get('ref_fungsi');

			$num = $query->num_rows();
			
			if ($num>0) {
				return $query->result();
			}
			else {
				return 0;
			}
		}

		function list_sales(){
			$query = $this->db->get('tbl_sales');

			$num = $query->num_rows();
			
			if ($num>0) {
				return $query->result();
			}
			else {
				return 0;
			}
		}

		function data_subscription(){
			return $this->db->query("SELECT * FROM tbl_subscription	ORDER BY tanggal_input DESC")->result();
		}

		function data_subscription_report($tanggal_input){
			return $this->db->query("SELECT * FROM tbl_subscription WHERE tanggal_input='$tanggal_input' ORDER BY tanggal_input DESC")->result();
		}


		function data_approval_subscription($kode_subscription){
			return $this->db->query("SELECT * FROM tbl_subscription	WHERE kode_subscription='$kode_subscription' ORDER BY tanggal_input DESC")->result();
		}

		function data_redemption(){
			return $this->db->query("SELECT * FROM tbl_redemption ORDER BY tanggal_input DESC")->result();
		}

		function data_redemption_report($tanggal_input){
			return $this->db->query("SELECT * FROM tbl_redemption WHERE tanggal_input='$tanggal_input' ORDER BY tanggal_input DESC")->result();
		}

		function data_approval_redemption($kode_redemption){
			return $this->db->query("SELECT * FROM tbl_redemption WHERE kode_redemption='$kode_redemption' ORDER BY tanggal_input DESC")->result();
		}

		function data_switching(){
			return $this->db->query("SELECT * FROM tbl_switching ORDER BY tanggal_input DESC")->result();
		}

		function data_switching_report($tanggal_input){
			return $this->db->query("SELECT * FROM tbl_switching WHERE tanggal_input='$tanggal_input' ORDER BY tanggal_input DESC")->result();
		}

		function data_approval_switching($kode_switching){
			return $this->db->query("SELECT * FROM tbl_switching WHERE kode_switching='$kode_switching' ORDER BY tanggal_input DESC")->result();
		}

		function data_pembukaan_rekening_individu(){
			return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu ORDER BY tanggal_input DESC")->result();
		}

		function data_approval_pembukaan_rekening_individu($kode_pembukaan_rekening_individu){
			return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu WHERE kode_pembukaan_rekening_individu='$kode_pembukaan_rekening_individu' ORDER BY tanggal_input DESC")->result();
		}

		function data_pembukaan_rekening_institusi(){
			return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi ORDER BY tanggal_input DESC")->result();
		}

		function data_approval_pembukaan_rekening_institusi($kode_pembukaan_rekening_institusi){
			return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi WHERE kode_pembukaan_rekening_institusi='$kode_pembukaan_rekening_institusi' ORDER BY tanggal_input DESC")->result();
		}

		function list_approval(){
			return $this->db->query("SELECT * FROM ref_approval WHERE kode_approval!='3' AND kode_approval!='4' AND kode_approval!='5' AND kode_approval!='6' ORDER BY kode_approval DESC")->result();
		}

		function list_approval_with_reject(){
			return $this->db->query("SELECT * FROM ref_approval WHERE kode_approval!='4' AND kode_approval!='5' AND kode_approval!='6' ORDER BY id DESC")->result();
		}

		function list_approval_yesno(){
			return $this->db->query("SELECT * FROM ref_approval WHERE kode_approval!='3' AND kode_approval!='1' AND kode_approval!='2' AND kode_approval!='6' ORDER BY kode_approval DESC")->result();
		}

		function list_approval_goodfund(){
			return $this->db->query("SELECT * FROM ref_approval WHERE kode_approval!='4' AND kode_approval!='5' AND kode_approval!='3' ORDER BY kode_approval DESC")->result();
		}


		// S21_PNMIM

		function data_nasabah(){
			return $this->db2->query("SELECT DISTINCT a.ClientCode,
													  a.ClientID as kode_nasabah,
													  a.FundID as kode_fund,
													  b.ClientName as nama_nasabah_individu,
													  b.ClientSID as sid_individu,
													  c.ClientName as nama_nasabah_institusi,
													  c.ClientSID as sid_institusi,
													  d.FundName as nama_fund,
													  e.UserName as nama_sales
										FROM [S21_PNM].[dbo].[Client Group Detail] a
										LEFT JOIN [S21_PNM].[dbo].[Client Group Individual] b on a.ClientCode=b.ClientCode
										LEFT JOIN [S21_PNM].[dbo].[Client Group Institusi] c on a.ClientCode=c.ClientCode
										LEFT JOIN [S21_PNM].[dbo].[Fund] d on a.FundID=d.FundID
										LEFT JOIN [S21_PNM].[dbo].[User] e on a.SellingAgentID=e.UserID
										WHERE b.ClientSID !='' or c.ClientSID!=''
										ORDER BY a.ClientID
				")->result();
		}

		function ref_data_nasabah(){
			return $this->db2->query("SELECT * FROM ref_data_nasabah ORDER BY kode_nasabah
				")->result();
			// $this->db2->order_by("ClientCode", "ASC");
			// $sid=$this->db2->get("ref_data_nasabah");

			// return $sid->result_array();
		}

		function ref_klasifikasi_resiko(){
			return $this->db->query("SELECT * FROM ref_klasifikasi_resiko ORDER BY kode_klasifikasi
				")->result();
			// $this->db2->order_by("ClientCode", "ASC");
			// $sid=$this->db2->get("ref_data_nasabah");

			// return $sid->result_array();
		}

		function ref_data_fund(){
			return $this->db2->query("SELECT DISTINCT a.FundID as kode_fund, 
											 a.FundName as nama_fund, 
											 b.kode_fund as kode_fund_rekening 
									FROM Fund a
									LEFT JOIN tbl_rekening_fund b on a.FundID=b.kode_fund
									ORDER BY a.FundID
			")->result();
		}

		function ref_rekening_fund($kode_fund){
			return $this->db2->query("SELECT * FROM ref_data_fund WHERE kode_fund = '$kode_fund' ORDER BY no_rekening_fund")->result();
		}

		function list_max_redm($kode_fund){
			return $this->db2->query("SELECT DISTINCT kode_fund, max_redm FROM tbl_rekening_fund WHERE kode_fund = '$kode_fund'")->result();
		}

		function ref_nama_bank_rekening_fund($no_rekening_fund){
			return $this->db2->query("SELECT * FROM ref_data_fund WHERE no_rekening_fund = '$no_rekening_fund' ORDER BY no_rekening_fund")->result();
		}

		function get_data_nasabah($kode_nasabah){
			return $this->db2->query("SELECT * FROM ref_data_nasabah WHERE kode_nasabah='$kode_nasabah' ORDER BY kode_nasabah")->result();
			// $this->db2->order_by("ClientCode", "ASC");
			// $sid=$this->db2->get("ref_data_nasabah");

			// return $sid->result_array();
		}

		function data_fund($kode_nasabah){
			return $this->db2->query("SELECT * FROM ref_data_market_value_nasabah WHERE kode_nasabah='$kode_nasabah' ORDER BY kode_nasabah")->result();
		}

		function data_market_value_per_fund($client_id){
			return $this->db2->query("SELECT * FROM ref_data_market_value_nasabah WHERE client_id='$client_id' ORDER BY client_id")->result();
		}

		function get_nama_fund($kode_fund){
			return $this->db2->query("SELECT FundName FROM Fund WHERE FundID='$kode_fund'")->result();
		}

		function data_fund_by_nasabah($kode_nasabah){
			return $this->db2->query("SELECT * FROM ref_fund WHERE kode_nasabah='$kode_nasabah' ORDER BY kode_nasabah")->result();
		}

		function joinUserWithLevel(){
			return $this->db->query("SELECT a.id,
											a.username,
											a.password,
											a.nama,
											a.level_id,
											a.status,
											b.level_name
									FROM tbl_user a
									left join ref_level b on b.level_id = a.level_id
									")->result();
		}

		function getSingleDataUser($username){
			return $this->db->query("SELECT a.id,
											a.username,
											a.password,
											a.nama,
											a.level_id,
											a.status,
											b.level_name
									 FROM tbl_user a
									 LEFT JOIN ref_level b on a.level_id = b.level_id 
									 WHERE username = '$username'
									 ")->result();
		}

		function total_pembukaan_rekening_individu() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu");
	        
	        return $query->num_rows();
	    }

	    function selesai_pembukaan_rekening_individu() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu WHERE status = 1");
	        
	        return $query->num_rows();
	    }

	    function pending_pembukaan_rekening_individu() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu WHERE status = 2");
	        
	        return $query->num_rows();
	    }

	    function reject_pembukaan_rekening_individu() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu WHERE status = 3");
	        
	        return $query->num_rows();
	    }

	    function total_pembukaan_rekening_institusi() {
	    	$query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi");
	        
	        return $query->num_rows();
	    }

	    function selesai_pembukaan_rekening_institusi() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi WHERE status = 1");
	        
	        return $query->num_rows();
	    }

	    function pending_pembukaan_rekening_institusi() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi WHERE status = 2");
	        
	        return $query->num_rows();
	    }

	    function reject_pembukaan_rekening_institusi() {
	        $query = $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi WHERE status = 3");
	        
	        return $query->num_rows();
	    }

	    function total_subscription() {
	    	$query = $this->db->query("SELECT * FROM tbl_subscription");
	        
	        return $query->num_rows();
	    }

	    function selesai_subscription() {
	    	$query = $this->db->query("SELECT * FROM tbl_subscription WHERE status = 1");
	        
	        return $query->num_rows();
	    }

	    function pending_subscription() {
	    	$query = $this->db->query("SELECT * FROM tbl_subscription WHERE status = 2");
	        
	        return $query->num_rows();
	    }

	    function cancel_subscription() {
	    	$query = $this->db->query("SELECT * FROM tbl_subscription WHERE status = 6");
	        
	        return $query->num_rows();
	    }

	    function total_redemption() {
	    	$query = $this->db->query("SELECT * FROM tbl_redemption");
	        
	        return $query->num_rows();
	    }

	    function selesai_redemption() {
	    	$query = $this->db->query("SELECT * FROM tbl_redemption WHERE status = 1");
	        
	        return $query->num_rows();
	    }

	    function pending_redemption() {
	    	$query = $this->db->query("SELECT * FROM tbl_redemption WHERE status = 2");
	        
	        return $query->num_rows();
	    }

	    function total_switching() {
	    	$query = $this->db->query("SELECT * FROM tbl_switching");
	        
	        return $query->num_rows();
	    }

	    function selesai_switching() {
	    	$query = $this->db->query("SELECT * FROM tbl_switching WHERE status = 1");
	        
	        return $query->num_rows();
	    }

	    function pending_switching() {
	    	$query = $this->db->query("SELECT * FROM tbl_switching WHERE status = 2");
	        
	        return $query->num_rows();
	    }


	    function filter_pembukaan_rekening1($nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE nama_sales='$nama_sales' 
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status ='$status'
	    								")->result();
	    }
    
	    function filter_pembukaan_rekening2($nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE nama_sales='$nama_sales' 
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								")->result();
	    }

	    function filter_pembukaan_rekening3($start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening4($nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE nama_sales='$nama_sales' 
	    								AND status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening5($nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE nama_sales='$nama_sales' 
	    								")->result();
	    }

	    function filter_pembukaan_rekening6($status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening7($start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_individu 
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								")->result();
	    }

	    function filter_pembukaan_rekening8($nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE nama_sales='$nama_sales' 
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status ='$status'
	    								")->result();
	    }
	    
	    function filter_pembukaan_rekening9($nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE nama_sales='$nama_sales' 
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								")->result();
	    }

	    function filter_pembukaan_rekening10($start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening11($nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE nama_sales='$nama_sales' 
	    								AND status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening12($nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE nama_sales='$nama_sales' 
	    								")->result();
	    }

	    function filter_pembukaan_rekening13($status){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE status ='$status'
	    								")->result();
	    }

	    function filter_pembukaan_rekening14($start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_pembukaan_rekening_institusi 
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								")->result();
	    }

	    function filter_transaksi_subs1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs3($nama_fund, $nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

		function filter_transaksi_subs4($nama_fund, $nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }	    

	    function filter_transaksi_subs5($nama_fund, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs6($nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs7($nama_fund, $nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_subs8($nama_fund, $nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs9($nama_fund, $nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs10($nama_fund, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'	    							
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs11($nama_fund, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs12($nama_fund, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs13($nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs14($nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs15($nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs16($nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs17($nama_fund, $nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_subs18($nama_fund, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_subs19($nama_fund, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs20($nama_fund, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs21($nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_subs22($nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs23($nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs24($nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs25($nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs26($start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_subs27($nama_fund){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_fund = '$nama_fund'
	    		")->result();
	    }

	    function filter_transaksi_subs28($nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_subs29($nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_subs30($start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_subs31($status){
	    	return $this->db->query("SELECT * FROM tbl_subscription
	    								WHERE status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm3($nama_fund, $nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

		function filter_transaksi_redm4($nama_fund, $nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }	    

	    function filter_transaksi_redm5($nama_fund, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm6($nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm7($nama_fund, $nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_redm8($nama_fund, $nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm9($nama_fund, $nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm10($nama_fund, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'	    							
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm11($nama_fund, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm12($nama_fund, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm13($nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm14($nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm15($nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm16($nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm17($nama_fund, $nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_redm18($nama_fund, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_redm19($nama_fund, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm20($nama_fund, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm21($nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_redm22($nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm23($nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm24($nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm25($nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm26($start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_redm27($nama_fund){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_fund = '$nama_fund'
	    		")->result();
	    }

	    function filter_transaksi_redm28($nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_redm29($nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_redm30($start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_redm31($status){
	    	return $this->db->query("SELECT * FROM tbl_redemption
	    								WHERE status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc1($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc2($nama_fund, $nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc3($nama_fund, $nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

		function filter_transaksi_swtc4($nama_fund, $nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }	    

	    function filter_transaksi_swtc5($nama_fund, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc6($nama_sales, $nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc7($nama_fund, $nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_swtc8($nama_fund, $nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc9($nama_fund, $nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc10($nama_fund, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'	    							
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc11($nama_fund, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc12($nama_fund, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc13($nama_sales, $nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc14($nama_sales, $nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc15($nama_sales, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc16($nama_nasabah, $start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc17($nama_fund, $nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_swtc18($nama_fund, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_swtc19($nama_fund, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc20($nama_fund, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc21($nama_sales, $nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_swtc22($nama_sales, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc23($nama_sales, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc24($nama_nasabah, $start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc25($nama_nasabah, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_nasabah = '$nama_nasabah'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc26($start_date, $end_date, $status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    								AND status = '$status'
	    		")->result();
	    }

	    function filter_transaksi_swtc27($nama_fund){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_fund_redemption = '$nama_fund'
	    		")->result();
	    }

	    function filter_transaksi_swtc28($nama_sales){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_sales = '$nama_sales'
	    		")->result();
	    }

	    function filter_transaksi_swtc29($nama_nasabah){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE nama_nasabah = '$nama_nasabah'
	    		")->result();
	    }

	    function filter_transaksi_swtc30($start_date, $end_date){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE tanggal_input BETWEEN '$start_date' AND '$end_date'
	    		")->result();
	    }

	    function filter_transaksi_swtc31($status){
	    	return $this->db->query("SELECT * FROM tbl_switching
	    								WHERE status = '$status'
	    		")->result();
	    }
		// function get_rekening_nasabah($kode_nasabah){
		// 	return $this->db2->query("SELECT * FROM ref_data_nasabah WHERE kode")->result();
		// }
	}