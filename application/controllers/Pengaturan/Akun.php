<?php defined('BASEPATH') or exit('No direct script access allowed');
class Akun extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Pengaturan/Akun_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Pengaturan";
		$data['Title'] = "Pengaturan Akun";
		$data['Breadcrumb'] = array('Pengaturan');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "pengaturan/v_akun"
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
		$isValid = $this->m->cek_validasi();
		if ($isValid) {
			if ($this->input->post('user_login') != "") {
				$data = array(
					'user_nama' => $this->input->post('user_nama'),
					'user_login' => $this->input->post('user_login'),
					'user_pass' => password_hash($this->input->post('user_pass'), PASSWORD_BCRYPT),
					'updated_by' => $this->session->userdata('nama'),
					'updated_date' => date('Y-m-d H:i:s')
				);
			} else {
				$data = array(
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
		} else {
			$pesan = array(
				'warning' => 'Gagal!',
				'kode' => 'error',
				'pesan' => 'Password lama tidak tepat'
			);
		}
		echo json_encode($pesan);
	}

	public function get_data()
	{
		$result = $this->m->get_data();
		$data = array(
			'level_id' => $result->level_id,
			'user_id' => $result->user_id,
			'user_nama' => $result->user_nama
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
}
