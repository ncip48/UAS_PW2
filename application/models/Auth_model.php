<?php

class Auth_model extends CI_Model
{
	public function login($email, $password)
	{
		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				return $user;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function getUserData($id)
	{
		return $this->db->get_where('tb_user', ['id' => $id])->row_array();
	}

	public function register($data)
	{
		$this->db->insert('tb_user', $data);
	}

	public function cekEmail($email)
	{
		return $this->db->get_where('tb_user', ['email' => $email])->row_array();
	}

	public function is_login()
	{
		$is_login = $this->session->userdata('is_login');
		if ($is_login) {
			return true;
		} else {
			return false;
		}
	}

	public function is_admin()
	{
		$role = $this->session->userdata('role');
		if ($role == 'admin') {
			return true;
		} else {
			return false;
		}
	}
}
