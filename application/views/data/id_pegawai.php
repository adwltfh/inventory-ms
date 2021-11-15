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
    <h2 class="text-center">Field <?php echo ($title != null ? " " . $title : "") ?></h2>
    <div class="container">
        <div class="content">
            <form role="form" method="POST" action="<?= base_url('/barangio/listprint') ?>?type=<?php echo $_GET['type']; ?>&id_user=<?= (isset($_GET['id_user'])); ?>&min=<?= ($_GET['min']); ?>&max=<?= ($_GET['max']); ?>" enctype="multipart/form-data">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user)) {
                            $i = 1;
                            foreach ($user as $row) : ?>
                                <tr>
                                    <td><a href="<?= base_url('/barangio') ?>?type=<?php echo $_GET['type']; ?>&id_user=<?= $row['id_user']; ?>" class="btn btn-primary">pilih</a></td>
                                    <td><input type="text" id="id_user" name="id_user" value="<?= $row['id_user']; ?>" disabled></td>
                                    <td><input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $row['nama_lengkap']; ?>" disabled></td>
                                    <td><input type="text" id="jabatan" name="jabatan" value="<?= $row['jabatan']; ?>" disabled></td>
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