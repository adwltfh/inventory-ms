<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ID
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
            <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Merk</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($id as $i) :
                        ?>
                            <tr>
                                <th><?= $i['id']; ?></th>
                                <th><?= $i['nama_barang']; ?></th>
                                <th><?= $i['stok']; ?></th>
                                <th><?= $i['merk_barang']; ?></th>
                                <th>
                                    <a href="<?= base_url(); ?>Barangio/tambah_brg/<?= $tipe['tipe']; ?>/<?= $i['id']; ?>" class="btn btn-primary pull-right">Pilih</a>
                                </th>
                            </tr>
                        <?php
                        endforeach;
                        ?>

                    </tbody>
                </table>
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

</body>

</html>