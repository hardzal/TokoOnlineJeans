<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// isLogin();
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/dashboard", $data);
		$this->load->view("templates/admin_footer");
	}

	public function pembayaran()
	{
		$data['title'] = "Pembayaran";

		$this->load->view("templates/admin_header");
		$this->load->view("admin/pembayaran");
		$this->load->view("templates/admin_footer");
	}

	public function order()
	{
		$data['title'] = "Daftar Order";

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/order");
		$this->load->view("templates/admin_footer");
	}

	public function profile()
	{

		$data['title'] = "Profile";

		$this->load->model('User_Model', 'user');
		$data['users'] = $this->user->get($_SESSION['user_id']);
		var_dump($data);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		// $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email');
		$this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if($this->form_validation->run() == false){
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/profile");
			$this->load->view("templates/admin_footer");
		} else {
			$user_id = $_SESSION['user_id'];

			$name = $this->input->post('nama', true);
			// $username = $this->input->post('username', true);
			// $password = $this->input->post('password', true);
			$email = $this->input->post('email', true);
			$gender = $this->input->post('jenis-kelamin', true);
			$address = $this->input->post('alamat', true);
			$telp = $this->input->post('telp', true);

			$data = [
				'users' => [
					// 'username' => $username,
					'email' 	=> $email,
					'updated_at' => date('Y-m-d H:i:s', time())
				],
				'user_details' => [
					'nama_lengkap' => $name,
					'alamat' => $address,
					'telp' => $telp,
				],
			];

			if ($this->user->update($data,$user_id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> Profil Admin', 'Admin/profile');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> Profil Admin', 'Admin/profile');
			}
		}
	}

	public function changePassword()
	{
		$data['title'] = "Change Password";

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/change-password");
		$this->load->view("templates/admin_footer");
	}
}
