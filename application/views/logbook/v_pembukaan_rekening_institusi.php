<?php include 'modal/modal_pembukaan_rekening_institusi.php';
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
          Pembukaan Rekening Institusi
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
                        <th class="c_3">Nama Nasabah</th>
                        <th class="c_4">No. NPWP</th>
                        <!-- <th class="c_5">No. Kontak PIC</th> -->
                        <th class="c_6">Nama Sales</th>
                        <!-- <th class="c_7">Form Pembukaan Rekening</th> -->
                        <th class="c_8">Checklist</th>
                        <th class="c_9">Pending Status</th>
                        <!-- <th class="c_10"><center></center></th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_pembukaan_rekening_institusi)) {
                          foreach ($data_pembukaan_rekening_institusi as $data) {
                      ?>
                      <tr>
                        <td class="hidden"><?php echo $no++; ?></td>

                        <td rowspan=""><?php echo date("d M Y", strtotime($data->tanggal_input));?></td>

                        <td><a href="<?php echo site_url('logbook/approval_pembukaan_rekening_institusi?kode_pembukaan_rekening_institusi='.$data->kode_pembukaan_rekening_institusi)?>"><?php echo $data->kode_pembukaan_rekening_institusi;?></a></td>
                        <td><?php echo $data->nama_nasabah;?></td>
                        <td><?php echo $data->no_npwp;?></td>
                       <!--  <td><?php echo $data->no_hp_pic;?></td> -->
                        <td><?php echo $data->nama_sales;?></td>
                        <td><?php 
                          $form=$data->checklist_form_pembukaan_rekening;
                          $npwp=$data->checklist_npwp;
                          $siup=$data->checklist_siup;
                          $adart=$data->checklist_adart;
                          $skd=$data->checklist_skd;
                          $specimen=$data->checklist_specimen;
                          $ktp=$data->checklist_ktp_pengurus;
                          $rek=$data->checklist_rekening_redemption;

                          if ($form=='1') {
                            $f='<span class="label label-success">Form</span> &nbsp';
                          }
                          else {
                            $f='<span class="label label-warning">Form</span> &nbsp';
                          }

                          if ($npwp=='1') {
                            $n='<span class="label label-success">NPWP</span> &nbsp';
                          }
                          else {
                            $n='<span class="label label-warning">NPWP</span> &nbsp';
                          }

                          if ($siup=='1') {
                            $s='<span class="label label-success">SIUP</span> &nbsp';
                          }
                          else {
                            $s='<span class="label label-warning">SIUP</span> &nbsp';
                          }

                          if ($adart=='1') {
                            $a='<span class="label label-success">AD/ART</span> &nbsp';
                          }
                          else {
                            $a='<span class="label label-warning">AD/ART</span> &nbsp';
                          }

                          if ($skd=='1') {
                            $sk='<span class="label label-success">SKD</span> &nbsp';
                          }
                          else {
                            $sk='<span class="label label-warning">SKD</span> &nbsp';
                          }

                          if ($specimen=='1') {
                            $sp='<span class="label label-success">Specimen</span> &nbsp';
                          }
                          else {
                            $sp='<span class="label label-warning">Specimen</span> &nbsp';
                          }

                          if ($ktp=='1') {
                            $k='<span class="label label-success">KTP</span> &nbsp';
                          }
                          else {
                            $k='<span class="label label-warning">KTP</span> &nbsp';
                          }

                          if ($rek=='1') {
                            $r='<span class="label label-success">Dokumen POJK</span>';
                          }
                          else {
                            $r='<span class="label label-warning">Dokumen POJK</span>';
                          }

                          echo $f .$n .$s .$a .$sk .$sp .$k .$r;
                          // if ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='1' & $skd=='1' && $specimen=='1' && $ktp=='1' && $rek=='1') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-success">AD/ART</span> &nbsp <span class="label label-success">SKD</span> &nbsp <span class="label label-success">Specimen</span> &nbsp <span class="label label-success">KTP Pengurus</span> &nbsp <span class="label label-success">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='1' & $skd=='1' && $specimen=='1' && $ktp=='1' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-success">AD/ART</span> &nbsp <span class="label label-success">SKD</span> &nbsp <span class="label label-success">Specimen</span> &nbsp <span class="label label-success">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='1' & $skd=='1' && $specimen=='1' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-success">AD/ART</span> &nbsp <span class="label label-success">SKD</span> &nbsp <span class="label label-success">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='1' & $skd=='1' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-success">AD/ART</span> &nbsp <span class="label label-success">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='1' & $skd=='' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-success">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='1' && $adart=='' & $skd=='' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-success">SIUP</span> &nbsp <span class="label label-warning">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='1' && $siup=='' && $adart=='' & $skd=='' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-success">NPWP</span> &nbsp <span class="label label-warning">SIUP</span> &nbsp <span class="label label-warning">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='1' && $npwp=='' && $siup=='' && $adart=='' & $skd=='' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-success">Form</span> &nbsp <span class="label label-warning">NPWP</span> &nbsp <span class="label label-warning">SIUP</span> &nbsp <span class="label label-warning">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // elseif ($form=='' && $npwp=='' && $siup=='' && $adart=='' & $skd=='' && $specimen=='' && $ktp=='' && $rek=='') {
                          //   echo '<span class="label label-warning">Form</span> &nbsp <span class="label label-warning">NPWP</span> &nbsp <span class="label label-warning">SIUP</span> &nbsp <span class="label label-warning">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                          // else {
                          //   echo '<span class="label label-warning">Form</span> &nbsp <span class="label label-warning">NPWP</span> &nbsp <span class="label label-warning">SIUP</span> &nbsp <span class="label label-warning">AD/ART</span> &nbsp <span class="label label-warning">SKD</span> &nbsp <span class="label label-warning">Specimen</span> &nbsp <span class="label label-warning">KTP Pengurus</span> &nbsp <span class="label label-warning">Rekening</span>';
                          // }
                        ?></td>

                        <!-- <td><?php 
                        if ($data->checklist_npwp==1) {
                              echo 'Ada';
                            }
                            else {
                              echo 'Tidak Ada';
                            }
                        ?></td> -->
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
                          elseif ($kadiv_mkt=='2' && $sinvest=='5' && $s21=='5' && $senior=='5' && $ops=='2' && $crm == '2') {
                            echo '<span class="label label-warning"> Kadiv. MKT </span> &nbsp <span class="label label-warning"> S-Invest </span> &nbsp <span class="label label-warning"> S21 </span> &nbsp <span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          else {
                            
                          }
                        ?></td>
                        
                        <!-- <td>
                          <center>
                            <div class="btn-group" role="group">
                              <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a>
                              <button type="button" class="btn btn-default btn-sm" href="#edit_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                              <button type="button" class="btn btn-default btn-sm" href="#hapus_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-remove"></span>
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