<?php include 'modal/modal_pembukaan_rekening_individu.php';
  $stat=$this->session->userdata('level_id');
  $kategori=$this->input->post('kategori');
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
          Filter Pembukaan Rekening
          <!-- <small>Control panel</small> -->
        </h1>
       <!--  <ol class="breadcrumb">
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
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" action="<?php echo site_url('logbook/filter_pembukaan_rekening')?>" method="post">
                  <div class="form-group ">
                    <label class="col-sm-1 control-label">Kategori</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-kategori" style="width: 100%;" name="kategori" required="required">
                        <?php
                          if ($kategori==0) {
                        ?>
                        <option value="">--- Pilih Kategori ---</option>
                        <option value="1">Pembukaan Rekening Individu</option>
                        <option value="2">Pembukaan Rekening Institusi</option>
                        <?php }
                          elseif ($kategori==1) {
                        ?>
                        <option value="1" selected="selected">Pembukaan Rekening Individu</option>
                        <option value="2">Pembukaan Rekening Institusi</option>    
                        <?php }
                          elseif ($kategori==2) {
                        ?>
                        <option value="1">Pembukaan Rekening Individu</option>
                        <option value="2" selected="selected">Pembukaan Rekening Institusi</option>    
                        <?php }
                        ?>
                      </select>
                    </div>
                    <label class="col-sm-1 control-label">Tanggal</label>
                    <div class="col-sm-2">
                      <input type="date" class="form-control" name="start_date" value="<?php echo $start_date?>">
                    </div>
                    <div class="col-sm-2">
                      <input type="date" class="form-control" name="end_date"  value="<?php echo $end_date?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Sales</label>
                    <div class="col-sm-4">
                      <select class="form-control select2-sales" style="width: 100%;" name="nama_sales">
                        <?php 
                          if ($nama_sales!=0 || $nama_sales!='') {
                        ?>
                        <option value="<?php echo $nama_sales?>"><?php echo $nama_sales ?></option>
                        <option value="">--- Pilih Sales ---</option>
                        <?php }
                          else {
                        ?>
                        <option value="">--- Pilih Sales ---</option>
                          <?php }
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
                      <?php 
                        if ($status==0) {
                      ?>
                        <option value="">All</option>
                        <option value="1">Selesai</option>
                        <option value="2">Pending</option>
                        <option value="3">Reject</option>
                      <?php }
                        elseif ($status==1) {
                      ?>
                        <option value="">All</option>
                        <option value="1" selected="selected">Selesai</option>
                        <option value="2">Pending</option>
                        <option value="3">Reject</option>
                      <?php }
                        elseif ($status==2) {
                      ?>
                        <option value="">All</option>
                        <option value="1">Selesai</option>
                        <option value="2" selected="selected">Pending</option>
                        <option value="3">Reject</option>
                      <?php }
                        elseif ($status==3) {
                      ?>
                        <option value="">All</option>
                        <option value="1">Selesai</option>
                        <option value="2">Pending</option>
                        <option value="3" selected="selected">Reject</option>
                      <?php }
                      ?>
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
                <?php if ($kategori==0) {
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
                        <th class="c_3">Nama Nsabah</th>
                        <th class="c_4">No. KTP</th>
                        <!-- <th class="c_5">No. Selular</th> -->
                        <th class="c_6">Nama Sales</th>
                        <!-- <th class="c_7">Form Pembukaan Rekening</th> -->
                        <th class="c_8">Checklist</th>
                        <th class="c_9">Pending Status</th>
                        <th class="c_10"><center></center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_pembukaan_rekening)) {
                          foreach ($data_pembukaan_rekening as $data) {
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
                        
                        <td>
                          <center>
                            <div class="btn-group" role="group">
                              <!-- <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a> -->
                              <button type="button" class="btn btn-default btn-sm" href="#edit_pembukaan_rekening_individu<?php echo $data->kode_pembukaan_rekening_individu ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#hapus_pembukaan_rekening_individu<?php echo $data->kode_pembukaan_rekening_individu ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-trash"></span>
                              </button> -->
                            </div>
                          </center>
                        </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- body -->
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
                        <th class="c_3">Nama Nasabah</th>
                        <th class="c_4">No. NPWP</th>
                        <!-- <th class="c_5">No. Kontak PIC</th> -->
                        <th class="c_6">Nama Sales</th>
                        <!-- <th class="c_7">Form Pembukaan Rekening</th> -->
                        <th class="c_8">Checklist</th>
                        <th class="c_9">Pending Status</th>
                        <th class="c_10"><center></center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_pembukaan_rekening)) {
                          foreach ($data_pembukaan_rekening as $data) {
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

                          if ($form!='') {
                            $f='<span class="label label-success">Form</span> &nbsp';
                          }
                          else {
                            $f='<span class="label label-warning">Form</span> &nbsp';
                          }

                          if ($npwp!='') {
                            $n='<span class="label label-success">NPWP</span> &nbsp';
                          }
                          else {
                            $n='<span class="label label-warning">NPWP</span> &nbsp';
                          }

                          if ($siup!='') {
                            $s='<span class="label label-success">SIUP</span> &nbsp';
                          }
                          else {
                            $s='<span class="label label-warning">SIUP</span> &nbsp';
                          }

                          if ($adart!='') {
                            $a='<span class="label label-success">AD/ART</span> &nbsp';
                          }
                          else {
                            $a='<span class="label label-warning">AD/ART</span> &nbsp';
                          }

                          if ($skd!='') {
                            $sk='<span class="label label-success">SKD</span> &nbsp';
                          }
                          else {
                            $sk='<span class="label label-warning">SKD</span> &nbsp';
                          }

                          if ($specimen!='') {
                            $sp='<span class="label label-success">Specimen</span> &nbsp';
                          }
                          else {
                            $sp='<span class="label label-warning">Specimen</span> &nbsp';
                          }

                          if ($ktp!='') {
                            $k='<span class="label label-success">KTP</span> &nbsp';
                          }
                          else {
                            $k='<span class="label label-warning">KTP</span> &nbsp';
                          }

                          if ($rek!='') {
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
                          elseif ($kadiv_mkt=='2' && $s21=='5' && $sinvest=='5' && $s21=='5' && $senior=='5' && $ops=='2' && $crm == '2') {
                            echo '<span class="label label-warning"> Kadiv. MKT </span> &nbsp <span class="label label-warning"> S-Invest </span> &nbsp <span class="label label-warning"> S21 </span> &nbsp <span class="label label-warning"> Spv. Settlement </span> &nbsp <span class="label label-warning"> Head Operation </span> &nbsp <span class="label label-warning"> CRM </span>'; 
                          }
                          else {
                            
                          }
                        ?></td>
                        
                        <td>
                          <center>
                            <div class="btn-group" role="group">
                              <!-- <a href="<?php echo site_url('pelaporan/detail_complain_list?no_pelaporan='.$data->no_pelaporan)?>"><button type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-list"></span>
                              </button></a> -->
                              <button type="button" class="btn btn-default btn-sm" href="#edit_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                              <!-- <button type="button" class="btn btn-default btn-sm" href="#hapus_pembukaan_rekening_institusi<?php echo $data->kode_pembukaan_rekening_institusi ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-remove"></span>
                              </button> -->
                            </div>
                          </center>
                        </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php }?>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->