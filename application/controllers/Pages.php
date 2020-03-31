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

	public function orderStatus()
	{
		$this->load->view("templates/header");
		$this->load->view("pages/order-status");
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

		$data['title'] = "FAQ";
		$this->load->model('Faq_Model', 'faq');
		$data['faqs'] = $this->faq->getAll();

		$this->load->view("templates/header",$data);
		$this->load->view("pages/faq");
		$this->load->view("templates/footer");
	}

	public function profile(){
		$data['title'] = "Profil Pengguna";
		$this->load->model('User_Model', 'user');
		$data['users'] = $this->user->get($_SESSION['user_id']);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		// $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]|valid_email');
		// $this->form_validation->set_rules('jenis-kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim|numeric|min_length[10]|max_length[12]');

		if($this->form_validation->run() == false){
			$this->load->view("templates/header",$data);
			$this->load->view("pages/profile");
			$this->load->view("templates/footer");
		} else {
			$user_id = $_SESSION['user_id'];

			$name = $this->input->post('nama', true);
			// $username = $this->input->post('username', true);
			// $password = $this->input->post('password', true);
			$email = $this->input->post('email', true);
			// $gender = $this->input->post('jenis-kelamin', true);
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
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> Profil Pengguna', 'pages/profile');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> Profil Pengguna', 'pages/profile');
			}
		}
	}

	public function ubahPassword(){
		$data['title'] = "Profil Pengguna";
		$this->load->model('User_Model', 'user');
		$data['users'] = $this->user->get($_SESSION['user_id']);


		$this->load->view("templates/header",$data);
		$this->load->view("pages/ubah-password");
		$this->load->view("templates/footer");
	}
}
