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
			$this->load->model('Sistem/Submodul_model', 'm');
		}
	}

	public function index()
	{
		$data['Root'] = "Sistem";
		$data['Title'] = "Daftar Submodul";
		$data['Breadcrumb'] = array('Sistem');
		$data['Template'] = "templates/private";
		$data['Components'] = array(
			'main' => "/v_private",
			'header' => $data['Template'] . "/components/v_header",
			'sidebar' => $data['Template'] . "/components/v_sidebar",
			'navbar' => $data['Template'] . "/components/v_navbar",
			'footer' => $data['Template'] . "/components/v_footer",
			'content' => "sistem/v_submodul"
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
		// create slug
		$modul = $this->m->search_modul($data['modul_id']);
		$string = str_replace(' ', '_', $data['submodul_root']);
		$data['submodul_url'] = strtolower($modul->modul_nama) . '/' . strtolower($string);
		//
		if ($this->input->post('submodul_id') == "") {
			$result = $this->m->get_submodul();
			$submodul = explode("/", $data['submodul_url']);
			$data['created_by'] = $this->session->userdata('nama');
			$data['created_date'] = date('Y-m-d H:i:s');

			if ($result > 0) {
				$this->m->reorder();
			}

			$this->m->simpan($data);

			$this->create_controller($data, $submodul);
			$this->create_model($submodul);
			$this->create_view($submodul);
			$this->create_js($submodul);

			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data berhasil di simpan'
			);
		} else {
			$result = $this->m->get_data();
			$data['updated_by'] = $this->session->userdata('nama');
			$data['updated_date'] = date('Y-m-d H:i:s');

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

	public function create_controller($data, $submodul)
	{
		copy(
			'./samples/controllers/samples.php',
			'./application/controllers/' . ucfirst($submodul[0]) . '/' . ucfirst($submodul[1]) . '.php'
		);

		$path_to_file = './application/controllers/' . ucfirst($submodul[0]) . '/' . ucfirst($submodul[1]) . '.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Model_folder/Samples_model", ucfirst($submodul[0]) . '/' . ucfirst($submodul[1] . '_model'), $file_contents);
		$file_contents = str_replace("Samples_controller", ucfirst($submodul[1]), $file_contents);
		$file_contents = str_replace("Samples Root", ucfirst($submodul[0]), $file_contents);
		$file_contents = str_replace("Samples Title", $data['submodul_root'], $file_contents);
		$file_contents = str_replace("samples_view/v_samples", strtolower($submodul[0]) . '/v_' . strtolower($submodul[1]), $file_contents);
		$file_contents = str_replace("Samples", ucfirst($submodul[0]), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_model($submodul)
	{
		copy(
			'./samples/models/samples_model.php',
			'./application/models/' . ucfirst($submodul[0]) . '/' . ucfirst($submodul[1]) . '_model.php'
		);

		$path_to_file = './application/models/' . ucfirst($submodul[0]) . '/' . ucfirst($submodul[1]) . '_model.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("Samples_model", ucfirst($submodul[1] . '_model'), $file_contents);
		file_put_contents($path_to_file, $file_contents);
	}

	public function create_view($submodul)
	{
		copy(
			'./samples/views/v_samples.php',
			'./application/views/' . strtolower($submodul[0]) . '/v_' . strtolower($submodul[1]) . '.php'
		);
	}

	public function create_js($submodul)
	{
		copy(
			'./samples/views/js/js_samples.php',
			'./application/views/' . strtolower($submodul[0]) . '/js/js_' . strtolower($submodul[1]) . '.php'
		);
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
