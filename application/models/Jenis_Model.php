<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDataJenis()
    {
        $query = "SELECT *
                  FROM `jenis`
                  ";
        return $this->db->query($query)->result_array();
    }

    public function tambahDataJenis()
    {
        $data = [
            "kode_jenis" => $this->input->post('kode_jenis', true),
            "jenis_barang" => $this->input->post('jenis_barang', true)
        ];
        $this->db->insert('jenis', $data);
    }

    public function editDataJenis()
    {
        $data = [
            "kode_jenis" => $this->input->post('kode_jenis', true),
            "jenis_barang" => $this->input->post('jenis_barang', true)
        ];

        $this->db->where('kode_jenis', $this->input->post('kode_jenis'));
        $this->db->update('jenis', $data);
    }

    public function getKode($kode)
    {
        return $this->db->get_where('jenis', ['kode_jenis' => $kode])->row_array();
    }

    public function hapusDataJenis($kode)
    {

        $this->db->delete('jenis', ['kode_jenis' => $kode]);
    }
}
