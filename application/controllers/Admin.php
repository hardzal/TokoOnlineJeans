<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$this->load->view("templates/admin_header", $data);
		$this->load->view("admin/dashboard", $data);
		$this->load->view("templates/admin_footer");
	}

	public function set_admin()
	{
		$this->load->view("templates/admin_header");
		$this->load->view("admin/set_admin");
		$this->load->view("templates/admin_footer");
	}

	public function set_user()
	{
		$this->load->view("templates/admin_header");
		$this->load->view("admin/set_user");
		$this->load->view("templates/admin_footer");
	}

	public function pembayaran()
	{
		$this->load->view("templates/admin_header");
		$this->load->view("admin/pembayaran");
		$this->load->view("templates/admin_footer");
	}

	public function order()
	{
		$this->load->view("templates/admin_header");
		$this->load->view("admin/order");
		$this->load->view("templates/admin_footer");
	}

	public function katalog()
	{
		redirect('admin/katalog');
	}

	public function koleksi()
	{
		redirect('admin/koleksi');
	}
}
