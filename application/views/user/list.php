<?php if ($_SESSION['role'] != "Admin") return redirect(base_url('/user')) ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data User
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<!-- <li><a href="active">Data Master</a></li>
			<li><a href="active">Data Barang</a></li> -->
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">

					<!-- /.box-header -->
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Data User</h3>
							<a href="/imc/user/tambah_user" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus">
									<span><b>Tambah User</b></span>
								</i></a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="dataTableUser" class="table table-bordered table-striped" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>ID User</th>
										<th>Nama Lengkap</th>
										<th>Email</th>
										<th>No HP</th>
										<th>Role</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($user)) {
										$i = 1;
										foreach ($user as $row) : ?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $row['id_user']; ?></td>
												<td><?= $row['nama_lengkap']; ?></td>
												<td><?= $row['email']; ?></td>
												<td><?= $row['no_hp']; ?></td>
												<td><?= $row['role'] ?? "" ?></td>
												<td align="center">
													<a href="<?= base_url(); ?>user/edit_user/<?= $row['id_user'] ?>?id=<?= $row['id_user'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square"></i></a>
													<?php if ($row['role'] != "Admin") :  ?>
														<a href="<?= base_url(); ?>user/hapus_user/<?= $row['id_user'] ?>?id=<?= $row['id_user'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
													<?php endif; ?>
												</td>
											</tr>
									<?php endforeach;
									} ?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
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
<!-- DataTables -->
<script src="<?= base_url('template/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('template/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('template/dist/js/demo.js') ?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/date-1.1.1/sb-1.2.2/sp-1.4.0/datatables.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<!-- page script -->
</body>

</html>