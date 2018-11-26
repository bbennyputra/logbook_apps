<!DOCTYPE html>
<?php $this->load->view('layout/script'); ?>
<?php $this->load->view('layout/style'); ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<header class="main-header">
  <title><?php echo $title ?></title>
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini" style="font-size:9pt;"><b>Log</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Logbook</b> Apps</span>
  </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 16pt;">
              <!-- <strong><i><?php echo $page ?></i></strong> -->
              <strong><i><?php echo $this->session->userdata('nama')?> </i></strong>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/img/flat-user_43.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('nama') .'<br>' .ucfirst($this->session->userdata('level_nama'));?>
                  <!-- <small>Member since Nov. 2015</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <?php
                  if (isset($data_user1)) {
                    foreach ($data_user1 as $data) {
                ?>
                  <button type="button" class="btn btn-default btn-md" href="#ganti_password<?php echo $data->id ?>" data-toggle="modal">
                    Ganti Password
                  </button>
                <?php }}?>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('logbook/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

<?php
  if (isset($data_user1)){
    foreach ($data_user1 as $data) {
?>
<div class="modal fade" id="ganti_password<?php echo $data->id?>" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Ganti Password</b></h4>
      </div>
      <form class="form-horizontal" action="<?php echo site_url('logbook/update_password')?>" method="post">
        <input type="hidden" name="id" value="<?php echo $data->id;?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-4 control-label">Password Baru</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password_baru" id="password_baru">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Ulang Password Baru</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password_ulang" id="password_ulang">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
    }
  }
?>