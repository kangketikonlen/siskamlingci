<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hak_akses_model extends CI_Model
{
	protected $level = "ak_data_system_level";
	protected $modul = "ak_data_system_modul";
	protected $submodul = "ak_data_system_modul_sub";

	public function get_list_data()
	{
		$this->datatables->select('submodul_id, modul_nama, submodul_root, submodul_nama, submodul_roles');
		$this->datatables->from($this->submodul);
		if ($this->input->post('modul_id') != "") {
			$this->datatables->where($this->submodul . '.modul_id', $this->input->post('modul_id'));
		}
		$this->datatables->where($this->submodul . '.deleted', FALSE);
		$this->datatables->join($this->modul, $this->modul . '.modul_id=' . $this->submodul . '.modul_id');
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button>", "submodul_id");
		return $this->datatables->generate();
	}

	public function get_level()
	{
		$this->db->where($this->level . '.deleted', FALSE);
		$this->db->where($this->level . '.level_id!=', 1);
		return $this->db->get($this->level)->result();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->submodul, $data);
	}

	public function simpan_modul($data)
	{
		return $this->db->insert($this->modul, $data);
	}

	public function get_data()
	{
		$this->db->where($this->submodul . '.deleted', false);
		$this->db->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'));
		return $this->db->get($this->submodul)->row();
	}

	public function get_data_modul()
	{
		$this->db->where($this->modul . '.deleted', false);
		$this->db->where($this->modul . '.modul_id', $this->input->post('modul_id'));
		return $this->db->get($this->modul)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->submodul . '.deleted', false);
		$this->db->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'));
		return $this->db->update($this->submodul, $data);
	}

	public function edit_modul($data)
	{
		$this->db->where($this->modul . '.deleted', false);
		$this->db->where($this->modul . '.modul_id', $this->input->post('modul_id'));
		return $this->db->update($this->modul, $data);
	}

	public function hapus($data)
	{
		$this->db->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'));
		return $this->db->update($this->submodul, $data);
	}

	public function options($src)
	{
		$this->db->like('submodul_nama', $src, 'both');
		$this->db->where('deleted', FALSE);
		$this->db->or_where('submodul_id', $src);
		$opt = $this->db->get($this->submodul)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->submodul_id, "text" => $opt->submodul_nama);
		}

		return $data;
	}
}
