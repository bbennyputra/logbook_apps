<?php include 'modal/modal_user.php' ?>
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
          User
          <!-- <small>Control panel</small> -->
        </h1>
        <ol class="breadcrumb">
<!--           <li><a href="#">Home</a></li>
          <li><a href="#">Marketing</a></li>
          <li class="active">User</li> -->
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_user"><span class="fa fa-user-plus"></span> Tambah User</button>&nbsp;
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
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
                        <th class="no">No</th>
                        <th class="username">Username</th>
                        <th class="nama">Nama</th>
                        <th class="level">Level</th>
                        <th class="status">Status</th>
                        <th class="aksi"><center></center></th>
                      </tr>
                    </thead>
                  <!--   <tfoot>
                      <tr>
                        <th class="no">No</th>
                        <th class="username">Username</th>
                        <th class="nama">Nama</th>
                        <th class="level">Level</th>
                        <th class="status">Status</th>
                        <th class="aksi"><center></center></th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      <?php
                        $no=1;
                        if (isset($data_user)) {
                          foreach ($data_user as $data) {
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->username;?></td>
                        <td><?php echo $data->nama;?></td>
                        <td><?php echo $data->level_name;?></td>
                        <td><?php 
                          if ($data->status==1) {
                            echo 'Aktif';
                          }
                          else {
                            echo "Tidak Aktif";
                          }
                        ?></td>
                        <td>
                          <center>
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default btn-sm" href="#edit_user<?php echo $data->id ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-pencil"></span>
                              </button>
                              <button type="button" class="btn btn-default btn-sm" href="#hapus_user<?php echo $data->id ?>" data-toggle="modal">
                                <span class="glyphicon glyphicon-remove"></span>
                              </button>
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
              </div>
            </div><!-- /.col -->
        </div><!-- /.row (main row) -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->