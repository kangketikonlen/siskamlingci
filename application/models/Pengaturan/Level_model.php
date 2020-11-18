<?php defined('BASEPATH') or exit('No direct script access allowed');
class Level_model extends CI_Model
{
	protected $level = "ak_data_system_level";

	public function get_list_data()
	{
		$this->datatables->select('level_id, level_nama');
		$this->datatables->from($this->level);
		$this->datatables->where($this->level . '.deleted', FALSE);
		$this->datatables->where($this->level . '.level_id!=', 1);
		$this->datatables->add_column('view', "<a id='edit' class='text-primary' data='$1' style='cursor:pointer'><i class='fa fa-edit'></i></a>", "level_id");
		return $this->datatables->generate();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->level, $data);
	}

	public function get_data()
	{
		return $this->db->where($this->level . '.deleted', false)->where($this->level . '.level_id', $this->input->post('level_id'))->get($this->level)->row();
	}

	public function edit($data)
	{
		return $this->db->where($this->level . '.deleted', false)->where($this->level . '.level_id', $this->input->post('level_id'))->update($this->level, $data);
	}

	public function hapus($data)
	{
		return $this->db->where($this->level . '.level_id', $this->input->post('level_id'))->update($this->level, $data);
	}

	public function options($src)
	{
		$opt = $this->db->like('level_nama', $src, 'both')->where('deleted', FALSE)->where('level_id!=', 1)->get($this->level)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->level_id, "text" => $opt->level_nama);
		}

		return $data;
	}
}
