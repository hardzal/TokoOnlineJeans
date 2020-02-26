<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FAQ extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Faq_Model', 'faq');
	}

	public function index()
	{
	}

	public function list()
	{
		$data['title'] = "Data FAQ";
		$data['faqs'] = $this->faq->getAll();

		$this->form_validation->set_rules('question', 'Question', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('answer', 'Answer', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/faq', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$data = [
				'question' => $this->input->post('question', true),
				'answer' => $this->input->post('answer', true),
				'created_at' => date('Y-m-d H:i:s', time())
			];

			if ($this->faq->insert($data)) {
				flash_message('success', '<strong>Berhasil</strong> <em>menambahkan</em> data faq', 'faq/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>menambahkan</em> data faq', 'faq/list');
			}
		}
	}

	public function edit($id)
	{
		$faq = $this->faq->get($id);

		$this->form_validation->set_rules('question', 'Question', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('answer', 'Answer', 'required|trim');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id', true)) {
				echo json_encode($faq);
			} else {
				redirect('faq/list');
			}
		} else {
			$data = [
				'question' => $this->input->post('question', true),
				'answer' => $this->input->post('answer', true),
				'updated_at' => date('Y-m-d H:i:s', time())
			];

			if ($this->faq->update($data, $id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data faq', 'faq/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data faq', 'faq/list');
			}
		}
	}

	public function delete($id)
	{
		if ($this->faq->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data faq', 'faq/list');
		} else {
			flash_message('success', '<strong>Gagal</strong> <em>menghapus</em> data faq', 'faq/list');
		}
	}
}
