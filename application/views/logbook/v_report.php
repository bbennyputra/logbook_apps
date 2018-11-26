<?php include 'modal/modal_pembukaan_rekening_individu.php';
  $stat=$this->session->userdata('level_id');
  $kategori=$this->input->post('kategori');
  $nama_nasabah=$this->input->post('nama_nasabah');
  $nama_fund=$this->input->post('nama_fund');
  $nama_sales=$this->input->post('nama_sales');
  $status=$this->input->post('status');
  $start_date=$this->input->post('start_date');
  $end_date=$this->input->post('end_date');
  $tgl=$this->input->post('tanggal_input');
?>
<style>
  .c_0 {
    width: 5%;
  }
  .c_1 {
    width: 7%;
  }
  .c_2 {
    width: 9%;
  }
  .c_3 {
    width: 10%;
  }
  .c_4 {
    width: 10%;
  }
  .c_5 {
    width: 14%;
  }
  .c_6 {
    width: 9%;
  }
  .c_7 {
    width: 11%;
  }
  .c_8 {
    width: 10%;
  }
  .c_9 {
    width: 10%;
  }
  .c_10 {
    width: 7%;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse"> <!-- fixed untuk responsive -->
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Report
          <!-- <small>Control panel</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_redemption"><span class="fa fa-plus"></span> Tambah Data Pembukaan Rekening</button>&nbsp;
        </ol> -->
      </section>
      <!-- Main content -->
      <section class="content">
      <div class="box box-default collapsed-box"> <!--collapsed-box-->
        <form class="form-horizontal" method="post" action="<?= site_url('logbook/report')?>">
        <div class="box-header with-border">
          <div class="col-sm-3"><h3 class="box-title"></h3></div>
          <div class="col-sm-4">
           <input class="form-control" type="text" name="tanggal_input" id="datepicker1" value="<?php echo $tgl ?>">
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary" id="" style="margin-top: 0px;">Search</button>
          </div>
        </div>
        </form>
      </div><!-- /.box -->
        <?php 
          if ($tgl!='') {
        ?>
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="col-sm-11"></div>
                  <div class="col-sm-1">
                    <form class="form-horizontal" method="post" action="<?= site_url('logbook/print_report')?>" target="_blank">
                      <button type="submit" class="btn btn-primary">Print</button>
                      <input class="form-control" type="hidden" name="tanggal_input" value="<?php echo $tgl ?>">
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">               
                  <label class="col-sm-3 control-label">SUBSCRIPTION</label>
                  <table class="col-sm-12" border="1px solid" style="margin-bottom:30px; margin-top: 0px;">
                    <thead>
                      <tr>
                        <th class="c_0">No</th>
                        <th class="c_1">Nama</th>
                        <th class="c_2">Reksa Dana</th>
                        <th class="c_3">Nominal(Rp)</th>
                        <th class="c_4">Selling Fee</th>
                        <th class="c_5">Sales</th>
                        <th class="c_6">Beneficary Bank</th>
                        <th class="c_8">Pekerjaan/Bidang Usaha</th>
                        <th class="c_9">Kategori Resiko</th>
                        <th class="c_9">Keterangan</th>
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
          
                  <label class="col-sm-3 control-label">REDEMPTION</label>
                  <table class="col-sm-12" border="1px solid" style="margin-bottom:30px;">
                    <thead>
                      <tr>
                        <th class="c_0">No</th>
                        <th class="c_1">Nama</th>
                        <th class="c_2">Reksa Dana</th>
                        <th class="c_2">Unit Redem</th>
                        <th class="c_3">Nominal(Rp)</th>
                        <th class="c_4">Redem Fee</th>
                        <th class="c_5">Sales</th>
                        <th class="c_5">Payment Date</th>
                       <!--  <th class="c_7">UP</th> -->
                        <th class="c_8">Pekerjaan/Bidang Usaha</th>
                        <th class="c_9">Kategori Resiko</th>
                        <th class="c_9">Keterangan</th>
                        <!-- <th class="c_10"><center></center></th> -->
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
                        <td><?php echo $data->payment_date;?></td>
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

                  <label class="col-sm-3 control-label">SWITCHING</label>
                  <table class="col-sm-12" border="1px solid" style="margin-bottom:30px;">
                    <thead>
                      <tr>
                        <th class="c_0">No</th>
                        <th class="c_1">Nama</th>
                        <th class="c_2">RD Switch Out</th>
                        <th class="c_3">RD Switch In</th>
                        <th class="c_4">Unit Switched</th>
                        <th class="c_5">Nominal (Rp)</th>
                        <th class="c_6">Switching Fee</th>
                       <!--  <th class="c_7">UP</th> -->
                        <th class="c_8">Sales</th>
                        <th class="c_9">Pekerjaan/Bidang Usaha</th>
                        <!-- <th class="c_10"><center></center></th> -->
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
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>

                  <label class="col-sm-3 control-label">FILE LAIN</label>
                  <table class="col-sm-12" border="1px solid" style="margin-bottom:30px;">
                    <thead>
                      <tr>
                        <th class="c_0">No</th>
                        <th class="c_1">Nama</th>
                        <th class="c_2">Reksa Dana</th>
                        <th class="c_3">Unit</th>
                        <th class="c_4">PIC</th>
                        <th class="c_5">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="">1</td>
                        <td rowspan=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="">2</td>
                        <td rowspan=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="">3</td>
                        <td rowspan=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
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
                      </tr>
                    </tbody>
                  </table>
                  
                  <table border="1px solid">
                    <thead>
                      <tr>
                        <th width="200">Dibuat Oleh :</th>
                        <th width="200">Disetujui Oleh :</th>
                        <th width="200">Diterima Oleh :</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td height="100"></td>
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
                </div>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
        <?php }
          else {

          }
        ?>  
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->