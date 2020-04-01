<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tags_Model', 'tags');
	}

	public function index($type = null)
	{
		echo $type;
	}

	public function list()
	{
		$data['title'] = "Daftar Tags";
		$data['tags'] = $this->tags->getAll();
		$this->form_validation->set_rules('nama', 'Nama Tag', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/tags", $data);
			$this->load->view("templates/admin_footer");
		} else {
			$data = [
				'tag' => $this->input->post('nama', true)
			];

			if ($this->tags->insert($data)) {
				flash_message('success', '<strong>Berhasil</strong> <em>menambahkan</em> data tag', 'admin/tags');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>menambahkan</em> data tag', 'admin/tags');
			}
		}
	}

	public function edit($id)
	{
		$tag = $this->tags->get($id);

		$this->form_validation->set_rules('nama', 'Nama Tag', 'required|trim|min_length[3]');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id', true)) {
				echo json_encode($tag);
			} else {
				redirect('Tags/list');
			}
		} else {
			$id = $this->input->post('id');
			$data = [
				'tag' => $this->input->post('nama', true),
				'updated_at' => date('Y-m-d H:i:s', time())
			];

			if ($this->tags->update($data, $id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data tag', 'tags/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data katalog', 'tags/list');
			}
		}
	}

	public function delete($id)
	{
		if ($this->tags->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data tag', 'tags/list');
		} else {
			flash_message('success', '<strong>Gagal</strong> <em>menghapus</em> data tag', 'tags/list');
		}
	}
}
