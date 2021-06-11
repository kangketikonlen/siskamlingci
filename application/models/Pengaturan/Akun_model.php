<?php defined('BASEPATH') or exit('No direct script access allowed');
class Akun_model extends CI_Model
{
	protected $user = "ak_data_system_user";

	public function get_data()
	{
		$this->db->where($this->user . '.deleted', false);
		$this->db->where($this->user . '.user_id', $this->session->userdata('id'));
		return $this->db->get($this->user)->row();
	}

	public function edit($data)
	{
		$this->db->where($this->user . '.deleted', false);
		$this->db->where($this->user . '.user_id', $this->session->userdata('id'));
		return $this->db->update($this->user, $data);
	}
}
