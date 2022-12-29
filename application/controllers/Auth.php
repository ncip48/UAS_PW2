<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth');
		$is_login = $this->auth->is_login();
		if ($is_login) {
			$role = $this->auth->role();
			if ($role == 'admin') {
				redirect('admin/home');
			} else {
				redirect('dosen/home');
			}
		}
	}
	public function login()
	{
		if ($_POST) {
			//create validation
			$this->form_validation->set_rules('email', 'Email', 'required', [
				'required' => 'Email harus diisi!'
			]);
			$this->form_validation->set_rules('password', 'Password', 'required', [
				'required' => 'Password harus diisi!'
			]);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('login');
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$cek = $this->db->get_where('tb_user', ['email' => $email])->row_array();
				if ($cek) {
					if (password_verify($password, $cek['password'])) {
						$data = [
							'id' => $cek['id'],
						];
						$this->session->set_userdata('userdata', $data);
						$this->session->set_userdata('is_login', TRUE);
						if ($cek['role'] == 1) {
							$this->session->set_userdata('role', 'admin');
							redirect('admin/home');
						} else {
							$this->session->set_userdata('role', 'dosen');
							redirect('dosen/home');
						}
					} else {
						$this->session->set_flashdata('login_error', '<div class="alert alert-danger" role="alert">Password salah!</div>');
						redirect('auth/login');
					}
				} else {
					$this->session->set_flashdata('login_error', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
					redirect('auth/login');
				}
			}
		} else {
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
