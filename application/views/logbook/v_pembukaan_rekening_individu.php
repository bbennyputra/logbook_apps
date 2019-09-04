<?php include 'modal/modal_pembukaan_rekening_individu.php' ;
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
          Pembukaan Rekening Individu
          <!-- <small>Control panel</small> -->
        </h1>
        <?php 
          if ($stat==8) {
        ?>
        <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_redemption"><span class="fa fa-plus"></span> Tambah Data Pembukaan Rekening</button>&nbsp;
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
                        <th class="c_3">Nama Nsabah</th>
                        <th class="c_4">No. KTP</th>
                        <!-- <th class="c_5">No. Selular</th> -->
                        <th class="c_6">Nama Sales</th>
                        <!-- <th class="c_7">Form Pembukaan Rekening</th> -->
                        <th class="c_8">Checklist</th>
                        <th class="c_9">Pending Status</th>
                      <?php
                        if ($stat==8||$stat==6) {
                      ?>
                        <th class="c_10"><center></center></th>
                      <?php }
                        else {

                        }
                      ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_pembukaan_rekening_individu)) {
                          foreach ($data_pembukaan_rekening_individu as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_pembukaan_rekening_individu?kode_pembukaan_rekening_individu='.$data->kode_pembukaan_rekening_individu)?>"><?php echo $data->kode_pembukaan_rekening_individu;?></a></td>
                        <td><?php echo $data->nama_nasabah;?></td>
                        <td><?php echo $data->no_ktp;?></td>
                        <!-- <td><?php echo $data->no_hp;?></td> -->
                        <td><?php echo $data->nama_sales;?></td>
                        <!-- <td><?php 
                          if ($data->checklist_form_pembukaan_rekening=='1') {
                            echo 'Ada';
                          }
                          else {
                            echo 'Tidak Ada';
                          }
                        ?></td>
                        <td><?php 
                          if ($data->checklist_ktp=='1') {
                            echo 'Ada';
                          }
                          else {
                            echo 'Tidak Ada';
                          }
                        ?></td> -->
                        <td><?php
                          $ktp=$data->checklist_ktp;
                          $form=$data->checklist_form_pembukaan_rekening;
                          $npwp=$data->checklist_npwp;

                          if ($form!='') {
                            $f='<span class="label label-success">Form Pembukaan Rekening</span> &nbsp';
                          }
                          else {
                            $f='<span class="label label-warning">Form Pembukaan Rekening</span> &nbsp';
                          }

                          if ($ktp!='') {
                            $k='<span class="label label-success">KTP</span> &nbsp';
                          }
                          else {
                            $k='<span class="label label-warning">KTP</span> &nbsp';
                          }

                          if ($npwp!='') {
                            $n='<span class="label label-success">NPWP</span> &nbsp';
                          }
                          else {
                            $n='<span class="label label-warning">NPWP</span> &nbsp';
                          }

                          echo $f .$k .$n;
                          // if ($ktp=='1' && $form=='1') {
                          //    echo '<span class="label label-success">KTP</span> &nbsp <span class="label label-success"> Form Pembukaan Rekening </span>';
                          // }
                          // elseif ($ktp=='1') {
                          //   echo '<span class="label label-success">KTP</span> &nbsp <span class="label label-warning"> Form Pembukaan Rekening </span>';
                          // }
                          // elseif ($form=='1') {
                          //   echo '<span class="label label-success">Form Pembukaan Rekening</span> &nbsp <span class="label label-warning">KTP</span>';
                          // }
                          // else {
                          //   echo '<span class="label label-warning">Form Pembukaan Rekening</span> &nbsp <span class="label label-warning">KTP</span>'; 
                          // }
                        ?></td>
                        <td><?php 
                          $crm=$data->approval_crm;
                          $kadiv_mkt=$data->approval_kadiv_mkt;
                          $sinvest=$data->approval_input_sinvest;
                          $s21=$data->approval_input_s21;
                          $senior=$data->approval_senior_settlement;
                          $ops=$data->approval_head_operation;

                          if ($kadiv_mkt=='1' && $s21=='4' && $sinvest=='4' && $senior=='4' && $ops=='1' && $crm == '1') {
                            echo '<span class="label label-success">Selesai</span>';
                          }
                          elseif ($kadiv_mkt == '1' && $sinvest=='5' && $s21=='5' && $senior=='5' && $ops=='2' && $crm=='2') {
                            echo '<span class="label label-warning"> S-Invest </span> &nbsp <span class="label label-warning"> S21 </span> &nbsp <span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          elseif ($kadiv_mkt == '1' && $sinvest=='4' && $s21=='5' && $senior=='5' && $ops=='2' && $crm=='2') {
                            echo '<span class="label label-warning"> S21 </span> &nbsp <span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          elseif ($kadiv_mkt == '1' && $sinvest=='4' && $s21=='4' && $senior=='5' && $ops=='2' && $crm=='2') {
                            echo '<span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          elseif ($kadiv_mkt == '1' && $sinvest=='4' && $s21=='4' && $senior=='4' && $ops=='2' && $crm=='2') {
                            echo '<span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          elseif ($kadiv_mkt == '1' && $sinvest=='4' && $s21=='4' && $senior=='4' && $ops=='1' && $crm=='2') {
                            echo '<span class="label label-warning"> CRM </span>'; 
                          }
                          elseif ($kadiv_mkt == '3') {
                            echo '<span class="label label-danger"> Reject </span>'; 
                          }
                          elseif ($crm == '3') {
                            echo '<span class="label label-danger"> Reject </span>'; 
                          }
                          elseif ($kadiv_mkt == '6') {
                            echo '<span class="label label-danger"> Cancel </span>'; 
                          }
                          elseif ($kadiv_mkt=='2' && $s21=='5' && $sinvest=='5' && $s21=='5' && $senior=='5' && $ops=='2' && $crm == '2') {
                            echo '<span class="label label-warning"> Kadiv. MKT </span> &nbsp <span class="label label-warning"> S-Invest </span> &nbsp <span class="label label-warning"> S21 </span> &nbsp <span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          else {
                            
                          }
                        ?></td>
                        <?php 
                          if ($stat==8 || ($stat==6)) {
                        ?>
                        <td>
                          <center>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default btn-sm" href="#edit_pembukaan_rekening_individu<?php echo $data->kode_pembukaan_rekening_individu ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button></div>
                          </center>
                        </td>
                        <?php }
                        else {

                        }
                        ?>
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