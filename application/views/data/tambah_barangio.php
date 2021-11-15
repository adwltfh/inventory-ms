<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Data Barang
			<small>Form</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Data Barang</a></li>
			<li class="active">Tambah Data Barang</li>
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
						<h3 class="box-title">Tambah Data Barang</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="POST" action="<?php echo base_url('/Barangio/tambah_data') ?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="satuan_barang">Barang</label>
								<select class="form-control select2" name="id_barang" style="width: 100%;">
									<?php foreach ($barang as $key => $value) { ?>
										<option value="<?php echo $value['id'] ?>"><?php echo $value['nama_barang'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="nama_barang">Stok</label>
								<input type="text" name="stok" class="form-control" id="stok" placeholder="Masukkan Nama Barang">
							</div>
							<div class="form-group">
								<label for="satuan_barang">Tipe</label>
								<select class="form-control select2" name="tipe" style="width: 100%;">
									<option value="masuk">Masuk</option>
									<option value="keluar">Keluar</option>
								</select>
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
