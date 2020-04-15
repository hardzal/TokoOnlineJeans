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
		$data['payment'] = $this->payment->getDetail($id_payment);

		$this->form_validation->set_rules('opsi', 'Opsi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/payment_edit', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$status = $this->input->post('opsi', true);
			$id_payment = $this->input->post('id', true);

			if ($this->payment->verify($status, $id_payment)) {
				flash_message('success', 'Berhasil menverifikasi pembayaran', 'admin/payments');
			} else {
				flash_message('danger', 'Gagal menverifikasi pembayaran', 'admin/payments');
			}
		}
	}

	public function delete($id_payment)
	{
		$payment = $this->payment->get($id_payment);
		$fileImage = $payment->picture;

		if (file_exists(FCPATH . $fileImage)) {
			if (!unlink($fileImage)) {
				flash_message('danger', '<strong>Gagal</strong> <em>Menghapus</em> file gambar!', 'admin/koleksi');
			}
		}

		if ($this->payment->delete($id_payment)) {
			unset($_SESSION['transactions']);
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data pembayaran barang!', 'admin/payments');
		} else {
			flash_message('danger', '<strong>Gagal</strong> <em>menghapus</em> data pembayaran barang!', 'admin/payments');
		}
	}
}
