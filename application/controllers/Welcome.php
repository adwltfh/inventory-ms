<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_Model');
		$this->load->model('Barangio_Model');
	}
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
	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['barang'] = $this->Barang_Model->getDataBarang();
		$data['barangio'] = $this->Barangio_Model->getAllDataBarang();
		$data['totalbarang'] = $this->Barang_Model->totalbarang();
		$data['totalbarangmasuk'] = $this->Barangio_Model->totalbarangmasuk();
		$data['totalbarangkeluar'] = $this->Barangio_Model->totalbarangkeluar();
		$this->load->view('template/header', $data);
		$this->load->view('index', $data);
		$this->load->view('template/sidebar');
	}
}
