<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model', 'user');
		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		$data['title'] = "Data User";
		$data['users'] = $this->user->getAll();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("user/index", $data);
			$this->load->view("templates/admin_footer");
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

	public function edit($id)
	{
		$user = $this->user->get($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');

		if (isset($_POST['password']) && !empty($_POST['password'])) {
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email');
		$this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id', true)) {
				echo json_encode($user);
			} else {
				redirect('user/index');
			}
		} else {
			$id = $this->input->post('user_id');

			$name = $this->input->post('nama', true);
			$username = $this->input->post('username', true);

			$email = $this->input->post('email', true);
			$gender = $this->input->post('jenis-kelamin', true);
			$address = $this->input->post('alamat', true);
			$telp = $this->input->post('telp', true);

			$data = [
				'users' => [
					'username' => $username,
					'email' 	=> $email,
					'updated_at' => date('Y-m-d H:i:s', time())
				],
				'user_details' => [
					'nama_lengkap' => $name,
					'jenis_kelamin' => $gender,
					'alamat' => $address,
					'telp' => $telp
				],
			];

			if (isset($_POST['password']) && !empty($_POST['password'])) {
				$password = $this->input->post('password', true);
				$user['users']['password'] = $password;
			}

			if ($this->user->update($data, $id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data customer', 'user/index');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data customer', 'user/index');
			}
		}
	}

	public function delete($id)
	{
		if ($this->user->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data customer', 'user/index');
		} else {
			flash_message('success', '<strong>Gagal</strong> <em>menghapus</em> data customer', 'user/index');
		}
	}
}
