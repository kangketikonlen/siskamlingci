<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/Hak_akses_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Pengaturan Hak Akses";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_hak_akses"
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
		if ($this->input->post('submodul_id') == "") {
			$data = array(
				'submodul_roles' => $this->input->post('submodul_roles'),
				'created_by' => $this->session->userdata('nama'),
				'created_date' => date('Y-m-d H:i:s')
			);
			$this->m->simpan($data);
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di simpan'
			);
		} else {
			$data = array(
				'submodul_roles' => $this->input->post('submodul_roles'),
				'updated_by' => $this->session->userdata('nama'),
				'updated_date' => date('Y-m-d H:i:s')
			);
			$this->m->edit($data);
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di perbarui'
			);
		}
		echo json_encode($pesan);
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		$data = array(
			'submodul_id' => $result->submodul_id,
			'submodul_roles' => $result->submodul_roles,
		);
		echo json_encode($data);
	}

	public function hapus()
	{
		$data = array(
			'deleted' => TRUE,
			'updated_by' => $this->session->userdata('nama'),
			'updated_date' => date('Y-m-d H:i:s')
		);
		$this->m->hapus($data);
		$pesan = array(
			'warning' => 'Berhasil!',
			'kode' => 'success',
			'pesan' => 'Data berhasil di hapus!'
		);
		echo json_encode($pesan);
	}

	public function options()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->m->options($searchTerm);
		echo json_encode($response);
	}
}
