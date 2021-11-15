<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
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
        $this->load->model('Jenis_Model');
    }

    public function index()
    {
        $data['judul'] = 'Data Jenis Barang';
        $data['jenis'] = $this->Jenis_Model->getDataJenis();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('data/jenis', $data);
    }

    public function tambah_data()
    {
        $data['judul'] = 'Tambah Data Jenis Barang';

        $this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Satuan Jenis', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/tambah_jenis', $data);
        } else {
            $this->Jenis_Model->tambahDataJenis();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jenis');
        }
    }

    public function edit_jenis($kode)
    {
        $data['judul'] = 'Edit Data Jenis Barang';
        $data['jenis'] = $this->Jenis_Model->getKode($kode);

        $this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/edit_jenis', $data);
        } else {
            $this->Jenis_Model->editDataJenis();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('jenis');
        }
    }

    public function hapus_data($kode)
    {
        $this->Jenis_Model->hapusDataJenis($kode);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('jenis');
    }
}
