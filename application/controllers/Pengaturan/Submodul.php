<?php defined('BASEPATH') or exit('No direct script access allowed');
class Submodul extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/Submodul_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Pengaturan Submodul";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_submodul"
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
			$result = $this->m->get_submodul();
			$data = array(
				'modul_id' => $this->input->post('modul_id'),
				'submodul_urutan' => $this->input->post('submodul_urutan'),
				'submodul_root' => $this->input->post('submodul_root'),
				'submodul_nama' => $this->input->post('submodul_nama'),
				'submodul_url' => $this->input->post('submodul_url'),
				'created_by' => $this->session->userdata('nama'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($result > 0) {
				$this->m->reorder();
			}
			$this->m->simpan($data);
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di simpan'
			);
		} else {
			$result = $this->m->get_data();
			$data = array(
				'modul_id' => $this->input->post('modul_id'),
				'submodul_urutan' => $this->input->post('submodul_urutan'),
				'submodul_root' => $this->input->post('submodul_root'),
				'submodul_nama' => $this->input->post('submodul_nama'),
				'submodul_url' => $this->input->post('submodul_url'),
				'updated_by' => $this->session->userdata('nama'),
				'updated_date' => date('Y-m-d H:i:s')
			);
			$this->m->edit($data);
			if ($result->submodul_urutan != $this->input->post('submodul_urutan')) {
				$this->m->reorder();
			}
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
			'modul_id' => $result->modul_id,
			'submodul_urutan' => $result->submodul_urutan,
			'submodul_root' => $result->submodul_root,
			'submodul_nama' => $result->submodul_nama,
			'submodul_url' => $result->submodul_url,
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
