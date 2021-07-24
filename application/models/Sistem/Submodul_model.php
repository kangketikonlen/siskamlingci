<?php defined('BASEPATH') or exit('No direct script access allowed');
class Submodul_model extends CI_Model
{
	protected $modul = "ak_data_system_modul";
	protected $submodul = "ak_data_system_modul_sub";

	public function get_list_data()
	{
		$this->datatables->select('submodul_id, submodul_urutan, modul_nama, submodul_root, submodul_nama, submodul_url');
		$this->datatables->from($this->submodul);
		if ($this->input->post('modul_id') != "") {
			$this->datatables->where($this->submodul . '.modul_id', $this->input->post('modul_id'));
		}
		$this->datatables->where($this->submodul . '.deleted', FALSE);
		$this->datatables->join($this->modul, $this->modul . '.modul_id=' . $this->submodul . '.modul_id');
		$this->datatables->add_column('view', "<button id='edit' class='m-1 btn btn-sm btn-primary' data='$1'><i class='fa fa-pencil-alt'></i></button> <button id='hapus' class='m-1 btn btn-sm btn-danger' data='$1'><i class='fa fa-trash'></i></button>", "submodul_id");
		return $this->datatables->generate();
	}

	public function search_modul($id)
	{
		$this->db->where($this->modul . '.modul_id', $id);
		return $this->db->get($this->modul)->row();
	}

	public function get_submodul()
	{
		return $this->db->where($this->submodul . '.deleted', false)->where($this->submodul . '.modul_id', $this->input->post('modul_id'))->where($this->submodul . '.submodul_urutan', $this->input->post('submodul_urutan'))->get($this->submodul)->num_rows();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->submodul, $data);
	}

	public function get_data()
	{
		return $this->db->where($this->submodul . '.deleted', false)->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'))->get($this->submodul)->row();
	}

	public function edit($data)
	{
		return $this->db->where($this->submodul . '.deleted', false)->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'))->update($this->submodul, $data);
	}

	public function reorder()
	{
		$this->db->where($this->submodul . '.modul_id', $this->input->post('modul_id'));
		$this->db->where($this->submodul . '.submodul_id!=', $this->input->post('submodul_id'));
		$this->db->where($this->submodul . '.submodul_urutan>=', $this->input->post('submodul_urutan'));
		$this->db->set($this->submodul . '.submodul_urutan', '`submodul_urutan`+ 1', FALSE);
		return $this->db->update($this->submodul);
	}

	public function hapus($data)
	{
		return $this->db->where($this->submodul . '.submodul_id', $this->input->post('submodul_id'))->update($this->submodul, $data);
	}

	public function options($src)
	{
		$opt = $this->db->like('submodul_nama', $src, 'both')->where('deleted', FALSE)->or_where('submodul_id', $src)->get($this->submodul)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->submodul_id, "text" => $opt->submodul_nama);
		}

		return $data;
	}
}
