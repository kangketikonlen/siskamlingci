<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			redirect('portal');
		} else {
			$this->load->model('Dashboard_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Dashboard";
		$data['Title'] = "Dashboard";
		$data['Breadcrumb'] = array();
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "v_dashboard"
		);
		$this->load->view('v_main', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('portal');
	}
}
