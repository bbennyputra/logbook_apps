<?php
if (!function_exists('setDownloadTxt'))
{
	function setDownloadTxt($parameter)
    {
		$gagal=0;
		$sukses=0;
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data_xls = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		// $tanggal_file = strtotime('Y-m-d', $this->m_sinvest->getSelectedData('ref_last_date', 'last_date'));

		// $tglan = $tanggal_file;
		$namaFile = "PNM02INS.txt";
		
		$template_txt = '';
		// karakter separator
		$separator = "|";
		// $tanggal_generate = date('Ymd', strtotime($tglan));

		if (isset($parameter['data_company'])) {
			foreach ($parameter['data_company'] as $data) {
				
          if ($data->company_postal_code!='') {
              $kode_pos = $data->company_postal_code;
          }
          else {
              $kode_pos = '00000';
          }

          if ($data->company_city_code!='') {
              $kode_kota = $data->company_city_code;
          }
          else {
              $kode_kota = '0000';
          }

					$template_txt .= $data->cif.$separator.$data->company_name.$separator.$data->kode_domisili.$separator.$data->kode_tipe_perusahaan.$separator.$data->kode_karakteristik_perusahaan.$separator.$data->npwp_no.$separator.$data->aria_skd_no.$separator.$data->kode_sumber_dana.$separator.$data->kode_tujuan_investasi.$separator.$data->kode_income_level.$separator.$data->company_address.$separator.$kode_kota.$separator.$kode_pos.$separator.$data->sid."\r\n";
			}
		}
		return $template_txt;
	}
}