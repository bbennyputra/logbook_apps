<style>
  .c_0 {
    width: 5%;
  }
  .c_1 {
    width: 14%;
  }
  .c_2 {
    width: 14%;
  }
  .c_3 {
    width: 14%;
  }
  .c_4 {
    width: 14%;
  }
  .c_5 {
    width: 14%;
  }
  .c_6 {
    width: 14%;
  }
  .c_7 {
    width: 14%;
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
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini"> <!-- fixed untuk responsive -->
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Approval Pembukaan Rekening Institusi
          <!-- <small>Control panel</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_subscription"><span class="fa fa-plus"></span> Tambah Data Subscription</button>&nbsp;
        </ol> -->
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
                <?php 
                      $no=1;
                      if (isset($data_approval_pembukaan_rekening_institusi)) {
                        foreach ($data_approval_pembukaan_rekening_institusi as $data) {
                ?>
                <table border="0px">
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Kode Pembukaan Rekening</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->kode_pembukaan_rekening_institusi?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Tanggal</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo date("d M Y", strtotime($data->tanggal_input)) ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Nama Nasabah</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->nama_nasabah?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Nomor NPWP</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->no_npwp?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Sales</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->nama_sales; ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Checklist</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php 
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
                    ?></label></td>
                  </tr>
                </table>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_0 hidden">No</th>
                        <th class="c_2">Kadiv. Marketing</th>
                        <th class="c_4">Input S-Invest</th>
                        <th class="c_3">Input S21</th>
                        <th class="c_5">Verifikasi Spv. Settlement</th>
                        <th class="c_6">Approval Head Operation</th>
                        <th class="c_1">CRM</th>
                      </tr>
                    </thead>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/update_approval_pembukaan_rekening_institusi')?>">
                    <tbody>
                      <tr>
                        <input type="hidden" name="kode_pembukaan_rekening_institusi" value="<?php echo $data->kode_pembukaan_rekening_institusi;?>">
                        <td class="hidden"><?php echo $no++; ?></td>
                        
                        <td id="approval_kadiv_mkt">
                        <?php
                          if ($data->checklist_form_pembukaan_rekening=='1' && $data->checklist_npwp=='1') {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_kadiv_mkt" id="approval_kadiv_mkt">
                           <?php
                              foreach ($ref_approval_with_reject as $approve){
                                  $selected=($data->approval_kadiv_mkt == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select> 
                          <?php
                          }
                            elseif ($data->approval_crm=='1' && $data->checklist_form_pembukaan_rekening!='1' || $data->checklist_npwp!='1') {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_kadiv_mkt" id="approval_kadiv_mkt" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_kadiv_mkt == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select> 
                          <?php    
                          }
                            else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_kadiv_mkt" id="approval_kadiv_mkt" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_kadiv_mkt == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select> 
                          <?php
                          }
                          ?>   
                        </td>

                        <td id="approval_input_sinvest">
                          <?php
                            if ($data->approval_kadiv_mkt==1) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                            elseif ($data->approval_kadiv_mkt==''||$data->approval_kadiv_mkt=='2') {
                          ?>
                            <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest" disabled="disabled">
                              <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                            </select>
                          <?php    
                            }
                            else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest" disabled="disabled">
                              <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                            </select>
                          <?php }
                          ?>
                        </td>
                        
                        <td id="approval_input_s21">
                          <?php
                            if ($data->approval_kadiv_mkt==1 && $data->approval_input_sinvest==4) {
                          ?>
                          <select class="form-control" style="width: 100%;"  name="approval_input_s21" id="approval_input_s21">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php
                          }
                            else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_s21" id="approval_input_s21" disabled="disabled">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php    
                            }
                          ?>
                        </td>

                        <td id="approval_senior_settlement">
                        <?php
                          if ($data->approval_input_s21==4 && $data->approval_kadiv_mkt==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_senior_settlement" id="approval_senior_settlement">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_senior_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          elseif ($data->approval_kadiv_mkt==3 || $data->approval_kadiv_mkt==6 && $data->approval_input_s21==4) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_senior_settlement" id="approval_senior_settlement" disabled="disabled">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_senior_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_senior_settlement" id="approval_senior_settlement" disabled="disabled">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_senior_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          ?>
                        </td>

                        <td id="approval_head_operation">
                        <?php
                          if ($data->approval_senior_settlement==4 && $data->approval_kadiv_mkt==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_head_operation" id="approval_head_operation">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_head_operation == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          elseif ($data->approval_kadiv_mkt==3 || $data->approval_kadiv_mkt==6 && $data->approval_senior_settlement==4) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_head_operation" id="approval_head_operation" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_head_operation == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_head_operation" id="approval_head_operation" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_head_operation == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          ?>
                        </td>

                        <td id="approval_crm">
                        <?php
                          if ($data->approval_head_operation==1 && $data->approval_kadiv_mkt==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_crm" id="approval_crm">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_crm == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          elseif ($data->approval_kadiv_mkt==3 || $data->approval_kadiv_mkt==6 && $data->approval_head_operation==1) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_crm" id="approval_crm" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_crm == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_crm" id="approval_crm" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_crm == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          ?>
                        </td>
                      </tr>
                      
                    </tbody>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button><br><br>
                    </form>
                  </table>
                  <?php
                      }
                    }
                  ?>
                </div>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->