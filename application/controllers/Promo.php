<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Promo_Model', 'promo');
		$this->load->model('Voucher_Model', 'voucher');
	}

	public function index()
	{
	}

	public function list()
	{
		$data['title'] = "Data Promo";
		$data['promotes'] = $this->promo->getAll();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/promotes', $data);
		$this->load->view('templates/admin_footer');
	}

	public function detail($promo_id)
	{
		$data['title'] = "Data User Promo";
		$data['user_promotes'] = $this->promo->getPromoUser($promo_id);
		$data['promo'] = $this->promo->get($promo_id);

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/user_promotes');
		$this->load->view('templates/admin_footer');
	}

	public function create()
	{
		$data['title'] = "Data Promo | Create";

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('persen', 'Persen', 'required|trim|numeric');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('voucher[]', 'Kode Voucher', 'required|trim');
		$this->form_validation->set_rules('syarat[]', 'Syarat', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('start_at', 'Tanggal Mulai', 'required|trim');
		$this->form_validation->set_rules('end_at', 'Tanggal Selesai', 'required|trim');

		if (empty($_FILES['image']['name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required|trim');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/promotes_insert');
			$this->load->view('templates/admin_footer');
		} else {
			$syarat = implode("|", $this->input->post('syarat', true));

			$data = [
				'promo' => [
					'title' => $this->input->post('title', true),
					'description' => $this->input->post('description', true),
					'start_at' => $this->input->post('start_at', true),
					'end_at' => $this->input->post('end_at', true),
					'persen' => $this->input->post('persen', true),
					'status' => $this->input->post('status', true),
					'syarat' => $syarat,
				],
				'voucher' => $this->input->post('voucher', true)
			];

			if (!empty($_FILES['image']['tmp_name'])) {
				$file_name = explode('.', $_FILES['image']['name']);
				$image_name = strtolower($file_name[0] . "-" . time() . "." . $file_name[1]);

				$config['file_name'] = $image_name;
				$config['allowed_types'] = "gif|jpg|png|jfif|bmp";
				$config['max_size'] = 2048;
				$config['upload_path'] = "./assets/images/promotes/";
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image', $config)) {
					flash_message('danger', '<strong>Gagal</strong> Mengupload gambar : ' . $this->upload->display_errors('<p class="text-danger">', '</p>'), 'admin/promotes');
				}
				$data['promo']['img'] = $image_name;
			}

			if ($this->promo->insert($data)) {
				flash_message('success', 'Berhasil menambah data promo!', 'admin/promotes');
			} else {
				flash_message('danger', 'Gagal menambah data promo!', 'admin/promotes');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = "Data Promo | Edit";
		$data['promo'] = $this->promo->get($id);
		$data['vouchers'] = $this->voucher->getByPromoId($id);

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('persen', 'Persen', 'required|trim|numeric');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('voucher[]', 'Kode Voucher', 'required|trim');
		$this->form_validation->set_rules('syarat[]', 'Syarat', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('start_at', 'Tanggal Mulai', 'required|trim');
		$this->form_validation->set_rules('end_at', 'Tanggal Selesai', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('admin/promotes_edit', $data);
			$this->load->view('templates/admin_footer');
		} else {

			$syarat = implode("|", $this->input->post('syarat', true));

			$data = [
				'promo' => [
					'title' => $this->input->post('title', true),
					'description' => $this->input->post('description', true),
					'start_at' => $this->input->post('start_at', true),
					'end_at' => $this->input->post('end_at', true),
					'persen' => $this->input->post('persen', true),
					'status' => $this->input->post('status', true),
					'syarat' => $syarat,
				],
				'vouchers' => [
					'voucher' => $this->input->post('voucher', true),
					'voucher_id' => $this->input->post('voucher_id', true)
				]
			];

			if (!empty($_FILES['image']['tmp_name'])) {
				$file_name = explode('.', $_FILES['image']['name']);
				$image_name = strtolower($file_name[0] . "-" . time() . "." . $file_name[1]);

				$config['allowed_types'] = "gif|jpg|png|jfif|bmp";
				$config['max_size'] = 2048;
				$config['upload_path'] = "./assets/images/promotes/";
				$config['file_name'] = $image_name;

				$this->load->library('upload', $config);

				$promo = $this->promo->get($id);

				if (file_exists(FCPATH . $config['upload_path'] . $promo->img)) {
					if (!unlink($config['upload_path'] . $promo->img)) {
						flash_message('danger', '<strong>Gagal</strong> menghapus gambar lama!', 'admin/promotes');
					}
				}

				if (!$this->upload->do_upload('image', $config)) {
					flash_message('danger', '<strong>Gagal</strong> Mengupload gambar : ' . $this->upload->display_errors('<p class="text-danger">', '</p>'), 'admin/koleksi');
				}

				$data['promo']['img'] = $image_name;
			}

			if ($this->promo->update($data, $id)) {
				flash_message('success', 'Berhasil memperbaharui data promo!', 'admin/promotes');
			} else {
				flash_message('danger', 'Gagal memperbaharui data promo!', 'admin/promotes');
			}
		}
	}

	public function delete($id)
	{
		$promo = $this->promo->get($id);
		$fileImage = 'assets\images\promotes\\' . $promo->img;

		if (file_exists(FCPATH . $fileImage)) {
			if (!unlink($fileImage)) {
				flash_message('danger', '<strong>Gagal</strong> <em>Menghapus</em> file gambar!', 'admin/promotes');
			}
		}

		if ($this->promo->delete($id)) {
			flash_message('success', '<strong>Berhasil</strong> <em>menghapus</em> data promo!', 'admin/promotes');
		} else {
			flash_message('danger', '<strong>Gagal</strong> <em>menghapus</em> data promo!', 'admin/promotes');
		}
	}
}
