<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/dashboard");
		$this->load->view("templates/admin_footer");
	}

	public function katalog(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/katalog");
		$this->load->view("templates/admin_footer");
	}

	public function koleksi(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/koleksi");
		$this->load->view("templates/admin_footer");
	}

	public function set_admin(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/set_admin");
		$this->load->view("templates/admin_footer");
	}

	public function set_user(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/set_user");
		$this->load->view("templates/admin_footer");
	}

	public function pembayaran(){
		$this->load->view("templates/admin_header");
		$this->load->view("admin/pembayaran");
		$this->load->view("templates/admin_footer");
	}
}
