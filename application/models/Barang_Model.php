<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getDataBarang()
	{
		$query = "SELECT b.*, j.jenis_barang, s.satuan_barang
				  FROM barang AS b
				  JOIN jenis AS j
				  ON b.kode_jenis = j.kode_jenis
				  JOIN satuan AS s
				  ON b.kode_satuan = s.kode_satuan";
		return $this->db->query($query)->result_array();
	}

	public function getDataBarangById($id)
	{
		$query = "SELECT b.*, j.jenis_barang, s.satuan_barang
				  FROM barang AS b
				  JOIN jenis AS j
				  ON b.kode_jenis = j.kode_jenis
				  JOIN satuan AS s
				  ON b.kode_satuan = s.kode_satuan
				  WHERE b.id = $id 
				  ";
		return $this->db->query($query)->result_array();
	}

	public function tambahData()
	{
		$data = [
			"nama_barang" => $this->input->post('nama_barang', true),
			"merk_barang" => $this->input->post('merk_barang', true),
			"kode_jenis" => $this->input->post('jenis', true),
			"kode_satuan" => $this->input->post('satuan', true),
		];
		return $this->db->insert('barang', $data);
	}

	public function editData($id)
	{
		$data = [
			"nama_barang" => $this->input->post('nama_barang', true),
			"merk_barang" => $this->input->post('merk_barang', true),
			"kode_jenis" => $this->input->post('jenis', true),
			"kode_satuan" => $this->input->post('satuan', true)
		];
		$this->db->where('id', $id);
		$this->db->update('barang', $data);
	}

	public function totalbarang()
	{
		$totalbarang = 0;
		$barang = $this->getDataBarang();
		foreach ($barang as $c) :
			$totalbarang += 1;
		endforeach;
		return $totalbarang;
	}
}
