<?php defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/User_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Pengaturan User";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_user"
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
		if ($this->input->post('user_id') == "") {
			$data = array(
				'level_id' => $this->input->post('level_id'),
				'user_nama' => $this->input->post('user_nama'),
				'user_login' => $this->input->post('user_login'),
				'user_pass' => password_hash($this->input->post('user_pass'), PASSWORD_BCRYPT),
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
			if ($this->input->post('user_pass') != "") {
				$data = array(
					'level_id' => $this->input->post('level_id'),
					'user_nama' => $this->input->post('user_nama'),
					'user_login' => $this->input->post('user_login'),
					'user_pass' => password_hash($this->input->post('user_pass'), PASSWORD_BCRYPT),
					'updated_by' => $this->session->userdata('nama'),
					'updated_date' => date('Y-m-d H:i:s')
				);
			} else {
				$data = array(
					'level_id' => $this->input->post('level_id'),
					'user_nama' => $this->input->post('user_nama'),
					'updated_by' => $this->session->userdata('nama'),
					'updated_date' => date('Y-m-d H:i:s')
				);
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
