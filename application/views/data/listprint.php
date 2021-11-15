<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
</head>

<body>
    <h2 class="text-center">Barang<?php echo ($title != null ? " " . $title : "") ?></h2>
    <div class="container">
        <div class="content">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang <?= ucfirst(($title)); ?></th>
                        <th>Satuan</th>
                        <th>Merk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // for ($x = 0; $x < count($_SESSION["id"]); $x++) {
                    //     $ids = $_SESSION["id"][$x];
                    foreach ($idss as $x => $value) :
                        foreach ($barang as $row) :
                            if ($row['id'] == $idss[$x]) {
                    ?>
                                <tr>
                                    <td><?= $row['nama_barang']; ?></td>
                                    <td><?= $row['stok']; ?></td>
                                    <td><?= $row['satuan_barang']; ?></td>
                                    <td><?= $row['merk_barang']; ?></td>
                                </tr>
                    <?php
                            }

                        endforeach;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <div style="text-align: right;">
            <a href="<?= base_url('/barangio/field') ?>?type=<?php echo $_GET['type']; ?>&id_user=<?= $_GET['id_user']; ?>">
                Tambah field
            </a>
            <a href="<?php unset($_SESSION['id']); ?>?type=<?php echo $_GET['type']; ?>">
                reset
            </a>
        </div>
        <div class="content2">
            <div>
                <h3><b>Mengetahui:</b></h3>
            </div>
            <div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No. Pegawai</th>
                        <th>:</th>
                        <th>
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" value="<?= $_GET['id_user']; ?>" disabled>
                                    <span class="input-group-btn">
                                        <a href="<?= base_url('/barangio/pegawai') ?>?type=<?php echo $_GET['type']; ?>" class="btn btn-info btn-flat">
                                            Cari
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>:</th>
                        <th>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $user['nama_lengkap']; ?>" disabled>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <th>:</th>
                        <th>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $user['jabatan']; ?>" disabled>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>