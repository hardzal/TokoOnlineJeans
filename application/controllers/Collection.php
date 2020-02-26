<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collection extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collection_Model', 'collection');
		$this->load->model('Catalog_Model', 'catalog');
	}

	public function list()
	{
		$data['title'] = "Data Koleksi";
		$data['collections'] = $this->collection->getAll();
		$data['catalogs'] = $this->catalog->getAll();

		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('katalog', 'Katalog', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if (empty($_FILES['image']['tmp_name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required|trim');
		}

		if ($this->form_validation->run() == false) {
			$this->load->view("templates/admin_header", $data);
			$this->load->view("admin/koleksi", $data);
			$this->load->view("templates/admin_footer");
		} else {
			$config['allowed_types'] = "gif|jpg|png|jfif|bmp";
			$config['max_size'] = 2048;
			$config['upload_path'] = "./assets/images/collections/";

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image', $config)) {
				$image_name = $this->upload->data('file_name');
			} else {
				flash_message('danger', '<strong>Gagal</strong> Mengupload gambar : ' . $this->upload->display_errors('<p class="text-danger">', '</p>'), 'admin/koleksi');
			}

			$data = [
				'catalog_id' => $this->input->post('katalog', true),
				'name' => $this->input->post('nama_barang', true),
				'img' => $image_name,
				'description' => $this->input->post('deskripsi', true),
				'price' => $this->input->post('harga', true),
				'stock' => $this->input->post('stok', true),
				'created_at' => date('Y-m-d H:i:s', time())
			];

			if ($this->collection->insert($data)) {
				flash_message('success', '<strong>Berhasil</strong> <em>menambahkan</em> data koleksi barang!', 'admin/koleksi');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>menambahkan</em> data koleksi barang!', 'admin/koleksi');
			}
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('katalog', 'Katalog', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('id')) {
				echo json_encode($this->collection->get($this->input->post('id', true)));
			} else {
				redirect('admin/koleksi');
			}
		} else {
			$collection_id = $this->input->post('koleksi_id', true);

			$data = [
				'catalog_id' => $this->input->post('katalog', true),
				'name' => $this->input->post('nama_barang', true),
				'description' => $this->input->post('deskripsi', true),
				'price' => $this->input->post('harga', true),
				'stock' => $this->input->post('stok', true),
				'updated_at' => date('Y-m-d H:i:s', time())
			];

			if (!empty($_FILES['image']['tmp_name'])) {
				$config['allowed_types'] = "gif|jpg|png|jfif|bmp";
				$config['max_size'] = 2048;
				$config['upload_path'] = "./assets/images/collections/";

				$this->load->library('upload', $config);
				$collection = $this->collection->get($collection_id);

				if (file_exists(FCPATH . $config['upload_path'] . $collection->img)) {
					if (!unlink($config['upload_path'] . $collection->img)) {
						flash_message('danger', '<strong>Gagal</strong> menghapus gambar lama!', 'admin/koleksi');
					}
				}

				if ($this->upload->do_upload('image', $config)) {
					$image_name = $this->upload->data('file_name');
				} else {
					flash_message('danger', '<strong>Gagal</strong> Mengupload gambar : ' . $this->upload->display_errors('<p class="text-danger">', '</p>'), 'admin/koleksi');
				}

				$data['img'] = $image_name;
			}

			if ($this->collection->update($data, $collection_id)) {
				flash_message('success', '<strong>Berhasil</strong> <em>memperbaharui</em> data koleksi barang!', 'admin/koleksi');
			} else {
				flash_message('danger', '<strong>Gagal</strong> <em>memperbaharui</em> data koleksi barang!', 'admin/koleksi');
			}
		}
	}

	public function delete($id)
	{
		$collection = $this->collection->get($id);
		$fileImage = 'assets\images\collections\\' . $collection->img;

		if (file_exists(FCPATH . $fileImage)) {
			if (!unlink($fileImage)) {
				flash_message('danger', '<strong>Gagal</strong> <em>Menghapus</em> file gambar!', 'admin/koleksi');
			}
		}

		if ($this->collection->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data koleksi barang!', 'admin/koleksi');
		} else {
			flash_message('danger', '<strong>Gagal</strong> <em>menghapus</em> data koleksi barang!', 'admin/koleksi');
		}
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
