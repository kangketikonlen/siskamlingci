<?php defined('BASEPATH') or exit('No direct script access allowed');
class Menu_utama extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Sistem/Menu_utama_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Menu Utama";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_menu_utama"
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
		if ($this->input->post('menu_id') == "") {
			$result = $this->m->get_menu();
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			if ($result > 0) {
				$this->m->reorder();
			}

			$this->m->simpan($data);

			if (!file_exists('./application/controllers/' . ucfirst($data['menu_nama']))) {
				mkdir('./application/controllers/' . ucfirst($data['menu_nama']), 0777, true);
			}

			if (!file_exists('./application/models/' . ucfirst($data['menu_nama']))) {
				mkdir('./application/models/' . ucfirst($data['menu_nama']), 0777, true);
			}

			if (!file_exists('./application/views/' . strtolower($data['menu_nama']))) {
				mkdir('./application/views/' . strtolower($data['menu_nama']), 0777, true);
			}

			if (!file_exists('./application/views/' . strtolower($data['menu_nama'] . '/js/'))) {
				mkdir('./application/views/' . strtolower($data['menu_nama'] . '/js/'), 0777, true);
			}

			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di simpan'
			);
		} else {
			$result = $this->m->get_data();
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');

			if ($result->menu_urutan != $this->input->post('menu_urutan')) {
				$this->m->reorder();
			}

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
		echo json_encode($result);
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
