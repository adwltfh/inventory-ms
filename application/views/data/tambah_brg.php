<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Barang
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->

        <!-- Input addon -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Barang</h3>
          </div>
          <form role="form" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <div class="box-body">
                <div class="form-group">
                  <label>ID Barang</label>
                  <div class="input-group input-group-sm">
                    <input type="text" class="form-control" name="id_barang" id="id_barang" value="<?= $barangio['id']; ?>" readonly>
                    <span class="input-group-btn">
                      <a href="<?= base_url('Barangio/id/') . $tipe['tipe']; ?>" class="btn btn-info btn-flat">Cari</a>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $barangio['nama_barang']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Stok</label>
                  <input type="text" class="form-control" value="<?= $barangio['stok']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Merk</label>
                  <input type="text" class="form-control" name="merk_barang" id="merk_barang" value="<?= $barangio['merk_barang']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga">
                </div>

                <div class="form-group">
                  <label>No PO</label>
                  <input type="text" class="form-control" placeholder="No PO" name="no_po" id="no_po">
                </div>

                <div class="form-group">
                  <label>Tanggal</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" name="tanggal" id="tanggal">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Jumlah Barang <?= ucfirst($tipe['tipe']); ?></label>
                  <input type="number" class="form-control" placeholder="Jumlah Barang" name="stok" id="stok">
                </div>

                <div class="form-group">
                  <label>Tipe</label>
                  <input class="form-control" name="tipe" id="tipe" value="<?= $tipe['tipe']; ?>" readonly>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-default">Reset</button>
                <button type="submit" id="tambah_brg" name="btn-simpan" class="btn btn-success pull-right">Simpan</button>
              </div>
              <!-- /input-group -->
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
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
<!-- Select2 -->
<script src="<?= base_url('template/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- InputMask -->
<script src="<?= base_url('template/plugins/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?= base_url('template/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?= base_url('template/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url('template/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('template/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('template/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('template/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('template/plugins/iCheck/icheck.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('template/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('template/dist/js/demo.js') ?>"></script>
<!-- Page script -->
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    })
  })
</script>
</body>

</html>