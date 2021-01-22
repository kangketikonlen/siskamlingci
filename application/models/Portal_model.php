<?php defined('BASEPATH') or exit('No direct script access allowed');
class Portal_model extends CI_Model
{
	protected $user = "ak_data_system_user";
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
		$password = $this->db->where(
			'user_login',
			$this->input->post('user_login')
		)->order_by('user_id', 'desc')->get($this->user)->row('user_pass');
		return password_verify($this->input->post('user_pass'), $password);
	}

	public function search_users($data)
	{
		$this->db->join($this->level, $this->level . '.level_id=' . $this->user . '.level_id');
		if ($data['user_platform'] == "Github") {
			$this->db->where($this->user . '.user_github', $data['user_platform_id']);
		} elseif ($data['user_platform'] == "Google") {
			$this->db->where($this->user . '.user_google', $data['user_platform_id']);
		} elseif ($data['user_platform'] == "Twitter") {
			$this->db->where($this->user . '.user_twitter', $data['user_platform_id']);
		} else {
			$this->db->where($this->user . '.user_id', $data['user_platform_id']);
		}
		return $this->db->order_by('user_id', 'desc')->get($this->user)->row_array();
	}

	public function simpan($data)
	{
		return $this->db->insert($this->user, $data);
	}

	public function get_user($user_login)
	{
		return $this->db->join($this->level, $this->level . '.level_id=' . $this->user . '.level_id')->where($this->user . '.user_login', $user_login)->order_by('user_id', 'desc')->get($this->user)->row_array();
	}

	public function update_login($user_login)
	{
		return $this->db->where('user_login', $user_login)->update($this->user, array('last_login' => date('Y-m-d H:i:s')));
	}
}
