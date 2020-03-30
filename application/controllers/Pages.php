<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$this->load->view("templates/header", $data);
		$this->load->view("pages/home");
		$this->load->view("templates/footer");
	}

	public function aboutUs()
	{
		$this->load->view("templates/header");
		$this->load->view("pages/about");
		$this->load->view("templates/footer");
	}

	public function QandA()
	{
		$this->load->view("templates/header");
		$this->load->view("pages/QandA");
		$this->load->view("templates/footer");
	}

	public function promoKuy()
	{
		$this->load->view("templates/header");
		$this->load->view("pages/promoKuy");
		$this->load->view("templates/footer");
	}

	public function FAQ()
	{
		$this->load->view("templates/header");
		$this->load->view("pages/faq");
		$this->load->view("templates/footer");
	}
}
