<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Catalog_Model', 'catalog');
	}

	public function index()
	{
	}

	public function list()
	{
		$data['title'] = "Daftar Katalog";
		$data['catalogs'] = $this->catalog->getAll();
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[5]');

		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/katalog", $data);
			$this->load->view("templates/admin_footer");
		} else {
			$data = [
				'name' => $this->input->post('nama', true),
				'description' => $this->input->post('deskripsi', true)
			];

			if ($this->catalog->insert($data)) {
				flash_message('success', '<strong>Berhasil</strong> <em>menambahkan</em> data katalog', 'catalog/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>menambahkan</em> data katalog', 'catalog/list');
			}
		}
	}

	public function edit($id)
	{
		$catalog = $this->catalog->get($id);
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|min_length[5]');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id', true)) {
				echo json_encode($catalog);
			} else {
				redirect('catalog/index');
			}
		} else {
			$id = $this->input->post('id');
			$data = [
				'name' => $this->input->post('nama', true),
				'description' => $this->input->post('deskripsi', true),
				'updated_at' => date('Y-m-d H:i:s', time())
			];

			if ($this->catalog->update($data, $id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data katalog', 'catalog/list');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data katalog', 'catalog/list');
			}
		}
	}

	public function delete($id)
	{
		if ($this->catalog->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data katalog', 'catalog/list');
		} else {
			flash_message('success', '<strong>Gagal</strong> <em>menghapus</em> data katalog', 'catalog/list');
		}
	}
}
