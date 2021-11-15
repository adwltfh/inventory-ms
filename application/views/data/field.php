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
    <h2 class="text-center">Field Barang<?php echo ($title != null ? " " . $title : "") ?></h2>
    <div class="container">
        <div class="content">
            <form role="form" method="POST" action="<?= base_url('/barangio/listprint') ?>?type=<?php echo $_GET['type']; ?>&id_user=<?= $_GET['id_user']; ?>" enctype="multipart/form-data">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang <?= ucfirst(($title)); ?></th>
                            <th>Satuan</th>
                            <th>Merk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($barang)) {
                            $i = 1;
                            foreach ($barang as $row) : ?>
                                <tr>
                                    <td><input type="checkbox" id="id" name="id[]" value="<?= $row['id']; ?>"></td>
                                    <td><?= $row['nama_barang']; ?></td>
                                    <td><?= $row['stok']; ?></td>
                                    <td><?= $row['satuan_barang']; ?></td>
                                    <td><?= $row['merk_barang']; ?></td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>
                <button type="submit">submit</button>
            </form>
        </div>

    </div>
</body>

</html>