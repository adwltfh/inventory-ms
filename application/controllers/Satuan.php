<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_Model');
    }

    public function index()
    {
        $data['judul'] = 'Data Satuan Barang';
        $data['satuan'] = $this->Satuan_Model->getDataSatuan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('data/satuan', $data);
    }

    public function tambah_data()
    {
        $data['judul'] = 'Tambah Data Satuan Barang';

        $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'required');
        $this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/tambah_satuan', $data);
        } else {
            $this->Satuan_Model->tambahDataSatuan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('satuan');
        }
    }

    public function edit_satuan($kode)
    {
        $data['judul'] = 'Edit Data Satuan Barang';
        $data['satuan'] = $this->Satuan_Model->getKode($kode);

        $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'required');
        $this->form_validation->set_rules('satuan_barang', 'Satuan Barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/edit_satuan', $data);
        } else {
            $this->Satuan_Model->editDataSatuan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('satuan');
        }
    }

    public function hapus_data($kode)
    {
        $this->Satuan_Model->hapusDataSatuan($kode);
        $this->session->set_flashdata('sukses', 'Dihapus');
        redirect('satuan');
    }
}
