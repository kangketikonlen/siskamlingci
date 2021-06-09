<?php defined('BASEPATH') or exit('No direct script access allowed');
class Fitur extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/Fitur_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Akses Fitur";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => 'pengaturan/v_fitur'
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
		$data = array(
			'level_show_landing' => $this->input->post('level_show_landing'),
			'updated_by' => $this->session->userdata('nama'),
			'updated_date' => date('Y-m-d H:i:s')
		);
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
		$data = array(
			'level_id' => $result->level_id,
			'level_nama' => $result->level_nama,
			'level_show_landing' => $result->level_show_landing
		);
		echo json_encode($data);
	}
}
