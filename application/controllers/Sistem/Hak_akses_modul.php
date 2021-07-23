<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses_modul extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			redirect('portal');
		} else {
			$this->load->model('Sistem/Hak_akses_modul_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Daftar Hak Akses Modul";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => 'sistem/v_hak_akses_modul'
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}

	public function simpan()
	{
		$data = $this->input->post();
		$data['updated_by'] = $this->session->userdata('nama');
		$data['updated_date'] = date('Y-m-d H:i:s');

		$this->m->edit($data);

		$pesan = array(
			'warning' => 'Berhasil!',
			'kode' => 'success',
			'pesan' => 'Data berhasil di perbarui'
		);
		echo json_encode($pesan);
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}
}