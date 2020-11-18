<?php defined('BASEPATH') or exit('No direct script access allowed');
class Akun_model extends CI_Model
{
	protected $user = "ak_data_system_user";

	public function get_data()
	{
		return $this->db->where($this->user . '.deleted', false)->where($this->user . '.user_id', $this->session->userdata('id'))->get($this->user)->row();
	}

	public function cek_validasi()
	{
		$password = $this->db->where('user_login', $this->input->post('user_login_lama'))->order_by('user_id', 'desc')->get($this->user)->row('user_pass');

		return password_verify($this->input->post('user_pass_lama'), $password);
	}

	public function edit($data)
	{
		return $this->db->where($this->user . '.deleted', false)->where($this->user . '.user_id', $this->session->userdata('id'))->update($this->user, $data);
	}

	public function hapus($data)
	{
		return $this->db->where($this->user . '.user_id', $this->input->post('user_id'))->update($this->user, $data);
	}
}
