<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MethodPayment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MethodPayment_Model', 'MethodPayment');
	}

	public function index()
	{
	}

	public function list()
	{
		$data['title'] = "Metode Pembayaran";
		$data['methodPayments'] = $this->MethodPayment->getAll();

		$this->form_validation->set_rules('nama', 'Nama Metode Pembayaran', 'required|trim');
		$this->form_validation->set_rules('code', 'Kode', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/methodpayments');
			$this->load->view('templates/admin_footer');
		} else {
			$data = [
				'name' => $this->input->post('nama', true),
				'code' => $this->input->post('code', true)
			];

			if ($this->MethodPayment->insert($data)) {
				flash_message('success', 'Berhasil menambahkan data', 'admin/methodpayments');
			} else {
				flash_message('danger', 'Gagal menambahkan data', 'admin/methodpayments');
			}
		}
	}

	public function edit($id)
	{
		$methodPayment = $this->MethodPayment->get($id);

		$this->form_validation->set_rules('nama', 'Nama Metode Pembayaran', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('code', 'Code', 'trim');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id', true)) {
				echo json_encode($methodPayment);
			} else {
				redirect('methodPayment/list');
			}
		} else {
			$data = [
				'name' => $this->input->post('nama', true),
				'code' => $this->input->post('code', true)
			];

			if ($this->MethodPayment->update($data, $id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data metode pembayaran', 'methodPayment/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data metode pembayaran', 'methodPayment/list');
			}
		}
	}

	public function delete($id)
	{
		if ($this->MethodPayment->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data metode pembayaran', 'methodPayment/list');
		} else {
			flash_message('success', '<strong>Gagal</strong> <em>menghapus</em> data metode pembayaran', 'methodPayment/list');
		}
	}
}
