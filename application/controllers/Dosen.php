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
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/matkul/index', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function rps()
	{
		$data['title'] = 'RPS';
		$user = $this->db->get_where('tb_user', ['id' =>  $this->session->userdata('userdata')['id']])->row();
		$dosen = $this->db->get_where('tb_dosen', ['id_dosen' => $user->id_dosen])->row();
		$matkul = $this->db->get_where('tb_matkul', ['id_dosen' => $dosen->id_dosen])->row();
		$this->db->get_where('tb_rps', ['id_matkul' => $matkul->id]);
		$this->db->join('tb_matkul', 'tb_matkul.id = tb_rps.id_matkul');
		$data['rpss'] = $this->db->get('tb_rps')->result_array();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/index', $data);
		$this->load->view('dosen/templates/footer');
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

		$dosen_pengampu = $this->db->get_where('tb_dosen', ['id_dosen' => $matkul->id_dosen])->row();

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
		// $this->load->view('dosen/rps/cetak', $data);
	}
}
