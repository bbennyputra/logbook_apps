<?php
if (!function_exists('setDownloadTxt1'))
{
	function setDownloadTxt1($parameter)
    {
		$gagal=0;
		$sukses=0;
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data_xls = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		// $tanggal_file = strtotime('Y-m-d', $this->m_sinvest->getSelectedData('ref_last_date', 'last_date'));

		// $tglan = $tanggal_file;
		$namaFile = "PNM02IND.txt";
		
		$template_txt = '';
		// karakter separator
		$separator = "|";
		// $tanggal_generate = date('Ymd', strtotime($tglan));

		if (isset($parameter['data_retail'])) {
			foreach ($parameter['data_retail'] as $data) {
				  if ($data->middle_name!='') {
              $nama_tengah = $data->middle_name;
          }
          else {
              $nama_tengah = '0';
          }

          if ($data->last_name!='') {
              $nama_belakang = $data->last_name;
          }
          else {
              $nama_belakang = '0';
          }

          if ($data->id_no!='') {
              $id = $data->id_no;
          }
          else {
              $id = '0';
          }

          if ($data->npwp_no!='') {
              $npwp = $data->npwp_no;
          }
          else {
              $npwp = '00000';
          }

          if ($data->kode_sumber_dana!='') {
              $sumber_dana = $data->kode_sumber_dana;
          }
          else {
              $sumber_dana = '0';
          }

          if ($data->kode_agama=='' || $data->kode_agama=='8') {
              $agama = '0';
          }
          else {
              $agama = $data->kode_agama;
          }

          if ($data->postal_code1!='') {
              $kode_pos1 = $data->postal_code1;
          }
          else {
              $kode_pos1 = '0';
          }

          if ($data->city_code1!='') {
              $kode_kota1 = $data->city_code1;
          }
          else {
              $kode_kota1 = '0000';
          }
          if ($data->postal_code2!='') {
              $kode_pos2 = $data->postal_code2;
          }
          else {
              $kode_pos2 = '0';
          }

          if ($data->city_code2!='') {
              $kode_kota2 = $data->city_code2;
          }
          else {
              $kode_kota2 = '0000';
          }

					$template_txt .= $data->cif.$separator.$data->first_name.$separator.$nama_tengah.$separator.$nama_belakang.$separator.$data->kode_identitas.$separator.$id.$separator.$npwp.$separator.$data->place_of_birth.$separator.$data->date_of_birth.$separator.$data->kode_jenis_kelamin.$separator.$data->kode_status_pernikahan.$separator.$data->kode_kewarganegaraan.$separator.$data->kode_pekerjaan.$separator.$data->kode_pendidikan.$separator.$agama.$separator.$sumber_dana.$separator.$data->kode_tujuan.$separator.$data->kode_penghasilan.$separator.$data->alamat1.$separator.$kode_kota1.$separator.$kode_pos1.$separator.$data->alamat2.$separator.$kode_kota2.$separator.$kode_pos2.$separator.$data->sid."\r\n";
			}
		}
		return $template_txt;
	}
}