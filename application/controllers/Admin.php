<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isLogin();

		$this->load->model('Order_Model', 'order');
		$this->load->model('Payment_Model', 'payment');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['payments'] = $this->payment->getAll();

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/dashboard", $data);
		$this->load->view("templates/admin_footer");
	}

	public function payments()
	{
		$data['title'] = "Pembayaran";
		$data['payments'] = $this->payment->getAll();

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/payment", $data);
		$this->load->view("templates/admin_footer");
	}

	public function orders()
	{
		$data['title'] = "Daftar Order";
		$data['orders'] = $this->order->getAll();

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/order", $data);
		$this->load->view("templates/admin_footer");
	}

	public function editOrder()
	{
	}

	public function deleteOrder()
	{
	}

	public function profile()
	{

		$data['title'] = "Profile";

		$this->load->model('User_Model', 'user');
		$data['users'] = $this->user->get($_SESSION['user_id']);

		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim');
		// $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email');
		$this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/profile");
			$this->load->view("templates/admin_footer");
		} else {
			$user_id = $_SESSION['user_id'];

			$name = $this->input->post('nama_lengkap', true);
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

			if ($this->user->update($data, $user_id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> Profil Admin', 'Admin/profile');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> Profil Admin', 'Admin/profile');
			}
		}
	}

	public function changePassword()
	{
		$data['title'] = "Change Password";
		$this->load->model('User_Model', 'user');
		$data['users'] = $this->user->get($_SESSION['user_id']);


		$this->form_validation->set_rules('passLama', 'Password Lama', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'required|trim|min_length[4]');
		$this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[passBaru]');


		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/change-password");
			$this->load->view("templates/admin_footer");
		} else {
			$user_id = $_SESSION['user_id'];
			$password = $this->input->post('passBaru', true);

			$data = [
				'users' => [
					// 'username' => $username,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'updated_at' => date('Y-m-d H:i:s', time())
				],
			];

			if ($this->user->updatePass($data, $user_id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> Password Admin', 'Admin/changePassword');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> Password Admin', 'Admin/changePassword');
			}
		}
	}
}
