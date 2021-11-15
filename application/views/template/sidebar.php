<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="<?= base_url('index.php') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('Barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
          <li><a href="<?= base_url('Jenis') ?>"><i class="fa fa-circle-o"></i> Data Jenis</a></li>
          <li><a href="<?= base_url('Satuan') ?>"><i class="fa fa-circle-o"></i> Data Satuan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('Stok_barang') ?>"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
          <li><a href="<?= base_url('barangio') . "?type=masuk&id_user=0" ?>"><i class="fa fa-circle-o"></i> Data Barang Masuk</a></li>
          <li><a href="<?= base_url('barangio') . "?type=keluar&id_user=0" ?>"><i class="fa fa-circle-o"></i> Data Barang Keluar</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('user') ?>">
          <i class="fa fa-user-circle"></i> <span>Profil</span>
        </a>
      </li>
      <li>
        <?php if ($_SESSION['role'] == 'Admin') : ?>
          <a href="<?= base_url('user/list') ?>">
            <i class="fa fa-user-circle"></i> <span>List User</span>
          </a>
      </li>
    <?php endif; ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>