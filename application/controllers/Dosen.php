<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
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
		$is_admin = $this->auth->is_dosen();
		if (!$is_admin) {
			redirect('admin/home');
		}
	}

	public function home()
	{
		$data['title'] = 'Home';
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/home/index');
		$this->load->view('dosen/templates/footer');
	}

	public function matkul()
	{
		$data['title'] = 'Mata Kuliah';
		$user = $this->db->get_where('tb_user', ['id' =>  $this->session->userdata('userdata')['id']])->row();
		$dosen = $this->db->get_where('tb_dosen', ['id_dosen' => $user->id_dosen])->row();
		$data['matkuls'] = $this->db->get_where('tb_matkul', ['id_dosen' => $dosen->id_dosen])->result_array();
		// var_dump($user->id_dosen);
		// die();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/matkul/index', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function rps()
	{
		$data['title'] = 'RPS';
		$user = $this->db->get_where('tb_user', ['id' =>  $this->session->userdata('userdata')['id']])->row();
		$this->db->select('tb_rps.*, tb_matkul.nama_matkul, tb_matkul.kode_matkul');
		$this->db->join('tb_matkul', 'tb_matkul.id = tb_rps.id_matkul');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_matkul.id_dosen');
		$data['rpss'] = $this->db->get_where('tb_rps', ['tb_dosen.id_dosen' => $user->id_dosen])->result_array();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/index', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function tambah_rps()
	{
		$data['title'] = 'Tambah RPS';
		$this->db->group_by('kode_matkul');
		$matkuls = $this->db->get('tb_matkul')->result();
		//remove one duplicate data from matkul
		$data['matkuls'] = $matkuls;
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/add', $data);
		$this->load->view('dosen/templates/footer');
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

		$rpp = $this->db->get_where('tb_rps_detail', ['id_rps' => $rps->id]);

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

		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/detail', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function tambah_rps_aksi()
	{
		$id_matkul = $this->input->post('id_matkul');
		$semester = $this->input->post('semester');
		$matkul = $this->db->get_where('tb_matkul', ['id' => $id_matkul])->row();
		$nomor = "RPS-" . $matkul->kode_matkul;
		$tanggal_berlaku = date('Y-m-d');
		$tanggal_disusun = date('Y-m-d');
		$id_user = $this->session->userdata('userdata')['id'];
		$this->db->join('tb_user', 'tb_user.id_dosen = tb_dosen.id_dosen');
		$id_pembuat = $this->db->get_where('tb_dosen', ['tb_user.id' => $id_user])->row();
		$id_pembuat = $id_pembuat->id_dosen;
		$revisi = "00";
		$bobot_sks = $this->input->post('bobot_sks');
		$detail_penilaian = $this->input->post('detail_penilaian');
		$gambaran_umum = $this->input->post('gambaran_umum');
		$capaian = $this->input->post('capaian');
		$prasyarat = $this->input->post('prasyarat');

		//action to input tb_rps
		$data = [
			'id_matkul' => $id_matkul,
			'semester' => $semester,
			'nomor' => $nomor,
			'tanggal_berlaku' => $tanggal_berlaku,
			'tanggal_disusun' => $tanggal_disusun,
			'id_pembuat' => $id_pembuat,
			'revisi' => $revisi,
			'bobot_sks' => $bobot_sks,
			'detail_penilaian' => $detail_penilaian,
			'gambaran_umum' => $gambaran_umum,
			'capaian' => $capaian,
			'prasyarat' => $prasyarat,
		];

		$this->db->insert('tb_rps', $data);
		$id_rps = $this->db->insert_id();
		//return redirect to detail_rps
		$id = $this->encrypt->encode($id_rps);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">RPS berhasil ditambahkan</div>');
		return redirect('dosen/detail_rps?id=' . $id);
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

	public function cetak_rps2()
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
			$index = 0;

			#if there is same kemampuan_name in 1 row then give blank value and increment index else set index to 0
			if ($i == 0) {
				$kemampuan_arr[$i]['kemampuan_akhir'] = $kemampuanName;
				$kemampuan_arr[$i]['index'] = 0;
				$kemampuan_arr[$i]['remove_top_border'] = false;
				$kemampuan_arr[$i]['remove_bottom_border'] = true;
			} else {
				if ($kemampuan_akhir[$i] == $kemampuan_akhir[$i - 1]) {
					$kemampuanName = "";
					$index = $kemampuan_arr[$i - 1]['index'] + 1;
					$kemampuan_arr[$i]['index'] = $index;
					$kemampuan_arr[$i]['remove_top_border'] = true;
					if ($kemampuan_arr[$i]['index'] == 3) {
						$kemampuan_arr[$i]['remove_bottom_border'] = false;
					}
				} else {
					$kemampuanName = $kemampuan_akhir[$i];
					$kemampuan_arr[$i]['index'] = 0;
					$kemampuan_arr[$i]['remove_top_border'] = false;
					if ($kemampuan_arr[$i]['index'] == $kemampuan_arr[$i - 1]['index']) {
						$kemampuan_arr[$i]['remove_bottom_border'] = false;
					}
				}
				#check if index in last row is same as current row then remove bottom border
				if ($kemampuan_arr[$i]['index'] == $kemampuan_arr[$i - 1]['index']) {
					$kemampuan_arr[$i - 1]['remove_bottom_border'] = false;
				}
				$kemampuan_arr[$i]['kemampuan_akhir'] = $kemampuanName;
			}
		}

		# to json
		$kemampuan_arr = json_encode($kemampuan_arr);
		echo ($kemampuan_arr);
		die();

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
		$this->pdf->load_view('dosen/rps/cetak2', $data);
		// $this->load->view('dosen/rps/cetak', $data);
	}
}
