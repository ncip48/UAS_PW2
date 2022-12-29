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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'auth');
		$is_login = $this->auth->is_login();
		if (!$is_login) {
			redirect('login');
		}
		$is_admin = $this->auth->is_admin();
		if (!$is_admin) {
			redirect('dosen/home');
		}
	}

	//contoh crud

	public function user()
	{
		$data['title'] = 'User';
		$data['users'] = $this->db->get('tb_user')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/user/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_user()
	{
		$data['title'] = 'Tambah User';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/user/tambah', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_user_aksi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->tambah_user();
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan</div>');
			redirect('admin/user');
		}
	}

	public function edit_user($id)
	{
		$data['title'] = 'Edit User';
		$data['user'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/user/edit', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit_user_aksi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run() == false) {
			$this->edit_user($this->input->post('id'));
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tb_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diubah</div>');
			redirect('admin/user');
		}
	}

	public function hapus_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
		$this->session->set_flashdata('message', 'User berhasil dihapus');
		redirect('admin/user');
	}

	// end contoh crud

	public function home()
	{
		$this->load->model('Auth_model', 'auth');
		$data['title'] = 'Home';
		$data['user'] = $this->auth->current_user();
		$data['jumlah_dosen'] = $this->db->get('tb_dosen')->num_rows();
		$data['jumlah_user'] = $this->db->get('tb_user')->num_rows();
		$data['jumlah_fakultas'] = $this->db->get('tb_fakultas')->num_rows();
		$data['jumlah_prodi'] = $this->db->get('tb_prodi')->num_rows();
		// $data['jumlah_matakuliah'] = $this->db->get('tb_matakuliah')->num_rows();
		$data['jumlah_rps'] = $this->db->get('tb_rps')->num_rows();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/home/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function dosen()
	{
		$data['title'] = 'Dosen';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/dosen/index');
		$this->load->view('admin/templates/footer');
	}

	public function rps()
	{
		$data['title'] = 'RPS';
		$rps = $this->db->get('tb_rps');

		$minggu = array();
		$kemampuan_akhir = array();
		$indikator = array();
		$topik = array();
		$aktivitas_pembelajaran = array();
		$waktu = array();
		$penilaian = array();

		# Loop over all the fetched data, and save the
		# data in array.
		foreach ($rps->result_array() as $row) {
			array_push($minggu, $row['minggu']);
			array_push($kemampuan_akhir, $row['kemampuan_akhir']);
			array_push($indikator, $row['indikator']);
			array_push($topik, $row['topik']);
			array_push($aktivitas_pembelajaran, $row['aktivitas_pembelajaran']);
			array_push($waktu, $row['waktu']);
			array_push($penilaian, $row['penilaian']);
		}

		$kemampuan_arr = array();

		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$kemampuanName = $kemampuan_akhir[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($kemampuan_arr[$kemampuanName])) {
				$kemampuan_arr[$kemampuanName] = array();
				$kemampuan_arr[$kemampuanName]['rowspan'] = 0;
			}

			$kemampuan_arr[$kemampuanName]['printed'] = "no";

			# Increment the row span value.
			$kemampuan_arr[$kemampuanName]['rowspan'] += 1;
		}
		$arr_indikator = array();
		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$indikatorName = $indikator[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($arr_indikator[$indikatorName])) {
				$arr_indikator[$indikatorName] = array();
				$arr_indikator[$indikatorName]['rowspan'] = 0;
			}

			$arr_indikator[$indikatorName]['printed'] = "no";

			# Increment the row span value.
			$arr_indikator[$indikatorName]['rowspan'] += 1;
		}
		$topik_arr = array();
		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$topikName = $topik[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($topik_arr[$topikName])) {
				$topik_arr[$topikName] = array();
				$topik_arr[$topikName]['rowspan'] = 0;
			}

			$topik_arr[$topikName]['printed'] = "no";

			# Increment the row span value.
			$topik_arr[$topikName]['rowspan'] += 1;
		}
		$aktivitas_arr = array();
		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$aktivitasName = $aktivitas_pembelajaran[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($aktivitas_arr[$aktivitasName])) {
				$aktivitas_arr[$aktivitasName] = array();
				$aktivitas_arr[$aktivitasName]['rowspan'] = 0;
			}

			$aktivitas_arr[$aktivitasName]['printed'] = "no";

			# Increment the row span value.
			$aktivitas_arr[$aktivitasName]['rowspan'] += 1;
		}
		$waktu_arr = array();
		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$waktuName = $waktu[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($waktu_arr[$waktuName])) {
				$waktu_arr[$waktuName] = array();
				$waktu_arr[$waktuName]['rowspan'] = 0;
			}

			$waktu_arr[$waktuName]['printed'] = "no";

			# Increment the row span value.
			$waktu_arr[$waktuName]['rowspan'] += 1;
		}
		$penilaian_arr = array();
		# loop over all the sal array
		for ($i = 0; $i < sizeof($minggu); $i++) {
			$penilaianName = $penilaian[$i];

			# If there is no array for the employee
			# then create a elemnt.
			if (!isset($penilaian_arr[$penilaianName])) {
				$penilaian_arr[$penilaianName] = array();
				$penilaian_arr[$penilaianName]['rowspan'] = 0;
			}

			$penilaian_arr[$penilaianName]['printed'] = "no";

			# Increment the row span value.
			$penilaian_arr[$penilaianName]['rowspan'] += 1;
		}

		$data['kemampuan_arr'] = $kemampuan_arr;
		$data['minggu'] = $minggu;
		$data['kemampuan_akhir'] = $kemampuan_akhir;
		$data['indikator_arr'] = $arr_indikator;
		$data['indikator'] = $indikator;
		$data['topik_arr'] = $topik_arr;
		$data['topik'] = $topik;
		$data['aktivitas_arr'] = $aktivitas_arr;
		$data['aktivitas_pembelajaran'] = $aktivitas_pembelajaran;
		$data['waktu_arr'] = $waktu_arr;
		$data['waktu'] = $waktu;
		$data['penilaian_arr'] = $penilaian_arr;
		$data['penilaian'] = $penilaian;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/rps/index', $data);
		$this->load->view('admin/templates/footer');
	}
}
