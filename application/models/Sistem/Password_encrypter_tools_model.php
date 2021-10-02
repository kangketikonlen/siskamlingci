<?php defined('BASEPATH') or exit('No direct script access allowed');
class Password_encrypter_tools_model extends CI_Model
{
	protected $user = "ak_data_system_user";

	public function get_list_data()
	{
		$this->datatables->select('user_id, user_nama, user_pass');
		$this->datatables->from($this->user);
		$this->datatables->where($this->user . '.deleted', FALSE);
		$this->datatables->where($this->user . '.level_id>', 2);
		return $this->datatables->generate();
	}

	public function get_lists()
	{
		$this->db->not_like($this->user . '.user_pass', "$2y$", "AFTER");
		return $this->db->get($this->user)->result();
	}

	public function edit($id, $data)
	{
		$this->db->where($this->user . '.user_id', $id);
		return $this->db->update($this->user, $data);
	}
}
