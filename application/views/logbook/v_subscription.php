<?php include 'modal/modal_subscription.php';
      $stat=$this->session->userdata('level_id');
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
    width: 12%;
  }
  .c_6 {
    width: 9%;
  }
  .c_7 {
    width: 15%;
  }
  .c_8 {
    width: 11%;
  }
  .c_9 {
    width: 7%;
  }
  .c_10 {
    width: 7%;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini"> <!-- fixed untuk responsive -->
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Subscription
          <!-- <small>Control panel</small> -->
        </h1>
        <?php 
          if ($stat==8) {
        ?>
        <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_subscription"><span class="fa fa-plus"></span> Tambah Data Subscription</button>&nbsp;
        </ol>
        <?php }
          else {

          }
        ?>
      </section>
      <!-- Main content -->
      <section class="content">
      <!-- <div class="box box-default collapsed-box">
        <form class="form-horizontal" method="post" action="<?= site_url('pelaporan/complain_filter_by_fungsi')?>">
        <div class="box-header with-border">
          <div class="col-sm-3"><h3 class="box-title"></h3></div>
          <div class="col-sm-4">
              <select class="form-control select2_fungsi_filter" style="width: 100%;" name="fungsi">
                <option value="">Pilih Fungsi Terkait</option>
                  <?php
                      if (isset($ref_fungsi_terkait)){
                      foreach ($ref_fungsi_terkait as $data){
                  ?>
                <option value="<?php echo $data->kode_fungsi_terkait?>"><?php echo $data->nama_fungsi_terkait?></option>
                  <?php
                      }
                  }
                  ?>
            </select>
          </div>
          <div class="col-sm-2">
            <button class="btn btn-default" id="" style="margin-top: 0px;">Search</button>
          </div>
        </div>
        </form>
      </div> --><!-- /.box -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="datatable2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_0 hidden">No</th>
                        <th class="c_1">Tanggal</th>
                        <th class="c_2">Kode Form</th>
                        <th class="c_3">SID</th>
                        <th class="c_4">Nama Nasabah</th>
                        <th class="c_5">Nama Fund</th>
                        <th class="c_6">Rekening Fund</th>
                       <!--  <th class="c_7">UP</th> -->
                        <th class="c_8">Nominal</th>
                        <th class="c_9">Pending Status</th>
                        <!-- <th class="c_10"><center></center></th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_subscription)) {
                          foreach ($data_subscription as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_subscription?kode_subscription='.$data->kode_subscription)?>"><?php echo $data->kode_subscription;?></a></td>
                        <td><?php 
                          if ($data->sid_nasabah!='') {
                            echo $data->sid_nasabah;
                          }
                          else {
                            echo "-";
                          }
                        ?></td>
                        <td><?php echo $data->nama_nasabah;?></td>
                        <td><?php echo $data->nama_fund;?></td>
                        <td><?php echo $data->no_rekening_fund .' - ' .$data->nama_bank_rekening_fund;?></td>
                        <!-- <td><?php 
                          if ($data->up_subscription!='') {
                            echo number_format($data->up_subscription,0,',','.') .' Unit';  
                          }
                          else {
                            echo "-";
                          }
                        ?></td> -->
                        <td><?php 
                          if ($data->kode_fund=='MARKETUSD') {
                            echo "$ " .number_format($data->nominal,0,',','.');
                          }
                          else {
                            echo "Rp " .number_format($data->nominal,0,',','.');
                          }
                        ?></td>
                        <td><?php 
                          $sales=$data->approval_sales;
                          $sinvest=$data->approval_input_sinvest;
                          $s21=$data->approval_input_s21;
                          $dana=$data->approval_good_fund;
                          $soft=$data->approval_softcopy;
                          $surat=$data->approval_surat_konfirmasi_asli;
                          $spv=$data->approval_spv_settlement;
                          $ops=$data->approval_head_operation;

                          if ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==1 && $soft==1 & $surat==1) {
                            echo '<span class="label label-success">Selesai</span>';
                          }
                          elseif ($sales==1 && $sinvest==5 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($dana==3) {
                            echo '<span class="label label-danger">Reject</span>';
                          }
                          elseif ($dana==6) {
                            echo '<span class="label label-danger">Cancel</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==1 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==1 && $soft==1 && $surat==2) {
                            echo '<span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==2 && $sinvest==5 && $s21==5 && $spv==5 && $ops==2 && $dana==5 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          else {
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>'; 
                          }
                        ?></td>
                        
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->