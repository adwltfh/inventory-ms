<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Satuan_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDataSatuan()
    {
        $query = "SELECT *
                  FROM `satuan`
                  ";
        return $this->db->query($query)->result_array();
    }

    public function tambahDataSatuan()
    {
        $data = [
            "kode_satuan" => $this->input->post('kode_satuan', true),
            "satuan_barang" => $this->input->post('satuan_barang', true)
        ];
        $this->db->insert('satuan', $data);
    }

    public function editDataSatuan()
    {
        $data = [
            "kode_satuan" => $this->input->post('kode_satuan', true),
            "satuan_barang" => $this->input->post('satuan_barang', true)
        ];

        $this->db->where('kode_satuan', $this->input->post('kode_satuan'));
        $this->db->update('satuan', $data);
    }

    public function getKode($kode)
    {
        return $this->db->get_where('satuan', ['kode_satuan' => $kode])->row_array();
    }

    public function hapusDataSatuan($kode)
    {

        $this->db->delete('satuan', ['kode_satuan' => $kode]);
    }
}
