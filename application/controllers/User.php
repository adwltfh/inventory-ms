<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}


	public function index()
	{
		$data['judul'] = 'Profile';
		$data['user'] = $this->User_model->getUser($_SESSION['email']);
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/user', $data);
	}

	public function list()
	{
		$data['judul'] = 'List User';
		$data['user'] = $this->User_model->getAllUser();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('user/list', $data);
	}

	public function login()
	{
		$data = $this->input;
		$modelData = $this->User_model->getUser($data->post('email'));
		if ($data->post('password') == $modelData['password']) {
			$_SESSION['id_user'] = $modelData['id_user'];
			$_SESSION['nama_lengkap'] = $modelData['nama_lengkap'];
			$_SESSION['email'] = $modelData['email'];
			$_SESSION['no_hp'] = $modelData['no_hp'];
			$_SESSION['role'] = $modelData['role'];
			return redirect(base_url('/'));
		} else {
			return redirect(base_url('/login.php'));
		}
	}

	public function logout()
	{
		$_SESSION = [];
		session_unset();
		session_destroy();
		header("Access-Control-Allow-Headers: *");
		$url = base_url('/login.php');
		echo $url;
		echo "<script type='text/javascript'>window.top.location='$url';</script>";
		exit;
	}

	public function tambah_user()
    {
        $data['judul'] = 'Tambah Data User';
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('no_hp','no_hp','required');
		$this->form_validation->set_rules('password','password','required');
		if (strtolower($_SESSION['role']) == "admin"){
			$this->form_validation->set_rules('role','role','required');
		}
		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/tambah_user', $data);
        } else {
            $this->User_model->tambahUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('user/list'));
        }
    }

	public function edit_user($id)
    {
        $data['judul'] = 'Edit Data User';
		$modelData = $this->User_model->getUserById($id);
		$data['user'] = $modelData;
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('no_hp','no_hp','required');
		$this->form_validation->set_rules('password','password','required');
		if (strtolower($_SESSION['role']) == "admin" && !isset($_GET['type'])){
			$this->form_validation->set_rules('role','role','required');
		}
		if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('data/edit_user', $data);
        } else {
            $this->User_model->editUser($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
			if ($_SESSION['role'] != "Admin"){
				return redirect(base_url('user'));
			}
			$baseUrl = (isset($_GET['type']) ? 'user' : 'user/list');
            return redirect(base_url($baseUrl));
        }
    }

	public function hapus_user($id)
    {
        $this->User_model->hapusUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/list');
    }
}
