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
		$id = $this->input->get('id');
		if ($id) {
			$id = $this->encrypt->decode($id);
			$data['title'] = 'Edit User';
			$data['user'] = $this->db->get_where('tb_user', ['id' => $id])->row();
			$data['dosens'] = $this->db->get('tb_dosen')->result();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/user/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data['title'] = 'User';
			$data['users'] = $this->db->get('tb_user')->result_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/user/index', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function tambah_user()
	{
		$data['title'] = 'Tambah User';
		$data['dosens'] = $this->db->get('tb_dosen')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/user/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_user_aksi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email]', [
			'is_unique' => 'Email sudah terdaftar',
			'required' => 'Email harus diisi',
			'valid_email' => 'Email tidak valid',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [
			'min_length' => 'Password terlalu pendek',
			'required' => 'Password harus diisi',
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|matches[password]', [
			'required' => 'Konfirmasi password harus diisi',
			'matches' => 'Konfirmasi password tidak sama',
		]);
		$this->form_validation->set_rules('role', 'Role', 'required', [
			'required' => 'Role harus dipilih',
		]);
		if ($this->form_validation->run() == false) {
			$this->tambah_user();
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role' => htmlspecialchars($this->input->post('role', true)),
				'id_dosen' => htmlspecialchars($this->input->post('id_dosen', true)),
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('message', 'User berhasil ditambahkan');
			redirect('admin/user');
		}
	}

	public function edit_user_aksi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
			'required' => 'Email harus diisi',
			'valid_email' => 'Email tidak valid',
		]);
		$this->form_validation->set_rules('role', 'Role', 'required', [
			'required' => 'Role harus dipilih',
		]);

		if ($this->form_validation->run() == false) {
			$this->edit_user($this->input->post('id'));
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'role' => htmlspecialchars($this->input->post('role', true)),
				'id_dosen' => htmlspecialchars($this->input->post('id_dosen', true)),
			];

			if ($this->input->post('password') != null) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tb_user', $data);
			$this->session->set_flashdata('message', 'User berhasil diubah');
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

	public function dosen()
	{
		$id = $this->input->get('id');
		if ($id) {
			$id = $this->encrypt->decode($id);
			$data['title'] = 'Edit dosen';
			$data['dosen'] = $this->db->get_where('tb_dosen', ['id_dosen' => $id])->row();
			$data['dosens'] = $this->db->get('tb_dosen')->result();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/dosen/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data['title'] = 'dosen';
			$data['dosens'] = $this->db->get('tb_dosen')->result_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/dosen/index', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function tambah_dosen()
	{
		$data['title'] = 'Tambah dosen';
		$data['dosens'] = $this->db->get('tb_dosen')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/dosen/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_dosen_aksi()
	{
		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required', [
			'required' => 'Nama harus diisi'
		]);

		$this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[tb_dosen.nip]', [
			'is_unique' => 'NIP sudah terdaftar',
			'required' => 'NIP harus diisi',
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => 'harus dipilih',
		]);

		$this->form_validation->set_rules('alamat_dosen', 'Alamat dosen', 'required', [
			'required' => 'Alamat dosen harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->tambah_dosen();
		} else {
			$data = [
				'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
				'nip' => htmlspecialchars($this->input->post('nip', true)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
			];

			$this->db->insert('tb_dosen', $data);
			$this->session->set_flashdata('message', 'dosen berhasil ditambahkan');
			redirect('admin/dosen');
		}
	}

	public function edit_dosen_aksi()
	{
		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('nip', 'Nip', 'required', [
			'required' => 'NIP harus diisi',
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
			'required' => 'harus dipilih',
		]);
		$this->form_validation->set_rules('alamat_dosen', 'Alamat dosen', 'required', [
			'required' => 'Alamat dosen harus diisi'
		]);

		if ($this->form_validation->run() == false) {
			$id = $this->input->post('id');
			$data['title'] = 'Edit dosen';
			$data['dosen'] = $this->db->get_where('tb_dosen', ['id_dosen' => $id])->row();
			$data['dosens'] = $this->db->get('tb_dosen')->result();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/dosen/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data = [
				'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
				'nip' => htmlspecialchars($this->input->post('nip', true)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
			];
			$this->db->where('id_dosen', $this->input->post('id'));
			$this->db->update('tb_dosen', $data);
			$this->session->set_flashdata('message', 'Dosen berhasil diubah');
			redirect('admin/dosen');
		}
	}

	public function hapus_dosen($id_dosen)
	{
		$this->db->where('id_dosen', $id_dosen);
		$this->db->delete('tb_dosen');
		$this->session->set_flashdata('message', 'Dosen berhasil dihapus');
		redirect('admin/dosen');
	}

	public function prodi()
	{
		$id = $this->input->get('id_prodi');
		if ($id) {
			$id = $this->encrypt->decode($id);
			$data['title'] = 'Edit prodi';
			$data['prodi'] = $this->db->get_where('tb_prodi', ['id_prodi' => $id])->row();
			$data['fakultass'] = $this->db->get('tb_fakultas')->result();
			$data['dosens'] = $this->db->get('tb_dosen')->result();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/prodi/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data['title'] = 'prodi';
			$this->db->select('tb_prodi.*, tb_fakultas.nama, tb_dosen.nama_dosen as nama_kaprodi');
			$this->db->join('tb_fakultas', 'tb_fakultas.id = tb_prodi.id_fakultas', 'left');
			$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.kaprodi', 'left');
			$prodi_kaprodi = $this->db->get('tb_prodi')->result_array();

			$this->db->select('tb_prodi.*, tb_fakultas.nama, tb_dosen.nama_dosen as nama_sekprodi');
			$this->db->join('tb_fakultas', 'tb_fakultas.id = tb_prodi.id_fakultas', 'left');
			$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.sekprodi', 'left');
			$prodi_sekprodi = $this->db->get('tb_prodi')->result_array();

			$data['prodis'] = array_map(function ($prodi_kaprodi, $prodi_sekprodi) {
				return array_merge($prodi_kaprodi, $prodi_sekprodi);
			}, $prodi_kaprodi, $prodi_sekprodi);

			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/prodi/index', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function tambah_prodi()
	{
		$data['title'] = 'Tambah prodi';
		$data['fakultase'] = $this->db->get('tb_fakultas')->result_array();
		$data['dosens'] = $this->db->get('tb_dosen')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/prodi/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_prodi_aksi()
	{
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required', [
			'required' => 'silahkan pilih fakultas',
		]);
		$this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('kaprodi', 'kaprodi', 'required', [
			'required' => 'silahkan pilih kaprodi',
		]);
		$this->form_validation->set_rules('sekprodi', 'sekprodi', 'required', [
			'required' => 'silahkan pilih sekprodi',
		]);

		if ($this->form_validation->run() == false) {
			$this->tambah_prodi();
		} else {
			$data = [
				'id_fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
				'nama_prodi' => htmlspecialchars($this->input->post('nama_prodi', true)),
				'kaprodi' => htmlspecialchars($this->input->post('kaprodi', true)),
				'sekprodi' => htmlspecialchars($this->input->post('sekprodi', true)),
			];
			$this->db->insert('tb_prodi', $data);
			$this->session->set_flashdata('message', 'prodi berhasil ditambahkan');
			redirect('admin/prodi');
		}
	}
	public function edit_prodi_aksi()
	{
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required', [
			'required' => 'silahkan pilih fakultas',
		]);
		$this->form_validation->set_rules('nama_prodi', 'Nama', 'required', [
			'required' => 'Nama harus diisi'
		]);
		$this->form_validation->set_rules('kaprodi', 'kaprodi', 'required', [
			'required' => 'silahkan pilih kaprodi',
		]);
		$this->form_validation->set_rules('sekprodi', 'sekprodi', 'required', [
			'required' => 'silahkan pilih sekprodi',
		]);

		if ($this->form_validation->run() == false) {
			$this->edit_prodi($this->input->post('id_prodi'));
		} else {
			$data = [
				'id_fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
				'nama_prodi' => htmlspecialchars($this->input->post('nama_prodi', true)),
				'kaprodi' => htmlspecialchars($this->input->post('kaprodi', true)),
				'sekprodi' => htmlspecialchars($this->input->post('sekprodi', true)),
			];

			$this->db->where('id_prodi', $this->input->post('id'));
			$this->db->update('tb_prodi', $data);
			$this->session->set_flashdata('message', 'prodi berhasil diubah');
			redirect('admin/prodi');
		}
	}
	public function hapus_prodi($id)
	{
		$this->db->where('id_prodi', $id);
		$this->db->delete('tb_prodi');
		$this->session->set_flashdata('message', 'Prodi berhasil dihapus');
		redirect('admin/prodi');
	}

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

	public function fakultas()
	{
		$data['title'] = 'fakultas';
		$data['fakultas'] = $this->db->get('tb_fakultas')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/fakultas/index', $data);
		$this->load->view('admin/fakultas/footer');
	}

	public function hapus_fakultas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_fakultas');
		$this->session->set_flashdata('message', 'Fakultas berhasil dihapus');
		redirect('admin/fakultas');
	}

	public function rps()
	{
		$id_fakultas = $this->input->get('fakultas');
		$data['title'] = 'RPS';
		$this->db->select('tb_rps.*, tb_matkul.nama_matkul, tb_prodi.nama_prodi, tb_fakultas.nama as nama_fakultas');
		$this->db->from('tb_rps');
		$this->db->join('tb_matkul', 'tb_matkul.id = tb_rps.id_matkul');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_matkul.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id = tb_prodi.id_fakultas');
		if ($id_fakultas) {
			$id_fakultas = $this->encrypt->decode($id_fakultas);
			$this->db->where('tb_fakultas.id', $id_fakultas);
		}
		$data['rpss'] = $this->db->get()->result();
		$data['fakultass'] = $this->db->get('tb_fakultas')->result();
		$data['title_fakultas'] = $id_fakultas ? $this->db->get_where('tb_fakultas', ['id' => $id_fakultas])->row()->nama : "Pilih Fakultas";
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/rps/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function detail_rps()
	{
		$data['title'] = "Detail RPS";
		//buat fungsi menampilkan rps
		$id = $this->input->get('id');
		$id = $this->encrypt->decode($id);
		$rps = $this->db->get_where('tb_rps', ['id' => $id])->row();

		$this->db->select('tb_matkul.*, tb_prodi.*, tb_fakultas.nama as nama_fakultas, tb_fakultas.id as id_fakultas');
		$this->db->from('tb_matkul');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_matkul.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id = tb_prodi.id_fakultas');
		$this->db->where('tb_matkul.id', $rps->id_matkul);
		$matkul = $this->db->get()->row();

		$this->db->select('tb_fakultas.*, tb_dosen.nama_dosen as nama_dekan, tb_dosen.nip as nip_dekan');
		$this->db->from('tb_fakultas');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_fakultas.id_dekan');
		$this->db->where('tb_fakultas.id', $matkul->id_fakultas);
		$fakultas = $this->db->get()->row();

		$this->db->select('tb_prodi.*, tb_dosen.nama_dosen as nama_kaprodi, tb_dosen.nip as nip_kaprodi');
		$this->db->from('tb_prodi');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.kaprodi');
		$this->db->where('tb_prodi.id_fakultas', $matkul->id_fakultas);
		$prodi = $this->db->get()->row();

		$this->db->select('tb_dosen.nama_dosen as nama_pembuat, tb_dosen.nip as nip_pembuat, tb_rps.*');
		$this->db->from('tb_dosen');
		$this->db->join('tb_rps', 'tb_rps.id_pembuat = tb_dosen.id_dosen');
		$this->db->where('tb_rps.id', $rps->id);
		$pembuat = $this->db->get()->row();

		$this->db->select('tb_prodi.*, tb_dosen.nama_dosen as nama_sekprodi, tb_dosen.nip as nip_sekprodi');
		$this->db->from('tb_prodi');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.sekprodi');
		$this->db->where('tb_prodi.id_fakultas', $matkul->id_fakultas);
		$sekprodi = $this->db->get()->row();

		$kode_matkul = $this->db->get_where('tb_matkul', ['id' => $rps->id_matkul])->row();
		$kode_matkul = $kode_matkul->kode_matkul;
		$this->db->select('tb_dosen.*, tb_matkul.id_dosen, tb_matkul.kode_matkul');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_matkul.id_dosen = tb_dosen.id_dosen');
		$this->db->where('tb_matkul.kode_matkul', $kode_matkul);
		$dosen_pengampu = $this->db->get()->result();

		$unit_pembelajaran = $this->db->get_where('tb_rps_unit_pembelajaran', ['id_rps' => $rps->id])->result();

		$tugas_aktivitas = $this->db->get_where('tb_rps_tugas', ['id_rps' => $rps->id])->result();

		$rpp = $this->db->get_where('tb_rps_detail', ['id_rps' => $rps->id])->result();

		$data['matkul'] = $matkul;
		$data['rps'] = $rps;
		$data['fakultas'] = $fakultas;
		$data['prodi'] = $prodi;
		$data['pembuat'] = $pembuat;
		$data['sekprodi'] = $sekprodi;
		$data['dosen_pengampu'] = $dosen_pengampu;
		$data['unit_pembelajaran'] = $unit_pembelajaran;
		$data['tugas_aktivitas'] = $tugas_aktivitas;
		$data['rpp'] = $rpp;

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/rps/detail', $data);
		$this->load->view('admin/templates/footer');
	}

	public function cetak_rps()
	{
		$id = $this->input->get('id');
		$id = $this->encrypt->decode($id);
		$rpss = $this->db->get_where('tb_rps', ['id' => $id])->row();
		$rps = $this->db->get_where('tb_rps_detail', ['id_rps' => $rpss->id]);

		$this->db->select('tb_matkul.*, tb_prodi.*, tb_fakultas.nama as nama_fakultas, tb_fakultas.id as id_fakultas');
		$this->db->from('tb_matkul');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_matkul.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id = tb_prodi.id_fakultas');
		$this->db->where('tb_matkul.id', $rpss->id_matkul);
		$matkul = $this->db->get()->row();

		$this->db->select('tb_fakultas.*, tb_dosen.nama_dosen as nama_dekan, tb_dosen.nip as nip_dekan');
		$this->db->from('tb_fakultas');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_fakultas.id_dekan');
		$this->db->where('tb_fakultas.id', $matkul->id_fakultas);
		$fakultas = $this->db->get()->row();

		$this->db->select('tb_prodi.*, tb_dosen.nama_dosen as nama_kaprodi, tb_dosen.nip as nip_kaprodi');
		$this->db->from('tb_prodi');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.kaprodi');
		$this->db->where('tb_prodi.id_fakultas', $matkul->id_fakultas);
		$prodi = $this->db->get()->row();

		$this->db->select('tb_dosen.nama_dosen as nama_pembuat, tb_dosen.nip as nip_pembuat, tb_rps.*');
		$this->db->from('tb_dosen');
		$this->db->join('tb_rps', 'tb_rps.id_pembuat = tb_dosen.id_dosen');
		$this->db->where('tb_rps.id', $rpss->id);
		$pembuat = $this->db->get()->row();

		$this->db->select('tb_prodi.*, tb_dosen.nama_dosen as nama_sekprodi, tb_dosen.nip as nip_sekprodi');
		$this->db->from('tb_prodi');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_prodi.sekprodi');
		$this->db->where('tb_prodi.id_fakultas', $matkul->id_fakultas);
		$sekprodi = $this->db->get()->row();

		$kode_matkul = $this->db->get_where('tb_matkul', ['id' => $rpss->id_matkul])->row();
		$kode_matkul = $kode_matkul->kode_matkul;
		$this->db->select('tb_dosen.*, tb_matkul.id_dosen, tb_matkul.kode_matkul');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_matkul.id_dosen = tb_dosen.id_dosen');
		$this->db->where('tb_matkul.kode_matkul', $kode_matkul);
		$dosen_pengampu = $this->db->get()->result();

		$unit_pembelajaran = $this->db->get_where('tb_rps_unit_pembelajaran', ['id_rps' => $rpss->id])->result();

		$tugas_aktivitas = $this->db->get_where('tb_rps_tugas', ['id_rps' => $rpss->id])->result();

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
		$data['matkul'] = $matkul;
		$data['rps'] = $rpss;
		$data['fakultas'] = $fakultas;
		$data['prodi'] = $prodi;
		$data['pembuat'] = $pembuat;
		$data['sekprodi'] = $sekprodi;
		$data['dosen_pengampu'] = $dosen_pengampu;
		$data['unit_pembelajaran'] = $unit_pembelajaran;
		$data['tugas_aktivitas'] = $tugas_aktivitas;

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = $rpss->nomor . ".pdf";
		$this->pdf->load_view('dosen/rps/cetak', $data);
	}

	public function matkul()
	{
		$id = $this->input->get('id');
		if ($id) {
			$id = $this->encrypt->decode($id);
			$data['title'] = 'Edit matkul';
			$data['matkul'] = $this->db->get_where('tb_matkul', ['id' => $id])->row();
			$data['matkuls'] = $this->db->get('tb_matkul')->result();
			$data['dosens'] = $this->db->get('tb_dosen')->result_array();
			$data['prodis'] = $this->db->get('tb_prodi')->result_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/matkul/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data['title'] = 'matkul';
			$this->db->select('tb_matkul.*, tb_prodi.nama_prodi, tb_dosen.nama_dosen');
			$this->db->from('tb_matkul');
			$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_matkul.id_prodi');
			$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_matkul.id_dosen');
			$data['matkuls'] = $this->db->get()->result_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/matkul/index', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	//Function Matkul
	public function tambah_matkul()
	{
		$data['title'] = 'Tambah Matkul';
		$data['matkuls'] = $this->db->get('tb_matkul')->result_array();
		$data['dosens'] = $this->db->get('tb_dosen')->result_array();
		$data['prodis'] = $this->db->get('tb_prodi')->result_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/matkul/add', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_matkul_aksi()
	{
		$this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required|is_unique[tb_matkul.nama_matkul]', [
			'is_unique' => 'Nama Matkul sudah ada',
			'required' => 'Nama Matkul harus diisi'
		]);

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required', [
			'required' => 'Nama Dosen harus dipilih',
		]);

		$this->form_validation->set_rules('kode_matkul', 'Kode Matkul', 'required', [
			'required' => 'Kode Matkul harus diisi',
		]);

		$this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required', [
			'required' => 'Nama Prodi harus dipilih'
		]);

		if ($this->form_validation->run() == false) {
			$this->tambah_matkul();
		} else {
			$data = [
				'nama_matkul' => htmlspecialchars($this->input->post('nama_matkul', true)),
				'id_dosen' => htmlspecialchars($this->input->post('id_dosen', true)),
				'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul', true)),
				'id_prodi' => htmlspecialchars($this->input->post('id_prodi', true)),
			];

			$this->db->insert('tb_matkul', $data);
			$this->session->set_flashdata('message', 'Matkul berhasil ditambahkan');
			redirect('admin/matkul');
		}
	}

	public function edit_matkul_aksi()
	{
		$this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required', [
			'required' => 'Nama Matkul harus diisi'
		]);

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required', [
			'required' => 'Nama Dosen harus dipilih',
		]);

		$this->form_validation->set_rules('kode_matkul', 'Kode Matkul', 'required', [
			'required' => 'Kode Matkul harus diisi',
		]);

		$this->form_validation->set_rules('id_prodi', 'Nama Prodi', 'required', [
			'required' => 'Nama Prodi harus dipilih'
		]);

		if ($this->form_validation->run() == false) {
			$id = $this->input->post('id');
			$data['title'] = 'Edit Matkul';
			$data['matkul'] = $this->db->get_where('tb_matkul', ['id' => $id])->row();
			$data['matkuls'] = $this->db->get('tb_matkul')->result();
			$data['dosens'] = $this->db->get('tb_dosen')->result_array();
			$data['prodis'] = $this->db->get('tb_prodi')->result_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/matkul/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data = [
				'nama_matkul' => htmlspecialchars($this->input->post('nama_matkul', true)),
				'id_dosen' => htmlspecialchars($this->input->post('id_dosen', true)),
				'kode_matkul' => htmlspecialchars($this->input->post('kode_matkul', true)),
				'id_prodi' => htmlspecialchars($this->input->post('id_prodi', true)),
			];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tb_matkul', $data);
			$this->session->set_flashdata('message', 'Matkul berhasil diubah');
			redirect('admin/matkul');
		}
	}

	public function hapus_matkul($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_matkul');
		$this->session->set_flashdata('message', 'Matkul berhasil dihapus');
		redirect('admin/matkul');
	}
}
