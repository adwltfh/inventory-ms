<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
		$this->load->model('Barang_Model');
		$this->load->model('Jenis_Model');
		$this->load->model('Satuan_Model');

	}

	public function index()
	{
		$data['judul'] = 'Data Barang';
		$data['barang'] = $this->Barang_Model->getDataBarang();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('data/barang', $data);
	}

	public function tambah_data()
	{
		$data['judul'] = 'Tambah Data Barang';
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
		$this->form_validation->set_rules('merk_barang', 'merk_barang', 'required');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('satuan', 'satuan', 'required');
		if ($this->form_validation->run() == false) {
			$data['jenis'] = $this->Jenis_Model->getDataJenis();
			$data['satuan'] = $this->Satuan_Model->getDataSatuan();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('data/tambah_barang', $data);
		} else {
			$this->Barang_Model->tambahData();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect(base_url('barang'));
		}
	}


	public function edit_data($id)
	{
		$data['judul'] = 'Tambah Data Barang';
		$data['barang'] = $this->Barang_Model->getDataBarangById($id);
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
		$this->form_validation->set_rules('merk_barang', 'merk_barang', 'required');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('satuan', 'satuan', 'required');
		if ($this->form_validation->run() == false) {
			$data['jenis'] = $this->Jenis_Model->getDataJenis();
			$data['satuan'] = $this->Satuan_Model->getDataSatuan();
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('data/edit_barang', $data);
		} else {
			$this->Barang_Model->editData($id);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect(base_url('barang'));
		}
	}
}
