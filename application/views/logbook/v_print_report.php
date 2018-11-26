<?php $tgl=$this->input->post('tanggal_input'); ?>
<?php $this->load->view('layout/style')?>
<?php $this->load->view('layout/script')?>
<html>
<head>
<title>Print Report | Logbook Apps</title>
<style>
 @page { size: landscape; }
  .s_0 {
    width: 2%;
  }
  .s_1 {
    width: 17%;
  }
  .s_2 {
    width: 17%;
  }
  .s_3 {
    width: 10%;
  }
  .s_4 {
    width: 7%;
  }
  .s_5 {
    width: 8%;
  }
  .s_6 {
    width: 9%;
  }
  .s_7 {
    width: 10%;
  }
  .s_8 {
    width: 10%;
  }
  .s_9 {
    width: 10%;
  }

  .r_0 {
    width: 2%;
  }
  .r_1 {
    width: 15%;
  }
  .r_2 {
    width: 15%;
  }
  .r_3 {
    width: 8%;
  }
  .r_4 {
    width: 5%;
  }
  .r_5 {
    width: 6%;
  }
  .r_6 {
    width: 9%;
  }
  .r_7 {
    width: 10%;
  }
  .r_8 {
    width: 10%;
  }
  .r_9 {
    width: 10%;
  }
  .r_10 {
    width: 10%;
  }

  .sw_0 {
    width: 2%;
  }
  .sw_1 {
    width: 15%;
  }
  .sw_2 {
    width: 9%;
  }
  .sw_3 {
    width: 9%;
  }
  .sw_4 {
    width: 8%;
  }
  .sw_5 {
    width: 6%;
  }
  .sw_6 {
    width: 9%;
  }
  .sw_7 {
    width: 10%;
  }
  .sw_8 {
    width: 10%;
  }
  .sw_9 {
    width: 10%;
  }
  .sw_10 {
    width: 10%;
  }

  th, td {
    padding: 3px;
  }
  table {
    margin-bottom:30px; 
    margin-top: 0px;
    font-size:7pt;
    font-family: arial;
  }
