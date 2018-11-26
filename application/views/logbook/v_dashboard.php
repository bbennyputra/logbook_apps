<style>
  .no {
    width: 5%;
  }
  .id {
    width: 20%;
  }
  .nama {
    width: 35%;
  }
  .level {
    width: 15%;
  }
  .status {
    width: 15%;
  }
  .aksi {
    width: 10%;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $header_box_title ?>
          <!-- <small>Control panel</small> -->
        </h1>
        <ol class="breadcrumb">
<!--           <li><a href="#">Home</a></li>
          <li><a href="#">Marketing</a></li>
          <li class="active">User</li> -->
          <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_visit"><span class="fa fa-user-plus"></span> Tambah Visit</button>&nbsp; -->
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
      <!-- SELECT2 EXAMPLE -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_new_visit"><?php echo $total_pembukaan_rekening_individu ?></h3>
                <p>Pembukaan Rekening Individu</p>
              </div>
              <div class="icon">
                <i>IND</i>
              </div>
              <a href="<?php echo site_url('logbook/pembukaan_rekening_individu')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_new_form_edit"><?php echo $new_form_edit_count ?></h3>
                <p>New Form Edit</p>
              </div>
              <div class="icon">
                <i class="fa fa-edit"></i>
              </div>
              <a href="<?php echo site_url('salesactivity/new_form_edit')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div> -->

          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_all_visit"><?php echo $total_pembukaan_rekening_institusi ?></h3>
                <p>Pembukaan Rekening Institusi</p>
              </div>
              <div class="icon">
                <i>INS</i>
              </div>
              <a href="<?php echo site_url('logbook/pembukaan_rekening_institusi')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_all_visit"><?php echo $total_subscription ?></h3>
                <p>Subscription</p>
              </div>
              <div class="icon">
                <i>SUBS</i>
              </div>
              <a href="<?php echo site_url('logbook/subscription')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_all_visit"><?php echo $total_redemption ?></h3>
                <p>Redemption</p>
              </div>
              <div class="icon">
                <i>REDM</i>
              </div>
              <a href="<?php echo site_url('logbook/redemption')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_all_visit"><?php echo $total_switching ?></h3>
                <p>Switching</p>
              </div>
              <div class="icon">
                <i>SWTC</i>
              </div>
              <a href="<?php echo site_url('logbook/switching')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3 id="realtime_all_form_edit"><?php echo $total_form_edit_count ?></h3>
                <p>Total Form Edit</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url('salesactivity/sales_form_edit')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
        </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
