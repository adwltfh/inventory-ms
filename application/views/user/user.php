<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Settings
      <small>Profile</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Settings</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-gray">
          <div class="box-header with-border">
            <i class="fa fa-user-circle-o"></i>

            <h3 class="box-title"> Profile</h3>

            <a href="<?php echo base_url('/user/edit_user/' )?><?php echo $_SESSION['id_user'] ?>?type=profile" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil-square-o"></i>
              <span>Edit</span>
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <dl class="dl-horizontal">
              <dt>Nama</dt>
              <dd><?php echo $user['nama_lengkap'] ?></dd>
              <dt>Email</dt>
              <dd><?php echo $user['email'] ?></dd>
              <dt>Role</dt>
              <dd><?php echo $user['role'] ?></dd>
            </dl>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- ./col -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.18
  </div>
  <strong>Copyright &copy; 2021.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <div class="tab-content">

  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('template/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('template/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('template/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('template/dist/js/demo.js') ?>"></script>
</body>

</html>
