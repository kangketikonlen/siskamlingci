<?php defined('BASEPATH') or exit('No direct script access allowed');
class Modul_model extends CI_Model
{
	protected $modul = "ak_data_system_modul";

	public function get_list_data()
	{
		$this->datatables->select('modul_id, modul_urutan, modul_icon, modul_nama');
		$this->datatables->from($this->modul);
		$this->datatables->where($this->modul . '.deleted', FALSE);
		$this->datatables->add_column('view', "<a id='edit' class='text-primary' data='$1' style='cursor:pointer'><i class='fa fa-edit'></i></a> | <a id='hapus' class='text-danger' data='$1' style='cursor:pointer'><i class='fa fa-trash'></i></a>", "modul_id");
		return $this->datatables->generate();
	}

	public function get_modul()
	{
		return $this->db->where($this->modul . '.deleted', false)->where($this->modul . '.modul_id', $this->input->post('modul_id'))->or_where($this->modul . '.modul_urutan', $this->input->post('modul_urutan'))->get($this->modul)->num_rows();
	}

	public function reorder()
	{
		$this->db->where($this->modul . '.modul_id!=', $this->input->post('modul_id'));
		$this->db->where($this->modul . '.modul_urutan>=', $this->input->post('modul_urutan'));
		$this->db->set($this->modul . '.modul_urutan', '`modul_urutan`+ 1', FALSE);
		return $this->db->update($this->modul);
	}

	public function simpan($data)
	{
		return $this->db->insert($this->modul, $data);
	}

	public function get_data()
	{
		return $this->db->where($this->modul . '.deleted', false)->where($this->modul . '.modul_id', $this->input->post('modul_id'))->get($this->modul)->row();
	}

	public function edit($data)
	{
		return $this->db->where($this->modul . '.deleted', false)->where($this->modul . '.modul_id', $this->input->post('modul_id'))->update($this->modul, $data);
	}

	public function hapus($data)
	{
		return $this->db->where($this->modul . '.modul_id', $this->input->post('modul_id'))->update($this->modul, $data);
	}

	public function options($src)
	{
		$opt = $this->db->like('modul_nama', $src, 'both')->where('deleted', FALSE)->or_where('modul_id', $src)->get($this->modul)->result();

		$data = array();
		foreach ($opt as $opt) {
			$data[] = array("id" => $opt->modul_id, "text" => $opt->modul_nama);
		}

		return $data;
	}
}
