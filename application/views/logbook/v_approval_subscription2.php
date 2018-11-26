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
          Approval Subscription
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
        <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/update_approval_subscription')?>">
        <div class="row">
          <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <?php 
                      $no=1;
                      if (isset($data_subscription)) {
                        foreach ($data_subscription as $data) {
                ?>
                <table border="0px">
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Kode Subscription</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->kode_subscription?></label></td>
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
                    <td style="padding: 6px; padding-right: 50px;">Nama Fund</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->nama_fund?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Rekening Fund</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->no_rekening_fund .' (' .$data->nama_bank_rekening_fund .')' ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Sales</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->nama_sales; ?></label></td>
                    <!-- <td style="padding-left: 110px;"><button type="submit" class="btn btn-primary">Update</button></td> -->
                  </tr>
                </table>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_0 hidden">No</th>
                        <th class="c_1">Sales</th>
                        <th class="c_2">Input S21</th>
                        <th class="c_3">Input S-Invest</th>
                        <th class="c_4">Good Fund</th>
                        <th class="c_6">SC Surat Konfirmasi</th>
                        <th class="c_7">Surat Konfirmasi Asli</th>
                      </tr>
                    </thead>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/update_approval_subscription')?>">
                    <tbody>
                      <tr>
                        <input type="hidden" name="kode_subscription" value="<?php echo $data->kode_subscription;?>">
                        <td class="hidden"><?php echo $no++; ?></td>
                        <td id="approval_sales">
                          <select class="form-control" style="width: 100%;" name="approval_sales" id="approval_sales">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_sales == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>    
                        </td>

                        <td id="approval_input_s21">
                          <?php
                            if ($data->approval_sales==1) {
                          ?>
                          <select class="form-control" style="width: 100%;"  name="approval_input_s21" id="approval_input_s21">
                           <?php
                              foreach ($ref_approval as $approve){
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
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
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
                            if ($data->approval_input_s21==1 && $data->approval_sales==1) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                            elseif ($data->approval_input_s21==''||$data->approval_input_s21=='2') {
                          ?>
                            <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest" disabled="disabled">
                              <?php
                                  if (isset($ref_approval)){
                                  foreach ($ref_approval as $data1){
                              ?>
                                <option value="<?php echo $data1->kode_approval?>"><?php echo $data1->nama_approval?></option>
                              <?php
                                  }
                              }
                              ?>
                            </select>
                          <?php    
                            }
                            else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_sinvest" id="approval_input_sinvest" disabled="disabled">
                              <?php
                                  if (isset($ref_approval)){
                                  foreach ($ref_approval as $data1){
                              ?>
                                <option value="<?php echo $data1->kode_approval?>"><?php echo $data1->nama_approval?></option>
                              <?php
                                  }
                              }
                              ?>
                            </select>
                          <?php }
                          ?>
                        </td>

                        <td id="approval_good_fund">
                        <?php
                          if ($data->approval_input_sinvest==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_good_fund" id="approval_good_fund">
                           <?php
                              foreach ($ref_approval_with_reject as $approve){
                                  $selected=($data->approval_good_fund == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          else {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_good_fund" id="approval_good_fund" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_good_fund == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          ?>
                        </td>

                        <?php
                          if ($data->approval_good_fund==3) {
                        ?>
                        <td id="approval_konfirmasi_nasabah">
                          <select class="form-control" style="width: 100%;" name="approval_konfirmasi_nasabah" id="approval_konfirmasi_nasabah">
                           <?php
                              foreach ($ref_approval_with_reject as $approve){
                                  $selected=($data->approval_konfirmasi_nasabah == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        </td>
                        <?php }
                          else {
                        ?>
                        <!-- <td id="approval_konfirmasi_nasabah">
                          <select class="form-control" style="width: 100%;" name="approval_konfirmasi_nasabah" id="approval_konfirmasi_nasabah">
                           <?php
                              foreach ($ref_approval_with_reject as $approve){
                                  $selected=($data->approval_konfirmasi_nasabah == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        </td> -->
                        <?php }
                        ?>

                        <td>
                        <?php
                          if ($data->approval_good_fund==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_softcopy" id="approval_softcopy">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_softcopy == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                          elseif ($data->approval_good_fund==3 && $data->approval_konfirmasi_nasabah==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_softcopy" id="approval_softcopy">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_softcopy == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                        else {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_softcopy" id="approval_softcopy" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_softcopy == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                        ?>
                        </td>

                        <td>
                        <?php
                          if ($data->approval_softcopy==1) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_surat_konfirmasi_asli" id="approval_surat_konfirmasi_asli">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_surat_konfirmasi_asli == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                          else {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_surat_konfirmasi_asli" id="approval_surat_konfirmasi_asli" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_surat_konfirmasi_asli == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                        ?>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td colspan="7"><button type="submit" style="width: 100%" class="btn btn-primary btn-sm">Update</button></td>
                      </tr> -->
                      
                    </tbody>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
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