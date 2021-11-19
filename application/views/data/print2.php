<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url('template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
	<style>
		.tab {
			border-collapse: collapse;
			cellpadding: "0";
			cellspacing: "0";
			border: "0"
		}

		.tab .first {
			border-bottom: 1px solid #EEE;
			box-shadow: inset 0 1px 0 #CCC;
		}

		.tab .second {
			border-top: 1px solid #CCC;
			box-shadow: inset 0 1px 0 #CCC;
		}

		.tab .third {
			border-top: 1px solid #CCC;
			box-shadow: inset 0 1px 0 #CCC;
		}

		.tab .fourth {
			border-top: 1px solid #CCC;
			box-shadow: inset 0 1px 0 #CCC;
		}

		.tab .fifth {
			border-top: 1px solid #CCC;
			box-shadow: inset 0 1px 0 #CCC;
		}
	</style>
</head>

<body>
	<h2 class="text-center">Barang<?php echo ($title != null ? " " . $title : "") ?></h2>
	<div class="container">
		<div class="content-1">
			<h3>Tanggal : <?= date('d-m-y'); ?></h3>
		</div>
		<div class="content-2">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Merk Barang</th>
						<!-- <?php if (!empty($barang)) {
									$i = 1;
									foreach ($barang as $key => $row) : ?>
							<?php if ($key == 0 && isset($row['stok_masuk'])) : ?>
								<th>Stok Masuk</th>
								<th>Stok Keluar</th>
							<?php endif; ?>
					<?php endforeach;
								} ?> -->
						<th>Stok <?php echo ($title != null ? " " . $title : "") ?></th>
						<?php if ($title == null) : ?>
							<th>Keterangan</th>
						<?php endif; ?>
						<?php if (isset($row['tanggal_masuk']) || isset($row['tanggal_keluar'])) : ?>
							<th>Tanggal Masuk</th>
							<th>Tanggal Keluar</th>
						<?php else : ?>
							<th>Tanggal <?php echo ($title != null ? " " . $title : "") ?></th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($barang)) {
						$i = 1;
						foreach ($barang as $row) : ?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $row['id']; ?></td>
								<td><?= $row['nama_barang']; ?></td>
								<td><?= $row['merk_barang']; ?></td>
								<!-- <?php if (isset($row['stok_masuk'])) : ?>
								<td><?= $row['stok_masuk'] ?></td>
								<td><?= $row['stok_keluar'] ?></td>
							<?php endif; ?> -->
								<td><?= (isset($row['stok_masuk']) && isset($row['stok_keluar']) ? $row['stok_masuk'] - $row['stok_keluar'] : $row['stok_barang']); ?></td>
								<?php if ($title == null) : ?>
									<td><?php echo (isset($row['stok_masuk']) && isset($row['stok_keluar']) ? (($row['stok_masuk'] - $row['stok_keluar']) < 50 ? "Stok Rendah" : "") : ($row['stok_barang'] < 50 ? "Stok Rendah" : "")) ?></td>
								<?php endif; ?>
								<?php if (isset($row['tanggal_masuk']) || isset($row['tanggal_keluar'])) : ?>
									<td><?= $row['tanggal_masuk'] ?? "" ?></td>
									<td><?= $row['tanggal_keluar'] ?? "" ?></td>
								<?php else : ?>
									<td><?= $row['tanggal'] ?? "" ?></td>
								<?php endif; ?>
							</tr>
					<?php endforeach;
					} ?>
				</tbody>
			</table>
		</div>
		<div class="content-3">
			<div>
				<h5><b>Mengetahui,</b></h5>
			</div>
			<div>
				<table class="tab">
					<tr>
						<td class="first"><?= $user['jabatan']; ?> PT Bukit Asam, Tbk. (Persero)</td>
					</tr>
					<tr>
						<td class="second">ㅤ</td>
					</tr>
					<tr>
						<td class="third">ㅤ</td>
					</tr>
					<tr>
						<td class="fourth">
							<?= $user['nama_lengkap']; ?>
						</td>
					</tr>
					<tr>
						<td class="fifth">
							<?= $user['id_user']; ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
<script>
	window.print();
</script>

</html>
