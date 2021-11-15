<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Laporan Stok Barang
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="active">Laporan</a></li>
			<li><a href="active">Stok Barang</a></li>
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
							<h3 class="box-title">Stok Barang</h3>
							<a href="<?php echo base_url('/barangio/prints') ?><?php echo (isset($_GET['min']) && isset($_GET['max']) ? "?min=" . $_GET['min'] .  "&max=" . $_GET['max'] : '') ?>" class="print-btn btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i>
								<span>Cetak</span>
							</a>
							<a href="<?php echo base_url('/Stok_barang') ?>" class="print-btn btn btn-primary btn-sm pull-right"><i class="fa fa-print"></i>
								<span>Bersihkan Filter</span>
							</a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table cellspacing="5" cellpadding="5" border="0">
								<tbody>
									<tr>
										<td>Minimum date:</td>
										<td><input type="text" id="min" name="min"></td>
									</tr>
									<tr>
										<td>Maximum date:</td>
										<td><input type="text" id="max" name="max"></td>
									</tr>
								</tbody>
							</table>
							<table id="dataTableBarang" class="table table-bordered table-striped" style="width:100%">
								<thead>
									<tr>
										<th>No.</th>
										<th>ID Barang</th>
										<th>Nama Barang</th>
										<th>Merk Barang</th>
										<th>Stok</th>
										<th>Keterangan</th>
										<th>Tanggal Masuk</th>
										<th>Tanggal Keluar</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($data)) {
										$i = 1;
										foreach ($data as $key => $row) : ?>
											<tr>
												<td><?= $key + 1; ?></td>
												<td><?= $row['id'] ?></td>
												<td><?= $row['nama_barang']; ?></td>
												<td><?= $row['merk_barang']; ?></td>
												<td><?= $row['stok_barang']; ?></td>
												<td><?php echo (isset($row['stok_masuk']) && isset($row['stok_keluar']) ? (($row['stok_masuk'] - $row['stok_keluar']) < 50 ? "Stok Rendah" : "") : ($row['stok_barang'] < 50 ? "Stok Rendah" : "")) ?></td>
												<td><?= $row['tanggal_masuk'] ?? "" ?></td>
												<td><?= $row['tanggal_keluar'] ?? "" ?></td>
												<!-- <td align="center">
													<a href="<?= base_url(); ?>barangio/edit_data/<?= $row['id'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square"></i></a>
													<a href="<?= base_url(); ?>barangio/hapus_data/<?= $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
												</td> -->
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
<script>
	$(function() {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': false
		})
	})
</script>
<script>
	var minDate, maxDate;

	// Custom filtering function which will search data in column four between two values
	// $.fn.dataTable.ext.search.push(
	// 	function(settings, data, dataIndex) {
	// 		var min = minDate.val();
	// 		var max = maxDate.val();
	// 		var date = new Date(data[6]);
	// 		if (
	// 			(min === null && max === null) ||
	// 			(min === null && date <= max) ||
	// 			(min <= date && max === null) ||
	// 			(min <= date && date <= max)
	// 		) {
	// 			return true;
	// 		}
	// 		return false;
	// 	}
	// );

	$(document).ready(function() {
		const queryString = window.location.search;
		const parameters = new URLSearchParams(queryString);
		let minParams = parameters.get('min');
		let maxParams = parameters.get('max');
		if (minParams != null && maxParams != null) {
			minParams = moment(minParams, ).subtract(1, 'days').format('YYYY-MM-DD');
			maxParams = moment(maxParams, ).subtract(1, 'days').format('YYYY-MM-DD');
			$('#min').val(minParams);
			$('#max').val(maxParams);
		}
		// Create date inputs
		minDate = new DateTime($('#min'), {
			format: 'YYYY-MM-DD'
		});
		maxDate = new DateTime($('#max'), {
			format: 'YYYY-MM-DD'
		});

		// DataTables initialisation
		var table = $('#dataTableBarang').DataTable();
		// Refilter the table
		let min = null;
		let max = null;
		$('#min').on('change', function() {
			min = $(this).val();
		});
		$('#max').on('change', function() {
			max = $(this).val();
		});
		$('#min, #max').on('change', function() {
			// table.draw();
			let type = '<?php echo (isset($_GET['type']) ? "type=" . $_GET['type'] . "&" : '') ?>';
			if (max) {
				min = moment(min, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
				max = moment(max, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
				let printUrl = "<?php echo base_url('/Stok_barang') ?>?" + `min=${min}&max=${max}`
				window.location.replace(printUrl);
			}
		});
	});
</script>
</body>

</html>