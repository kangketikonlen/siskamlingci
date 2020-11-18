<?php defined('BASEPATH') or exit('No direct script access allowed');
class Modul extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/Modul_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Pengaturan Modul";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_modul"
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
		if ($this->input->post('modul_id') == "") {
			$data = array(
				'modul_urutan' => $this->input->post('modul_urutan'),
				'modul_icon' => $this->input->post('modul_icon'),
				'modul_nama' => $this->input->post('modul_nama'),
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
				'modul_urutan' => $this->input->post('modul_urutan'),
				'modul_icon' => $this->input->post('modul_icon'),
				'modul_nama' => $this->input->post('modul_nama'),
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
			'modul_id' => $result->modul_id,
			'modul_urutan' => $result->modul_urutan,
			'modul_icon' => $result->modul_icon,
			'modul_nama' => $result->modul_nama
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
