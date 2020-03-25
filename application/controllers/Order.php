<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_Model', 'order');
		$this->load->model('Collection_Model', 'collection');
		$this->load->model('Size_Model', 'size');
	}


	public function index()
	{
		$data['title'] = "Order Pages";

		if ($this->session->userdata('orders')) {
			$data['orders'] = $this->session->userdata('orders');
		}

		$this->form_validation->set_rules('user_id', 'User', 'trim|numeric');
		$this->form_validation->set_rules('collection_id', 'Koleksi', 'required|trim|numeric');
		$this->form_validation->set_rules('stock', 'Stok', 'required|trim|numeric');
		$this->form_validation->set_rules('size', 'Ukuran', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("templates/header", $data);
			$this->load->view("pages/shopping-cart", $data);
			$this->load->view("templates/footer");
		} else {
			$orders = array();

			if (!$this->input->post('user_id', true)) {
				flash_message('warning', 'Belum bisa melakukan order', 'order/index');
			}

			$user_id = $this->input->post('user_id', true);
			$collection_id = $this->input->post('collection_id', true);
			$stock = $this->input->post('stock', true);
			$size_id = $this->input->post('size', true);

			$collection = $this->collection->get($collection_id);
			$size = $this->size->getCollectionSize($collection_id, $size_id);

			$order = [
				'user_id' => $user_id,
				'quantity' => $stock,
				'size' => $size,
				'collection' => $collection,
			];

			array_push($orders, $order);

			if (!$this->session->userdata('orders')) {
				$this->session->set_userdata('orders', $orders);
			} else {
				$orders = $this->session->userdata('orders');
				$orders[] = $order;
				$this->session->set_userdata('orders', $orders);
				$this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil melakukan order</div>');
			}
			redirect('order/index', 'refresh');
		}
	}

	public function edit()
	{
		if (!$this->input->post('index')) {
			redirect('order');
		}
		$index = $this->input->post('index');
		$quantity = $this->input->post('quantity');
		$start = 0;

		foreach ($index as $indek) {
			$_SESSION['orders'][$indek]['quantity'] = $quantity[$start];
			$start++;
		}
		flash_message('success', 'Berhasil memperbaharui order', 'order/index');
	}

	public function delete($id)
	{
		if (!$this->session->userdata('orders')) {
			redirect('orders');
		}
		unset($_SESSION['orders'][$id]);
		flash_message('success', 'Berhasil menghapus order', 'order/index');
	}

	public function payment()
	{
		$data['title'] = "Pembayaran";

		$this->load->view("templates/header", $data);
		$this->load->view("pages/payment", $data);
		$this->load->view("templates/footer");
	}
}
