<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collection extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view("templates/header");
		$this->load->view("pages/collection");
		$this->load->view("templates/footer");
	}

	public function listJeans(){
		$this->load->view("templates/header");
		$this->load->view("pages/list-barang");
		$this->load->view("templates/footer");
	}

	public function detailJeans(){
		$this->load->view("templates/header");
		$this->load->view("pages/detail-barang");
		$this->load->view("templates/footer");
	}

}
