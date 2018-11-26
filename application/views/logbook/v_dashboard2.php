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
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <h3 class="">Pembukaan Rekening Individu</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Selesai <span class="pull-right badge bg-green"><?php echo $selesai_pembukaan_rekening_individu?></span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-yellow"><?php echo $pending_pembukaan_rekening_individu?></span></a></li>
                <li><a href="#">Reject <span class="pull-right badge bg-red"><?php echo $reject_pembukaan_rekening_individu?></span></a></li>
                <li><a href="<?php echo site_url('logbook/pembukaan_rekening_individu')?>">Total <span class="pull-right badge bg-aqua"><?php echo $total_pembukaan_rekening_individu ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <h3 class="">Pembukaan Rekening Institusi</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Selesai <span class="pull-right badge bg-green"><?php echo $selesai_pembukaan_rekening_institusi?></span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-yellow"><?php echo $pending_pembukaan_rekening_institusi?></span></a></li>
                <li><a href="#">Reject <span class="pull-right badge bg-red"><?php echo $reject_pembukaan_rekening_institusi?></span></a></li>
                <li><a href="<?php echo site_url('logbook/pembukaan_rekening_institusi')?>">Total <span class="pull-right badge bg-aqua"><?php echo $total_pembukaan_rekening_institusi ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <h3 class="">Subscription</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Selesai <span class="pull-right badge bg-green"><?php echo $selesai_subscription?></span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-yellow"><?php echo $pending_subscription?></span></a></li>
                <li><a href="#">Cancel <span class="pull-right badge bg-red"><?php echo $cancel_subscription?></span></a></li>
                <li><a href="<?php echo site_url('logbook/subscription')?>">Total <span class="pull-right badge bg-aqua"><?php echo $total_subscription ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <h3 class="">Redemption</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Selesai <span class="pull-right badge bg-green"><?php echo $selesai_redemption?></span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-yellow"><?php echo $pending_redemption?></span></a></li>
                <!-- <li><a href="#">Cancel <span class="pull-right badge bg-red"><?php echo $cancel_subscription?></span></a></li> -->
                <li><a href="<?php echo site_url('logbook/redemption')?>">Total <span class="pull-right badge bg-aqua"><?php echo $total_redemption ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <h3 class="">Switching</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Selesai <span class="pull-right badge bg-green"><?php echo $selesai_switching?></span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-yellow"><?php echo $pending_switching?></span></a></li>
                <!-- <li><a href="#">Cancel <span class="pull-right badge bg-red"><?php echo $cancel_subscription?></span></a></li> -->
                <li><a href="<?php echo site_url('logbook/switching')?>">Total <span class="pull-right badge bg-aqua"><?php echo $total_switching?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
