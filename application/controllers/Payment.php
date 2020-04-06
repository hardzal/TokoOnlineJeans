<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Payment_Model', 'payment');
	}

	public function verify($id_payment)
	{
		$data['title'] = "Data Pembayaran";
		$data['payment'] = $this->payment->get($id_payment);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/payment_edit', $data);
			$this->load->view('templates/admin_footer');
		} else {
			var_dump($_POST);
		}
	}

	public function delete($id_payment)
	{
	}
}
