<?php defined('BASEPATH') or exit('No direct script access allowed');
class Migration extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if (!$isLogin) {
			$this->session->sess_destroy();
			redirect('portal');
		} else {
			$this->load->model('Sistem/Migration_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Migration";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_migration"
		);
		$this->load->view('v_main', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();

		$src = './samples/database/create_table_samples.php';
		$dir = './application/database/';

		$fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
		$count = iterator_count($fi);
		$prefix = str_pad($count, 3, "0", STR_PAD_LEFT);
		$filename = strtolower(str_replace(" ", "_", $data['migration_name']));
		$dbname = strtolower("ak_data_" . str_replace(" ", "_", $data['migration_database']));
		$des = $dir . $prefix . "_create_table_" . $filename . ".php";

		copy($src, $des);

		$file_contents = file_get_contents($des);
		$file_contents = str_replace("Migration_Create_table_samples", "Migration_create_table_" . $filename, $file_contents);
		$file_contents = str_replace("ak_data_samples", $dbname, $file_contents);
		$file_contents = str_replace("samples_", $filename . "_", $file_contents);
		file_put_contents($des, $file_contents);

		$pesan = array(
			'warning' => 'Berhasil!',
			'kode' => 'success',
			'pesan' => 'Data berhasil di simpan'
		);

		echo json_encode($pesan);
	}
}