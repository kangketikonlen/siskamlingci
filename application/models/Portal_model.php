<?php defined('BASEPATH') or exit('No direct script access allowed');
class Portal_model extends CI_Model
{
	protected $user = "ak_data_system_user";
	protected $user_member = "ak_data_system_user_member";
	protected $level = "ak_data_system_level";
	protected $info = "ak_data_system_info";
	protected $instansi = "ak_data_system_instansi";

	public function get_sysinfo()
	{
		return $this->db->get($this->info)->row();
	}

	public function get_instansi()
	{
		return $this->db->get($this->instansi)->row();
	}

	public function cek_validasi()
	{
		$this->db->where('user_login', $this->input->post('user_login'));
		$this->db->order_by('user_id', 'desc');
		$password = $this->db->get($this->user)->row('user_pass');

		return password_verify($this->input->post('user_pass'), $password);
	}

	public function search_users($data)
	{
		$this->db->join($this->level, $this->level . '.level_id=' . $this->user_member . '.level_id');
		$this->db->where($this->user_member . '.user_member_platform_id', $data['user_platform_id']);
		$this->db->where($this->user_member . '.user_member_platform', $data['user_platform']);
		return $this->db->get($this->user_member)->row_array();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->user, $data);
	}

	public function simpan_member($data)
	{
		return $this->db->insert($this->user_member, $data);
	}

	public function get_user($user_login)
	{
		return $this->db->join($this->level, $this->level . '.level_id=' . $this->user . '.level_id')->where($this->user . '.user_login', $user_login)->order_by('user_id', 'desc')->get($this->user)->row_array();
	}

	public function update_login($user_login)
	{
		return $this->db->where('user_login', $user_login)->update($this->user, array('last_login' => date('Y-m-d H:i:s')));
	}

	public function update_login_member($user_login)
	{
		return $this->db->where('user_member_login', $user_login)->update($this->user_member, array('last_login' => date('Y-m-d H:i:s')));
	}
}
