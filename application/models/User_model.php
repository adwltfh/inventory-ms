<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUser($id)
    {
        $query = "SELECT * FROM user WHERE email = '$id'";
		$data = $this->db->query($query)->result_array();
		if (count($data) > 0){
			$data = $data[0];
		} else {
			$data = [];
		}
        return $data;
    }

	public function getUserById($id)
    {
        $query = "SELECT * FROM user WHERE id_user = '$id'";
		$data = $this->db->query($query)->result_array();
		if (count($data) > 0){
			$data = $data[0];
		} else {
			$data = [];
		}
        return $data;
    }

	public function getAllUser()
	{
		$query = "SELECT * FROM user";
		$data = $this->db->query($query)->result_array();
		return $data;
	}


	public function tambahUser()
	{
		$data = [
			"nama_lengkap" => $this->input->post('nama_lengkap',true), 
			"email" => $this->input->post('email',true), 
			"no_hp" => $this->input->post('no_hp',true), 
			"password" => $this->input->post('password',true), 
			"role" => $this->input->post('role',true)
        ];
        $this->db->insert('user', $data);
	}

	public function editUser($id)
    {
		$currentUser = $this->getUserById($id);
        $data = [
			"nama_lengkap" => $this->input->post('nama_lengkap',true) ?? $currentUser['nama_lengkap'], 
			"email" => $this->input->post('email',true) ?? $currentUser['email'], 
			"no_hp" => $this->input->post('no_hp',true) ?? $currentUser['no_hp'], 
			"password" => $this->input->post('password',true) ?? $currentUser['password'], 
			"role" => $this->input->post('role',true) ?? $currentUser['role']
        ];

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

	public function hapusUser($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }
}
