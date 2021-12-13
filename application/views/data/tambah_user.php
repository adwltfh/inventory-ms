<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah User
			<small>Form</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">List User</a></li>
			<li class="active">Tambah User</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Tambah User</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="POST" action="/user/tambah_user" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="nama_barang">Nama Lengkap</label>
								<input type="text" name="nama_lengkap" class="form-control" id="nama_barang" placeholder="Masukkan Nama Lengkap">
							</div>
							<div class="form-group">
								<label for="merk_barang">Email</label>
								<input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email">
							</div>
							<div class="form-group">
								<label for="merk_barang">No HP</label>
								<input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan Hp">
							</div>
							<div class="form-group">
								<label for="merk_barang">Password</label>
								<input type="password" name="password" class="form-control" id="merk_barang" placeholder="Masukkan Password">
							</div>
							<div class="form-group">
								<label for="merk_barang">Role</label>
								<input type="text" name="role" class="form-control" id="merk_barang" placeholder="Masukkan Password">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" id="tambah_data" name="btn-simpan" class="btn btn-primary pull-right">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
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
