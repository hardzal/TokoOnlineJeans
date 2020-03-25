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

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/profile");
		$this->load->view("templates/admin_footer");
	}

	public function changePassword()
	{
		$data['title'] = "Change Password";

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/change-password");
		$this->load->view("templates/admin_footer");
	}
}
