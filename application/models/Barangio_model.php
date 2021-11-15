<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barangio_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getDataBarang($type)
	{
		$min = $_GET['min'] ?? '';
		$max = $_GET['max'] ?? '';
		if ($min != '' && $max != '') {
			$min = date('Y-m-d', (strtotime('-1 day', strtotime($min))));
			$max = date('Y-m-d', (strtotime('-1 day', strtotime($max))));
		}
		$query = "SELECT
					id,
					id_barang,
					stok,
					tanggal
					FROM
					barang_io
				  	WHERE tipe = '$type'";
		if ($min != '' && $max != '') {
			$query = $query . "	AND (barang_io.tanggal BETWEEN '$min' AND '$max')";
		}

		return $this->db->query($query)->result_array();
	}

	public function getAllDataBarang()
	{
		$query = "SELECT * FROM barang_io";
		return $this->db->query($query)->result_array();
	}

	public function getDataBarangNoType()
	{
		$query = "SELECT
					b.id,
					b.nama_barang,
					b.merk_barang,
					b.stok,
					b.tanggal,
					j.jenis_barang,
					s.satuan_barang
					FROM
					barang_io as b
					JOIN jenis AS j ON (b.kode_jenis = j.kode_jenis)
					JOIN satuan AS s ON (b.kode_satuan = s.kode_satuan)";
		return $this->db->query($query)->result_array();
	}

	public function getDataBarangID()
	{
		$query = "SELECT
					b.id,
					b.nama_barang,
					b.merk_barang,
					b.stok,
					b.tanggal,
					j.jenis_barang,
					s.satuan_barang
					FROM
					barang_io as b
					JOIN jenis AS j ON (b.kode_jenis = j.kode_jenis)
					JOIN satuan AS s ON (b.kode_satuan = s.kode_satuan)";
		return $this->db->query($query)->result_array();
	}

	public function print($min, $max, $type)
	{
		$query = "SELECT
					b.id,
					b.nama_barang,
					b.merk_barang,
					b.stok,
					b.tanggal,
					bio.stok AS stok_barang
					FROM
					barang as b
					JOIN jenis AS j ON (b.kode_jenis = j.kode_jenis)
					JOIN satuan AS s ON (b.kode_satuan = s.kode_satuan)
					JOIN barang_io AS bio on (bio.id_barang = b.id)
					";
		if ($min != '' && $max != '') {
			$query = $query . " WHERE bio.tanggal BETWEEN '$min' AND '$max'";
		}

		if ($type == null) {
			$query = "SELECT DISTINCT
			b.id,
			b.nama_barang,
			b.merk_barang,
			b.stok as stok_barang,
			(SELECT tanggal FROM barang_io WHERE id_barang = b.id AND tipe = 'masuk' ORDER BY barang_io.tanggal LIMIT 1) AS tanggal_masuk,
			(SELECT tanggal FROM barang_io WHERE id_barang = b.id AND tipe = 'keluar' ORDER BY barang_io.tanggal LIMIT 1) AS tanggal_keluar
			FROM barang AS b
			JOIN barang_io AS bio
			ON b.id = bio.id_barang 
			JOIN jenis AS j
			ON b.kode_jenis = j.kode_jenis
			JOIN satuan AS s
			ON b.kode_satuan = s.kode_satuan
			";
			if ($min != '' && $max != '') {
				$query = $query . " WHERE DATE(bio.tanggal) BETWEEN '$min' AND '$max'";
			}
		}
		if ($type != null) {
			$query = $query . " AND tipe = '$type'";
		}
		return $this->db->query($query)->result_array();
	}

	public function prints($min, $max, $type)
	{
		$query = "SELECT barang.id, barang.nama_barang, barang_io.stok as stok_barang, satuan.satuan_barang, barang.merk_barang, barang_io.tanggal
					FROM barang_io
					JOIN barang
					JOIN satuan
					WHERE barang.id = barang_io.id_barang
					AND barang.kode_satuan = satuan.kode_satuan
					AND barang_io.tipe = '$type'
					AND barang_io.tanggal
					BETWEEN '$min' AND '$max'
		";
		return $this->db->query($query)->result_array();
	}

	public function tambahData()
	{
		$data = [
			"id_barang" => $this->input->post('id_barang', true),
			"stok" => $this->input->post('stok', true),
			"tipe" => $this->input->post('tipe', true)
		];
		$this->stockHandler();
		return $this->db->insert('barang_io', $data);
	}

	public function editdata($id)
	{
		$data = [
			"id_barang" => $this->input->post('id_barang', true),
			"stok" => $this->input->post('stok', true),
			"tipe" => $this->input->post('tipe', true)
		];
		$this->stockHandler();
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('barang_io', $data);
	}

	public function stockHandler()
	{
		if ($this->input->post('tipe', true) == 'masuk') {
			$this->addStock($this->input->post('id_barang', true));
		} else {
			$this->reduceStock($this->input->post('id_barang', true));
		}
	}

	public function addStock($id)
	{
		$currentStock = $this->getSingledataBarang($id);
		$updatedStock = (int) $currentStock + (int) $this->input->post('stok', true);
		$data = [
			"stok" => $updatedStock,
		];
		$this->db->where('id', $id);
		$this->db->update('barang', $data);
	}

	public function reduceStock($id)
	{
		$currentStock = $this->getSingledataBarang($id);
		$updatedStock = (int) $currentStock - (int) $this->input->post('stok', true);
		$data = [
			"stok" => $updatedStock,
		];
		$this->db->where('id', $id);
		$this->db->update('barang', $data);
	}

	public function getSingleData($id)
	{
		return $this->db->get_where('barang_io', ['id' => $id])->row_array();
	}

	public function getSingledataBarang($id)
	{
		$data = $this->db->get_where('barang', ['id' => $id])->row_array();
		return $data['stok'];
	}

	public function hapusData($id)
	{
		$this->db->delete('barang_io', ['id' => $id]);
	}

	public function totalbarangmasuk()
	{
		$totalbarangmasuk = 0;
		$barangio = $this->getAllDataBarang();
		foreach ($barangio as $c) :
			$today = date('Y-m-d', strtotime($c['tanggal']));
			if ($today == date('Y-m-d')) {
				if ($c['tipe'] == "masuk") {
					$totalbarangmasuk += $c['stok'];
				}
			}
		endforeach;
		return $totalbarangmasuk;
	}

	public function totalbarangkeluar()
	{
		$totalbarangkeluar = 0;
		$barangio = $this->getAllDataBarang();
		foreach ($barangio as $c) :
			$today = date('Y-m-d', strtotime($c['tanggal']));
			if ($today == date('Y-m-d')) {
				if ($c['tipe'] == "keluar") {
					$totalbarangkeluar += $c['stok'];
				}
			}
		endforeach;
		return $totalbarangkeluar;
	}

	public function getDataBarangByIds($id)
	{
		$query = "SELECT * FROM barang	WHERE id = $id";
		return $this->db->query($query)->row_array();
	}

	public function tambah_data_barang()
	{
		$data = [
			"id_barang" => $this->input->post('id_barang', true),
			"stok" => $this->input->post('stok', true),
			"tipe" => $this->input->post('tipe', true),
			"tanggal" => $this->input->post('tanggal', true),
			"harga" => $this->input->post('harga', true),
			"no_po" => $this->input->post('no_po', true)
		];
		$this->stockHandler();
		return $this->db->insert('barang_io', $data);
	}

	public function field()
	{
		$query = "SELECT barang_io.id, barang.nama_barang, barang_io.stok, satuan.satuan_barang, barang.merk_barang
					FROM barang
					INNER JOIN barang_io
					INNER JOIN satuan
					WHERE barang.kode_satuan = satuan.kode_satuan
					AND barang_io.id_barang = barang.id";
		return $this->db->query($query)->result_array();
	}

	public function fieldbyid($id)
	{
		$query = "SELECT barang.nama_barang, barang_io.stok, satuan.satuan_barang, barang.merk_barang
					FROM barang
					INNER JOIN barang_io
					INNER JOIN satuan
					WHERE barang.kode_satuan = satuan.kode_satuan
					AND barang_io.id_barang = barang.id
					AND barang_io.id = $id";
		return $this->db->query($query)->result_array();
	}

	public function pegawai()
	{
		$query = "SELECT id_user, nama_lengkap, jabatan
					FROM user";
		return $this->db->query($query)->result_array();
	}

	public function pegawaibyid($idp)
	{
		$query = "SELECT id_user, nama_lengkap, jabatan
					FROM user
					WHERE id_user = $idp";
		return $this->db->query($query)->row_array();
	}
}
