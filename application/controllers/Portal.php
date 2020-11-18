<?php defined('BASEPATH') or exit('No direct script access allowed');
class Portal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if ($isLogin) {
			redirect('dashboard');
		} else {
			$this->load->model('Portal_model', 'm');
		}
	}

	public function index()
	{
		$data['Title'] = "Portal";
		$data['Template'] = "templates/public";
		$data['Components'] = array(
			'main' => "/v_public",
			'header' => $data['Template'] . "/components/v_header",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "v_portal"
		);
		$this->load->view('v_main', $data);
	}

	public function proses_login()
	{
		$isValid = $this->m->cek_validasi();
		if ($isValid) {
			$data = $this->m->get_user();
			$session = array(
				'id' => $data->user_id,
				'level_id' => $data->level_id,
				'nama' => $data->user_nama,
				'level' => $data->level_nama,
				'AppInfo' => $this->m->get_sysinfo()->info_name,
				'DevInfo' => $this->m->get_sysinfo()->info_devs,
				'UrlDev' => $this->m->get_sysinfo()->info_devs_url,
				'LoggedIn' => TRUE
			);
			$this->session->set_userdata($session);
			$this->m->update_login();
			$pesan = array(
				'warning' => 'Akses diterima!',
				'kode' => 'success',
				'pesan' => 'Berhasil masuk ke dalam sistem!'
			);
		} else {
			$pesan = array(
				'warning' => 'Akses ditolak!',
				'kode' => 'error',
				'pesan' => 'Gagal masuk ke dalam sistem!'
			);
		}
		echo json_encode($pesan);
	}
}
