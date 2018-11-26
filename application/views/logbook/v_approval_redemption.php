<?php $stat=$this->session->userdata('level_id'); ?>
<style>
  .c_0 {
    width: 5%;
  }
  .c_1 {
    width: 14%;
  }
  .c_2 {
    width: 10%;
  }
  .c_3 {
    width: 10%;
  }
  .c_4 {
    width: 14%;
  }
  .c_5 {
    width: 10%;
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
          Approval Redemption
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
                      if (isset($data_approval_redemption)) {
                        foreach ($data_approval_redemption as $data) {
                ?>
                <table border="0px">
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Kode Form</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->kode_redemption?></label></td>
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
                    <td style="padding: 6px; padding-right: 50px;">Nominal Redemption</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php 
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
                    ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">UP Redemption</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php 
                      if ($data->up_redemption!='') {
                            echo $data->up_redemption .' Unit';  
                          }
                          else {
                            echo "-";
                          }
                    ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Rekening Penerima</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->no_rekening_penerima .' (' .$data->nama_bank_rekening_penerima .')' ?></label></td>
                  </tr>
                  <tr>
                    <td style="padding: 6px; padding-right: 50px;">Sales</td>
                    <td style="padding: 3px;"> : </td>
                    <td style="padding: 3px; width: 900px;"><label class="control_label"><?php echo $data->nama_sales; ?></label></td>
                  </tr>
                </table>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="c_0 hidden">No</th>
                        <th class="c_1">Sales / Kadiv. Marketing</th>
                        <th class="c_2">Input S-Invest</th>
                        <th class="c_3">Input S21</th>
                        <th class="c_4">Verifikasi Spv. Settlement</th>
                        <th class="c_5">Head Operation</th>
                        <th class="c_6">Monitoring Pembayaran</th>
                        <th class="c_7">SC Konfirmasi</th>
                        <th class="c_8">Konfirmasi Asli</th>
                      </tr>
                    </thead>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/update_approval_redemption')?>">
                    <tbody>
                      <tr>
                        <input type="hidden" name="kode_redemption" value="<?php echo $data->kode_redemption;?>">
                        <td class="hidden"><?php echo $no++; ?></td>
                        
                        <td id="approval_sales">
                        <?php
                           if ($stat==2 && $data->approval_sales==2) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_sales" id="approval_sales">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_sales == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>    
                        <?php }
                          elseif ($stat==7 && $data->approval_sales==2) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_sales" id="approval_sales">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_sales == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php } 
                        else {
                        ?>
                          <select class="form-control" style="width: 100%;" id="approval_sales" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_sales == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_sales" value="<?php echo $data->approval_sales?>">  
                        <?php } 
                        ?>
                        </td>

                        <td id="approval_input_sinvest">
                          <?php
                            if ($stat==3 && $data->approval_sales==1 && $data->approval_input_sinvest==5) {
                          ?>
                          <select class="form-control" style="width: 100%;"  name="approval_input_sinvest" id="approval_input_sinvest">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php
                          }
                            elseif ($stat==4 && $data->approval_sales==1 && $data->approval_input_sinvest==5) {
                          ?>
                          <select class="form-control" style="width: 100%;"  name="approval_input_sinvest" id="approval_input_sinvest">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php
                          }
                            elseif ($stat==5 && $data->approval_sales==1 && $data->approval_input_sinvest==5) {
                          ?>
                          <select class="form-control" style="width: 100%;"  name="approval_input_sinvest" id="approval_input_sinvest">
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
                          <select class="form-control" style="width: 100%;" id="approval_input_sinvest" disabled="disabled">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_sinvest == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_input_sinvest" value="<?php echo $data->approval_input_sinvest?>">  
                          <?php    
                            }
                          ?>
                        </td>

                        <td id="approval_input_s21">
                          <?php
                            if ($stat==3 && $data->approval_input_sinvest==4 && $data->approval_input_s21==5) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_s21" id="approval_input_s21">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                            elseif ($stat==4 && $data->approval_input_sinvest==4 && $data->approval_input_s21==5) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_s21" id="approval_input_s21">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                            elseif ($stat==5 && $data->approval_input_sinvest==4 && $data->approval_input_s21==5) {
                          ?>
                          <select class="form-control" style="width: 100%;" name="approval_input_s21" id="approval_input_s21">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                            else {
                          ?>
                          <select class="form-control" style="width: 100%;" id="approval_input_s21" disabled="disabled">
                              <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_input_s21 == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                            </select>
                            <input type="hidden" name="approval_input_s21" value="<?php echo $data->approval_input_s21?>">  
                          <?php }
                          ?>
                        </td>

                        <td id="approval_spv_settlement">
                        <?php
                          if ($stat==4 && $data->approval_input_s21==4 && $data->approval_spv_settlement==5) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_spv_settlement" id="approval_spv_settlement">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_spv_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          elseif ($stat==5 && $data->approval_input_s21==4 && $data->approval_spv_settlement==5) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_spv_settlement" id="approval_spv_settlement">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_spv_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <?php }
                          else {
                          ?>
                          <select class="form-control" style="width: 100%;" id="approval_spv_settlement" disabled="disabled">
                           <?php
                              foreach ($ref_approval_yesno as $approve){
                                  $selected=($data->approval_spv_settlement == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_spv_settlement" value="<?php echo $data->approval_spv_settlement?>">  
                          <?php }
                          ?>
                        </td>

                        <td>
                        <?php
                          if ($stat==5 && $data->approval_spv_settlement==4 && $data->approval_head_operation==2) {
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
                          else {
                        ?>
                          <select class="form-control" style="width: 100%;" id="approval_head_operation" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_head_operation == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_head_operation" value="<?php echo $data->approval_head_operation?>">  
                        <?php }
                        ?>
                        </td>

                        <td>
                        <?php
                          if ($stat==5 && $data->approval_head_operation==1 && $data->approval_monitoring_pembayaran==2) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_monitoring_pembayaran" id="approval_monitoring_pembayaran">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_monitoring_pembayaran == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                          elseif ($stat==3 && $data->approval_head_operation==1 && $data->approval_monitoring_pembayaran==2) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_monitoring_pembayaran" id="approval_monitoring_pembayaran">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_monitoring_pembayaran == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                          elseif ($stat==4 && $data->approval_head_operation==1 && $data->approval_monitoring_pembayaran==2) {
                        ?>
                          <select class="form-control" style="width: 100%;" name="approval_monitoring_pembayaran" id="approval_monitoring_pembayaran">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_monitoring_pembayaran == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                        <?php }
                          else {
                        ?>
                          <select class="form-control" style="width: 100%;" id="approval_monitoring_pembayaran" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_monitoring_pembayaran == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_monitoring_pembayaran" value="<?php echo $data->approval_monitoring_pembayaran?>">  
                        <?php }
                        ?>
                        </td>

                        <td>
                        <?php
                          if ($stat== 5 && $data->approval_monitoring_pembayaran==1 && $data->approval_softcopy==2) {
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
                          elseif ($stat== 3 && $data->approval_monitoring_pembayaran==1 && $data->approval_softcopy==2) {
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
                          elseif ($stat== 4 && $data->approval_monitoring_pembayaran==1 && $data->approval_softcopy==2) {
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
                          <select class="form-control" style="width: 100%;" id="approval_softcopy" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_softcopy == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_softcopy" value="<?php echo $data->approval_softcopy?>">  
                        <?php }
                        ?>
                        </td>

                        <td>
                        <?php
                          if ($stat== 2 && $data->approval_softcopy==1 && $data->approval_surat_konfirmasi_asli==2) {
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
                          elseif ($stat== 7 && $data->approval_softcopy==1 && $data->approval_surat_konfirmasi_asli==2) {
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
                          elseif ($stat== 8 && $data->approval_softcopy==1 && $data->approval_surat_konfirmasi_asli==2) {
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
                          <select class="form-control" style="width: 100%;" id="approval_surat_konfirmasi_asli" disabled="disabled">
                           <?php
                              foreach ($ref_approval as $approve){
                                  $selected=($data->approval_surat_konfirmasi_asli == $approve->kode_approval)?"selected":"";
                                  echo "<option value='$approve->kode_approval' $selected>$approve->nama_approval</option>";
                              }
                            ?>
                          </select>
                          <input type="hidden" name="approval_surat_konfirmasi_asli" value="<?php echo $data->approval_surat_konfirmasi_asli?>">  
                        <?php }
                        ?>
                        </td>
                      </tr>
                      <!-- <tr>
                        <td colspan="7"><button type="submit" style="width: 100%" class="btn btn-primary btn-sm">Update</button></td>
                      </tr> -->
                      
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