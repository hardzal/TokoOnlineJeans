<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		isLogin();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

		if ($this->form_validation->run() == false) {
			$this->load->view("auth/login");
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			$result = $this->auth->login($username, $password);

			if ($result['result']) {
				$this->session->set_userdata([
					'user_id' => $result['data']['id'],
					'role_id' => $result['data']['role_id'],
					'username' => $result['data']['username'],
				]);
				flash_message('success', $result['message'], $result['url']);
			} else {
				flash_message('danger', $result['message'], 'auth');
			}
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if ($this->form_validation->run() == false) {
			$this->load->view("auth/register");
		} else {
			$role_id = 2;

			$name = $this->input->post('nama', true);
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			$email = $this->input->post('email', true);
			$gender = $this->input->post('jenis-kelamin', true);
			$address = $this->input->post('alamat', true);
			$telp = $this->input->post('telp', true);

			$data = [
				'users' => [
					'role_id' => $role_id,
					'username' => $username,
					'email' 	=> $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'created_at' => date('Y-m-d H:i:s', time())
				],
				'user_details' => [
					'nama_lengkap' => $name,
					'jenis_kelamin' => $gender,
					'alamat' => $address,
					'telp' => $telp,
				],
			];

			$result = $this->auth->register($data);
			if ($result['result']) {
				flash_message('success', $result['message'], $result['url']);
			} else {
				flash_message('danger', $result['message'], $result['url']);
			}
		}
	}

	public function logout()
	{
		session_destroy();
		flash_message('success', 'Successfully logout!', 'auth');
	}
}
