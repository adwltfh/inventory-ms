<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Jenis
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="active">Data Master</a></li>
      <li><a href="active">Data Jenis Barang</a></li>
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
              <h3 class="box-title">Data Jenis Barang</h3>
              <a href="<?= base_url('Jenis/tambah_data') ?>" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"><b>Tambah Data</b>
                </i></a>
              </i></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Jenis</th>
                    <th>Jenis Barang</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($jenis)) :
                    $i = 1;
                    foreach ($jenis as $row) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['kode_jenis']; ?></td>
                        <td><?= $row['jenis_barang']; ?></td>
                        <td align="center">
                          <a href="<?= base_url(); ?>Jenis/edit_jenis/<?= $row['kode_jenis'] ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square"></i></a>
                          <a href="<?= base_url(); ?>Jenis/hapus_data/<?= $row['kode_jenis'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                  <?php endforeach;
                  endif; ?>
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
</body>

</html>