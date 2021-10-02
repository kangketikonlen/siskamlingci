<?php defined('BASEPATH') or exit('No direct script access allowed');
class Password_encrypter_tools extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Sistem/Password_encrypter_tools_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Password Encrypter Tools";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_password_encrypter_tools"
		);
		$this->load->view('v_main', $data);
	}

	public function list_data()
	{
		header('Content-Type: application/json');
		echo $this->m->get_list_data();
	}

	public function encrypt()
	{
		$users = $this->m->get_lists();

		if (!empty($users)) {
			foreach ($users as $user) {
				$data['user_pass'] = password_hash($user->user_pass, PASSWORD_BCRYPT);
				$data['updated_by'] = $this->session->userdata('nama');
				$data['updated_date'] = date('Y-m-d H:i:s');
				$this->m->edit($user->user_id, $data);
			}
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di enkripsi'
			);
		} else {
			$pesan = array(
				'warning' => 'Gagal!',
				'kode' => 'error',
				'pesan' => 'Tidak ada data yang belum di enkripsi'
			);
		}
		echo json_encode($pesan);
	}
}
