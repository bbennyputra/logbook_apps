<?php include 'modal/modal_switching.php';
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
    width: 14%;
  }
  .c_6 {
    width: 9%;
  }
  .c_7 {
    width: 11%;
  }
  .c_8 {
    width: 13%;
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
          Switching
          <!-- <small>Control panel</small> -->
        </h1>
        <?php
          if ($stat==8) {
        ?>
        <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_redemption"><span class="fa fa-plus"></span> Tambah Data Switching</button>&nbsp;
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
                        if (isset($data_switching)) {
                          foreach ($data_switching as $data) {
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
                            // echo number_format($data->up_switching,0,',','.') .' Unit';  
                            echo $data->up_switching .' Unit';  
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
                          //   $da='<span class="label label-success">Monitoring Pemindahan Dana</span> &nbsp';
                          // }
                          // elseif ($dana=='3') {
                          //   $da='<span class="label label-danger">Monitoring Pemindahan Dana</span> &nbsp';
                          // }
                          // else {
                          //   $da='<span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp';
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
                            echo '<span class="label label-warning">S-Invest</span> &nbsp <span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
                          }
                          elseif ($sales==1 && $sinvest==4 && $s21==5 && $spv==5 && $ops==2 && $dana==2 && $soft==2 && $surat==2) {
                            echo '<span class="label label-warning">S21</span> &nbsp <span class="label label-warning">Spv. Settlement</span> &nbsp <span class="label label-warning">Head Operation</span> &nbsp <span class="label label-warning">Monitoring Pemindahan Dana</span> &nbsp <span class="label label-warning">SC Konfirmasi</span> &nbsp <span class="label label-warning">Konfirmasi Asli</span>';
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
                        
                        <!-- <td>
                          <center>
                            <div class="btn-group" role="group">
                              <!-- <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#edit_switching<?php echo $data->kode_switching ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button> -->
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#hapus_switching<?php echo $data->kode_switching ?>" data-toggle="modal">
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
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->