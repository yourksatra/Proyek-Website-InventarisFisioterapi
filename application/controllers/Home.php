<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'FISIOTERAPI UMS';
		$this->load->view('alpha', $data);
	}

	public function DeletePinjam($id)
	{
		$this->db->where('id_pinjam', $id);
		$this->db->delete('alat_terpinjam');
	}
	public function InsertRecord($data)
	{
		$this->db->insert('record', $data);
	}

	public function beranda()
	{
		$data['dt_alat'] = $this->db->get_where('daftaralat')->result_array();
		$data['title'] = 'INVENTARIS FISIOTERAPI UMS';
		$this->load->view('tamplate/sidebar', $data);
		$this->load->view('beta', $data);
	}

	public function loan()
	{
		$data['dt_alat'] = $this->db->get_where('data_alat')->result_array();
		$data['title'] = 'LAYANAN PEMINJAMAN';
		$this->load->view('tamplate/sidebar', $data);
		$this->load->view('delta', $data);
	}

	public function sop()
	{
		$data['alat'] = $this->db->get_where('tb_sop')->result_array();
		$data['title'] = 'SOP PENGGUNAAN';
		$this->load->view('tamplate/sidebar', $data);
		$this->load->view('elf', $data);
	}

	public function datasop()
	{
		$idsop = $_GET['id'];
		$data['alat'] = $this->db->get_where('tb_sop', ['id_sop' => $idsop])->row_array();
		$data['title'] = 'SOP PENGGUNAAN';
		$this->load->view('echo', $data);
	}

	public function input()
	{
		$kdalat = $_POST['KDalat'];
		$data['dtalat'] = $this->db->get_where('data_alat', ['kd_alat' => $kdalat])->row_array();
		$data['title'] = 'PEMINJAMAN ALAT';
		$this->load->view('tamplate/sidebar', $data);
		$this->load->view('fox', $data);
	}

	public function aksiInsert()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|regex_match[/^[a-zA-Z\s]+$/]|max_length[100]');
		$this->form_validation->set_rules('telpon', 'Telepon', 'trim|required|numeric|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|alpha_numeric|max_length[15]');
		$this->form_validation->set_rules('MK', 'Mata Kuliah', 'trim|required|regex_match[/^[a-zA-Z0-9\s]+$/]|max_length[200]');
		$this->form_validation->set_rules('dosen', 'Dosen', 'trim|required|regex_match[/^[a-zA-Z\s]+$/]|max_length[100]');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required|regex_match[/^[a-zA-Z0-9\s\.]+$/]');
		$this->form_validation->set_rules('tglPinjam', 'Tanggal Pinjam', 'trim|required');
		$this->form_validation->set_rules('jamPenggunaan', 'Jam Penggunaan', 'trim|required');
		$this->form_validation->set_rules('pengembalian', 'Pengembalian', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|integer');
		$this->form_validation->set_rules('kdalat', 'Kode Alat', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$kdalat = $this->input->post('kdalat');
			$data['dtalat'] = $this->db->get_where('data_alat', ['kd_alat' => $kdalat])->row_array();
			$this->session->set_flashdata('notifikasi', 'Perbaiki Format Data Anda!');
			$data['title'] = 'PEMINJAMAN ALAT';
			$this->load->view('tamplate/sidebar', $data);
			$this->load->view('fox', $data); // Ganti 'your_form_view' dengan nama view Anda
		} else {
			// Ambil input dari form
			$nama = $this->input->post('nama');
			$tlpn = $this->input->post('telpon');
			$nim = $this->input->post('nim');
			$mk = $this->input->post('MK');
			$dosen = $this->input->post('dosen');
			$ruangan = $this->input->post('ruangan');
			$tglPinjam = $this->input->post('tglPinjam');
			$waktuPinjam = $this->input->post('jamPenggunaan');
			$bataswaktu = $this->input->post('pengembalian');
			$jmlh = $this->input->post('jumlah');
			$kdalat = $this->input->post('kdalat');

			// Hapus nilai 0 di depan jika ada, Tambahkan kode negara Indonesia secara otomatis
			$tlpn = ltrim($tlpn, '0');
			$kode_negara = '+62';
			$full_tlpn = $kode_negara . $tlpn;

			// Konversi waktu ke format 24 jam dengan detik
			$jamPinjam = date("H:i:s", strtotime($waktuPinjam));
			$jamKembali = date("H:i:s", strtotime($bataswaktu));

			// Jalankan query
			$this->db->query("CALL loan('" . $nama . "','" . $nim . "','" . $mk . "','" . $dosen . "','" . $ruangan . "','" . $tglPinjam . "','" . $jamPinjam . "','" . $kdalat . "','" . $jmlh . "','" . $full_tlpn . "','" . $jamKembali . "')");

			// Redirect setelah sukses
			$this->session->set_flashdata('notifikasi', 'Lihat Status Pinjam pada Halaman Data Peminjaman');
			redirect(base_url('/index.php/Home/loan'));
		}
	}

	public function dtInventaris()
	{
		$data['dt_pinjam'] = $this->db->distinct()->select('id_pinjam')->get_where('alat_terpinjam')->result_array();
		$data['dt_record'] = $this->db->distinct()->select('kd_pinjam')->get_where('record')->result_array();

		$data['title'] = 'DATA INVENTARIS';
		$this->load->view('tamplate/sidebar', $data);
		$this->load->view('goals', $data);
	}

	public function aksidata()
	{
		if (isset($_GET['kdPinjam'])) {
			$kd = $_GET['kdPinjam'];
			$data = $this->db->query("SELECT * FROM tampilpeminjaman WHERE kd_pinjam = '$kd';");

			foreach ($data->result() as $row) {
				$Kode = $row->kd_pinjam;
				$Alat = $row->alat;
				$Merk = $row->merk;
				$jmlh = $row->jumlah_pinjam;

				$DataInsert = array(
					'kd_pinjam' => $Kode,
					'alat' => $Alat,
					'merk' => $Merk,
					'jumlah_pinjam' => $jmlh
				);
				$this->InsertRecord($DataInsert);
			}

			$this->DeletePinjam($kd);
			redirect(base_url('/index.php/Home/dtInventaris'));
		}
	}
}
