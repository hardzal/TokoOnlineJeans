<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	private const ROLE_ADMIN = 1;
	private const ROLE_USER = 2;

	public function login($username, $password)
	{
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$url = 'pages';

				if ($user['role_id'] == $this::ROLE_ADMIN) {
					$url = 'admin';
				} else if ($user['role_id'] == $this::ROLE_USER) {
					$url = 'customer';
				}

				return [
					'data' => $user,
					'message' => 'Login successfully!',
					'result' => true,
					'url' => $url
				];
			} else {
				return [
					'message' => 'Login failed, <strong>username</strong> and <strong>password</strong> not match!',
					'result' => false
				];
			}
		} else {
			return [
				'message' => 'Login failed, <strong>username</strong> not found!',
				'result' => false
			];
		}
	}

	public function register($data)
	{
		$this->db->trans_start();
		$this->db->insert('users', $data['users']);
		$data['user_details']['user_id'] = $this->db->insert_id();
		$this->db->insert('user_details', $data['user_details']);
		$this->db->trans_complete();

		if ($this->session->userdata('user_id') == $this::ROLE_ADMIN) {
			$url = base_url('user/index');
			$message = 'Berhasil menambahkan data customer!';
		} else {
			$url = base_url('auth/register');
			$message = 'Successfully to register!, you can <a href="' . base_url('auth/login') . '">Login</a> now';
		}

		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();

			return [
				'result' => false,
				'message' => 'Gagal mendaftar sebagai customer',
				'url' => $url,
			];
		} else {
			$this->db->trans_commit();

			return [
				'result' => true,
				'message' => $message,
				'url' => $url,
			];
		}
	}
}
