<?php include 'modal/modal_pembukaan_rekening_individu.php';
  $stat=$this->session->userdata('level_id');
  $kategori=$this->input->post('kategori');
  $nama_nasabah=$this->input->post('nama_nasabah');
  $nama_fund=$this->input->post('nama_fund');
  $nama_sales=$this->input->post('nama_sales');
  $status=$this->input->post('status');
  $start_date=$this->input->post('start_date');
  $end_date=$this->input->post('end_date');
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
<body class="hold-transition skin-blue sidebar-mini"> <!-- fixed untuk responsive -->
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Filter Transaksi
          <!-- <small>Control panel</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_redemption"><span class="fa fa-plus"></span> Tambah Data Pembukaan Rekening</button>&nbsp;
        </ol> -->
      </section>
      <!-- Main content -->
      <section class="content">
      <div class="box box-default"> <!--collapsed-box-->
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" action="<?php echo site_url('logbook/filter_transaksi')?>" method="post">
                  <div class="form-group ">
                    <label class="col-sm-1 control-label">Kategori</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-kategori" style="width: 100%;" name="kategori" required="required">
                        <option value="">--- Pilih Kategori ---</option>
                        <option value="1">Subscription</option>
                        <option value="2">Redemption</option>
                        <option value="3">Switching</option>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Tanggal</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="col-sm-2">
                      <input type="date" class="form-control" name="end_date">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Produk</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-produk" style="width: 100%;" name="nama_fund">
                        <option value="">--- Pilih Produk ---</option>
                          <?php
                              if (isset($ref_data_fund)){
                              foreach ($ref_data_fund as $data){
                          ?>
                        <option value="<?php echo $data->nama_fund?>"><?php echo $data->nama_fund?></option>
                          <?php
                              }
                          }
                          ?>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Nasabah</label>
                    <div class="col-sm-4">
                        <select class="form-control select2-nasabah" style="width: 100%;" name="nama_nasabah">
                          <option value="">--- Pilih Nasabah ---</option>
                          <?php
                            if (isset($ref_data_nasabah)){
                            foreach ($ref_data_nasabah as $data){
                                $nama_nasabah=$data->nama_nasabah_individu;

                                if ($nama_nasabah=='') {
                                    $nama_nasabah1=$data->nama_nasabah_institusi;
                                }
                                else {
                                    $nama_nasabah1=$nama_nasabah;
                                }

                              ?>
                          <option value="<?php echo $nama_nasabah1;?>"><?php echo $nama_nasabah1?></option>
                              <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Sales</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-sales" style="width: 100%;" name="nama_sales">
                        <option value="">--- Pilih Sales ---</option>
                          <?php
                              if (isset($ref_sales)){
                              foreach ($ref_sales as $data){
                          ?>
                        <option value="<?php echo $data->nama_sales?>"><?php echo $data->nama_sales?></option>
                          <?php
                              }
                          }
                          ?>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Status</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-status" style="width: 100%;" name="status">
                        <option value="">All</option>
                        <option value="1">Selesai</option>
                        <option value="2">Pending</option>
                        <option value="3">Reject</option>
                        <option value="6">Cancel</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-10">
                      <button class="btn btn-primary" style="width: 100%;">Search</button>
                    </div>
                  </div>
                </form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                  <?php 
                    if ($kategori==0) {
                  ?>
                <div class="box-body">
                  <table id="datatable2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_1">Tanggal</th>
                        <th class="c_2">Kode Form</th>
                        <th class="c_3">Nama Nsabah</th>
                        <th class="c_4">No. KTP</th>
                        <th class="c_5">Nama Sales</th>
                        <th class="c_6">Checklist</th>
                        <th class="c_7">Pending Status</th>
                        <th class="c_8"><center></center></th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <?php }
                elseif ($kategori==1) {
                ?>
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
                        if (isset($data_transaksi)) {
                          foreach ($data_transaksi as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_subscription?kode_subscription='.$data->kode_subscription)?>"><?php echo $data->kode_subscription;?></a></td>
                        <td><?php echo $data->sid_nasabah;?></td>
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

                          // if ($sales=='1') {
                          //   $sa='<span class="label label-success">Sales</span> &nbsp';
                          // }
                          // else {
                          //   $sa='<span class="label label-warning">Sales</span> &nbsp';
                          // }

                          // if ($sinvest=='1') {
                          //   $si='<span class="label label-success">S-Invest</span> &nbsp';
                          // }
                          // else {
                          //   $si='<span class="label label-warning">S-Invest</span> &nbsp';
                          // }

                          // if ($s21=='1') {
                          //   $s2='<span class="label label-success">S21</span> &nbsp';
                          // }
                          // else {
                          //   $s2='<span class="label label-warning">S21</span> &nbsp';
                          // }

                          // if ($dana=='1') {
                          //   $da='<span class="label label-success">Good Fund</span> &nbsp';
                          // }
                          // elseif ($dana=='3') {
                          //   $da='<span class="label label-danger">Good Fund</span> &nbsp';
                          // }
                          // else {
                          //   $da='<span class="label label-warning">Good Fund</span> &nbsp';
                          // }

                          // if ($soft=='1') {
                          //   $so='<span class="label label-success">Softcopy</span> &nbsp';
                          // }
                          // else {
                          //   $so='<span class="label label-warning">Softcopy</span> &nbsp';
                          // }

                          // if ($surat=='1') {
                          //   $su='<span class="label label-success">Surat Asli</span> &nbsp';
                          // }
                          // else {
                          //   $su='<span class="label label-warning">Surat Asli</span> &nbsp';
                          // }

                          // if ($konfirmasi=='1') {
                          //   $ko='<span class="label label-success">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // elseif ($konfirmasi=='3' && $dana=='3') {
                          //   $ko='<span class="label label-danger">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // elseif ($dana=='3') {
                          //   $ko='<span class="label label-warning">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // else {
                          //   $ko='';
                          // }

                          // echo $sa .$s2 .$si .$da .$ko .$so .$su;
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
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          else {
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Good Fund</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>'; 
                          }
                        ?></td>
                        
                        <!-- <td>
                          <center>
                            <div class="btn-group" role="group">
                              <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#edit_subscription<?php echo $data->kode_subscription ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#hapus_subscription<?php echo $data->kode_subscription ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-trash"></span>
                              </button>
                            </div>
                          </center>
                        </td> -->
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php }
                  elseif ($kategori==2) {
                ?>
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
                        <th class="c_7">UP Redemption</th>
                        <th class="c_8">Nominal Redemption</th>
                        <th class="c_9">Pending Status</th>
                        <!-- <th class="c_10"><center></center></th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_transaksi)) {
                          foreach ($data_transaksi as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_redemption?kode_redemption='.$data->kode_redemption)?>"><?php echo $data->kode_redemption;?></a></td>
                        <td><?php echo $data->sid_nasabah;?></td>
                        <td><?php echo $data->nama_nasabah;?></td>
                        <td><?php echo $data->nama_fund;?></td>
                        <td><?php echo $data->no_rekening_penerima .' - ' .$data->nama_bank_rekening_penerima;?></td>
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
                          else {
                            echo $data->nominal_redemption;
                          }
                        ?></td>
                        <td><?php 
                          $sales=$data->approval_sales;
                          $sinvest=$data->approval_input_sinvest;
                          $s21=$data->approval_input_s21;
                          $dana=$data->approval_monitoring_pembayaran;
                          $soft=$data->approval_softcopy;
                          $surat=$data->approval_surat_konfirmasi_asli;
                          $spv=$data->approval_spv_settlement;
                          $ops=$data->approval_head_operation;

                          // if ($sales=='1') {
                          //   $sa='<span class="label label-success">Sales</span> &nbsp';
                          // }
                          // else {
                          //   $sa='<span class="label label-warning">Sales</span> &nbsp';
                          // }

                          // if ($sinvest=='1') {
                          //   $si='<span class="label label-success">S-Invest</span> &nbsp';
                          // }
                          // else {
                          //   $si='<span class="label label-warning">S-Invest</span> &nbsp';
                          // }

                          // if ($s21=='1') {
                          //   $s2='<span class="label label-success">S21</span> &nbsp';
                          // }
                          // else {
                          //   $s2='<span class="label label-warning">S21</span> &nbsp';
                          // }

                          // if ($dana=='1') {
                          //   $da='<span class="label label-success">Monitoring Pembayaran</span> &nbsp';
                          // }
                          // elseif ($dana=='3') {
                          //   $da='<span class="label label-danger">Monitoring Pembayaran</span> &nbsp';
                          // }
                          // else {
                          //   $da='<span class="label label-warning">Monitoring Pembayaran</span> &nbsp';
                          // }

                          // if ($soft=='1') {
                          //   $so='<span class="label label-success">Softcopy</span> &nbsp';
                          // }
                          // else {
                          //   $so='<span class="label label-warning">Softcopy</span> &nbsp';
                          // }

                          // if ($surat=='1') {
                          //   $su='<span class="label label-success">Surat Asli</span> &nbsp';
                          // }
                          // else {
                          //   $su='<span class="label label-warning">Surat Asli</span> &nbsp';
                          // }

                          // if ($konfirmasi=='1') {
                          //   $ko='<span class="label label-success">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // elseif ($konfirmasi=='3' && $dana=='3') {
                          //   $ko='<span class="label label-danger">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // elseif ($dana=='3') {
                          //   $ko='<span class="label label-warning">Konfirmasi Nasabah</span> &nbsp';
                          // }
                          // else {
                          //   $ko='';
                          // }

                          // echo $sa .$s2 .$si .$da .$ko .$so .$su;
                          if ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==1 && $soft==1 & $surat==1) {
                            echo '<span class="label label-success">Selesai</span>';
                          }
                          elseif ($sales==1 && $sinvest==5 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
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
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          else {
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pembayaran</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>'; 
                          }

                        ?></td>
                        
                        <!-- <td>
                          <center>
                            <div class="btn-group" role="group">
                              <!-- <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#edit_redemption<?php echo $data->kode_redemption ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#hapus_redemption<?php echo $data->kode_redemption ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-trash"></span>
                              </button>
                            </div>
                          </center>
                        </td> -->
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php }
                  elseif ($kategori==3) {
                ?>
                <div class="box-body">
                  <table id="datatable2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_0 hidden">No</th>
                        <th class="c_1">Tanggal</th>
                        <th class="c_2">Kode From</th>
                        <th class="c_3">SID</th>
                        <th class="c_4">Nama Nasabah</th>
                        <th class="c_5">Nama Fund Redm</th>
                        <th class="c_6">Nama Fund Subs</th>
                        <th class="c_7">UP Redemption</th>
                        <th class="c_8">Nominal Redemption</th>
                        <th class="c_9">Pending Status</th>
                        <!-- <th class="c_10"><center></center></th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_transaksi)) {
                          foreach ($data_transaksi as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_switching?kode_switching='.$data->kode_switching)?>"><?php echo $data->kode_switching;?></a></td>
                        <td><?php echo $data->sid_nasabah;?></td>
                        <td><?php echo $data->nama_nasabah;?></td>
                        <td><?php echo $data->nama_fund_redemption;?></td>
                        <td><?php echo $data->nama_fund_subscription;?></td>
                        <td><?php 
                          if ($data->up_switching!='') {
                            echo number_format($data->up_switching,0,',','.') .' Unit';  
                          }
                          else {
                            echo "-";
                          }
                        ?></td>
                        <td><?php 
                          if ($data->nominal_switching=='') {
                            echo '-';
                          }
                          elseif ($data->nominal_switching!='all' && $data->kode_fund_redemption!='MARKETUSD') {
                            echo "Rp " .number_format($data->nominal_switching,0,',','.');
                          }
                          elseif ($data->kode_fund_redemption=='MARKETUSD') {
                            echo "$ " .number_format($data->nominal_switching,0,',','.');
                          }
                          else {
                            echo $data->nominal_switching;
                          }
                        ?></td>
                        <td><?php 
                          $sales=$data->approval_sales;
                          $sinvest=$data->approval_input_sinvest;
                          $s21=$data->approval_input_s21;
                          $dana=$data->approval_monitoring_pemindahan_dana;
                          $soft=$data->approval_softcopy;
                          $surat=$data->approval_surat_konfirmasi_asli;
                          $spv=$data->approval_spv_settlement;
                          $ops=$data->approval_head_operation;

                          if ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==1 && $soft==1 & $surat==1) {
                            echo '<span class="label label-success">Selesai</span>';
                          }
                          elseif ($sales==1 && $sinvest==5 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==4 && $spv==4 && $ops==1 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
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
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          else {
                            echo '<span class="label label-warning">Sales</span> &nbsp <span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>'; 
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
                <?php }
                ?>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->