<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stok_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getAllData()
	{
		$min = $_GET['min'] ?? '';
		$max = $_GET['max'] ?? '';
if ($min != '' && $max != ''){
			$min = date('Y-m-d',(strtotime ( '-1 day' , strtotime ($min) ) ));
			$max = date('Y-m-d',(strtotime ( '-1 day' , strtotime ($max) ) ));
		}
		$query = "SELECT DISTINCT
		b.id,
		b.nama_barang,
		b.merk_barang,
		b.stok as stok_barang,
		(SELECT tanggal FROM barang_io WHERE id_barang = b.id AND tipe = 'masuk' AND barang_io.tanggal ORDER BY barang_io.tanggal LIMIT 1) AS tanggal_masuk,
		(SELECT tanggal FROM barang_io WHERE id_barang = b.id AND tipe = 'keluar' AND barang_io.tanggal ORDER BY barang_io.tanggal LIMIT 1) AS tanggal_keluar
		FROM barang AS b
		JOIN barang_io AS bio
		ON b.id = bio.id_barang 
		JOIN jenis AS j
		ON b.kode_jenis = j.kode_jenis
		JOIN satuan AS s
		ON b.kode_satuan = s.kode_satuan
		";
		if ($min != '' && $max != ''){
			$query = $query . " WHERE bio.tanggal BETWEEN '$min' AND '$max'";
		}
		return $this->db->query($query)->result_array();
	}
}
