<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function login()
	{
		$this->load->view('home');
	}

	public function user()
	{
		$data['title'] = 'User';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/user/index');
		$this->load->view('admin/templates/footer');
	}

	public function home()
	{
		$data['title'] = 'Home';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/home/index');
		$this->load->view('admin/templates/footer');
	}

	public function dosen()
	{
		$data['title'] = 'Dosen';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/dosen/index');
		$this->load->view('admin/templates/footer');
	}
}