</style>
</head>
<body onload="window.print()">  
  <center>
    <label class="col-sm-12 control-label" style="margin:0px;"><u>LOGBOOK TRANSAKSI REKSA DANA</u></label>
    <label class="col-sm-12 control-label" style="margin:0px;font-size: 8pt">Tanggal : <u><?php echo date('d M Y', strtotime($tgl))?></u></label>
    <label class="col-sm-12 control-label" style="margin:0px;font-size: 8pt">PNMIM/F-4.03/04/R1</label>
  </center>
  <label class="col-sm-3 control-label" style="font-size: 8pt;">SUBSCRIPTION</label>
  <table class="col-sm-12" border="1px solid">
    <thead>
      <tr>
        <th class="s_0">No</th>
        <th class="s_1">Nama</th>
        <th class="s_2">Reksa Dana</th>
        <th class="s_3">Nominal (Rp)</th>
        <th class="s_4">Selling Fee</th>
        <th class="s_5">Sales</th>
        <th class="s_6">Beneficary Bank</th>
        <th class="s_7">Pekerjaan/Bidang Usaha</th>
        <th class="s_8">Kategori Resiko</th>
        <th class="s_9">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no=1;
        if (isset($data_subscription_report)) {
          foreach ($data_subscription_report as $data) {
      ?>
      <tr>
        <td class=""><?php echo $no++; ?></td>

        <td rowspan=""><?php echo $data->nama_nasabah;?></td>

        <td><?php echo $data->nama_fund;?></td>
        <td><?php 
          if ($data->kode_fund=='MARKETUSD') {
            echo "$ " .number_format($data->nominal,0,',','.');
          }
          else {
            echo "Rp " .number_format($data->nominal,0,',','.');
          }
        ?></td>
        <td><?php echo $data->fee;?></td>
        <td><?php echo $data->nama_sales;?></td>
        <td><?php echo $data->no_rekening_fund .' - ' .$data->nama_bank_rekening_fund;?></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php
          }
        }
      ?>
    </tbody>
  </table>

  <label class="col-sm-3 control-label" style="font-size: 8pt;">REDEMPTION</label>
  <table class="col-sm-12" border="1px solid">
    <thead>
      <tr>
        <th class="r_0">No</th>
        <th class="r_1">Nama</th>
        <th class="r_2">Reksa Dana</th>
        <th class="r_3">Unit Redeemed</th>
        <th class="r_4">Nominal (Rp)</th>
        <th class="r_5">Redemption Fee</th>
        <th class="r_6">Sales</th>
        <th class="r_7">Payment Date</th>
        <th class="r_8">Pekerjaan/Bidang Usaha</th>
        <th class="r_9">Kategori Resiko</th>
        <th class="r_10">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no=1;
        if (isset($data_redemption_report)) {
          foreach ($data_redemption_report as $data) {
      ?>
      <tr>
        <td class=""><?php echo $no++; ?></td>

        <td rowspan=""><?php echo $data->nama_nasabah;?></td>

        <td><?php echo $data->nama_fund;?></td>
        <td><?php 
          if ($data->up_redemption!='') {
            echo number_format($data->up_redemption,0,',','.') .' Unit';  
          }
          else {
            echo "-";
          }
        ?></td>
        <td><?php 
          if ($data->nominal_redemption=='') {
            echo '-';
          }
          elseif ($data->nominal_redemption!='all' && $data->kode_fund!='MARKETUSD') {
            echo "Rp " .number_format($data->nominal_redemption,0,',','.');
          }
          elseif ($data->kode_fund=='MARKETUSD') {
            echo "$ " .number_format($data->nominal_redemption,0,',','.');
          }
          elseif ($data->nominal_redemption=='all') {
            echo "ALL UNIT";
          }
          else {
            echo $data->nominal_redemption;
          }
        ?></td>
        <td><?php 
        if ($data->redemption_fee!='') {
            echo number_format($data->redemption_fee,0,',','.');  
          }
          else {
            echo "-";
          }
        ?></td>
        <td><?php echo $data->nama_sales;?></td>
        <td><?php 
          $payment=date('d-m-Y', strtotime($data->payment_date));
          $input=date('d-m-Y', strtotime($data->tanggal_input));
          $t=$payment - $input;

          echo 'T + ' .$t;
        ?></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php
          }
        }
      ?>
    </tbody>
  </table>

  <label class="col-sm-3 control-label" style="font-size: 8pt;">SWITCHING</label>
  <table class="col-sm-12" border="1px solid">
    <thead>
      <tr>
        <th class="sw_0">No</th>
        <th class="sw_1">Nama</th>
        <th class="sw_2">RD Switch Out</th>
        <th class="sw_3">RD Switch In</th>
        <th class="sw_4">Unit Switched</th>
        <th class="sw_5">Nominal (Rp)</th>
        <th class="sw_6">Switching Fee</th>
        <th class="sw_7">Sales</th>
        <th class="sw_8">Pekerjaan/Bidang Usaha</th>
        <th class="sw_9">Kategori Resiko</th>
        <th class="sw_10">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no=1;
        if (isset($data_switching_report)) {
          foreach ($data_switching_report as $data) {
      ?>
      <tr>
        <td class=""><?php echo $no++; ?></td>

        <td rowspan=""><?php echo $data->nama_nasabah;?></td>

        <td><?php echo $data->nama_fund_redemption;?></td>
        <td><?php echo $data->nama_fund_subscription;?></td>
        <td><?php 
          if ($data->up_switching!='') {
            echo number_format($data->up_switching,0,',','.') .' Unit';  
          }
          elseif ($nominal_switching=='all') {
            echo 'ALL UNIT';
          } 
          else {
            echo "-";
          }
        ?></td>
        <td><?php 
          if ($data->kode_fund=='MARKETUSD') {
            echo "$ " .number_format($data->nominal_switching,0,',','.');
          }
          else {
            echo "Rp " .number_format($data->nominal_switching,0,',','.');
          }
        ?></td>
        <td><?php echo $data->fee;?></td>
        <td><?php echo $data->nama_sales;?></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php
          }
        }
      ?>
    </tbody>
  </table>

  <label class="col-sm-12 control-label" style="font-size: 8pt;">FILE LAIN</label>
  <table border="1px solid">
    <thead>
      <tr>
        <th width="30">No</th>
        <th width="150">Nama</th>
        <th width="120">Reksa Dana</th>
        <th width="100">Unit</th>
        <th width="100">PIC</th>
        <th width="150">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td height="20">1</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td height="20">2</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td height="20">3</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
<!--       <tr>
        <td class="">4</td>
        <td rowspan=""></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="">5</td>
        <td rowspan=""></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr> -->
    </tbody>
  </table>
  
  <table border="1px solid">
    <thead>
      <tr>
        <th width="100">Dibuat Oleh :</th>
        <th width="100">Disetujui Oleh :</th>
        <th width="100">Diterima Oleh :</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td height="50"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>AYU</td>
        <td>ASD</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</body>