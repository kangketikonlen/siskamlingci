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

	public function get_data()
	{
		$result = $this->m->get_data();
		echo json_encode($result);
	}

	public function simpan()
	{
		$data = $this->input->post();
		if ($this->input->post('user_pass_baru') == "") {
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');
			unset($data['user_pass_baru']);
			$this->m->edit($data);

			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di perbarui'
			);
		} else {
			$data['user_pass'] = password_hash($data['user_pass_baru'], PASSWORD_BCRYPT);
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');
			unset($data['user_pass_baru']);
			$this->m->edit($data);

			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di perbarui & password di ubah'
			);
		}
		echo json_encode($pesan);
	}
}
