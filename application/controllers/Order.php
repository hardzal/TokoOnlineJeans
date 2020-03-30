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
		$this->load->model('MethodPayment_Model', 'methodpayment');
		$this->load->model('User_Model', 'user');
		$this->load->model('Payment_Model', 'payment');
	}


	public function index()
	{
		$data['title'] = "Order Pages";
		$data['sizes'] = $this->size->getAll();

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

			// status transactions
			// 0 = belum checkout, 1 = sudah checkout, belum terkonfirmasi, 2 = konfirmasi sudah bayar
			array_push($orders, $order);

			if (!$this->session->userdata('orders')) {
				$this->session->set_userdata('orders', $orders);
				$this->session->set_userdata('checkout', 0);
				$this->session->set_userdata('transactions', 0);
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
		$size_id = $this->input->post('size_id');

		$start = 0;

		foreach ($index as $indek) {
			$_SESSION['orders'][$indek]['quantity'] = $quantity[$start];
			$_SESSION['orders'][$indek]['size']->size_id = $size_id[$start];
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

	public function checkout()
	{
		if (!$this->session->userdata('orders')) {
			redirect('order/index');
		}

		$this->session->set_userdata('checkout', 1);
		$this->session->set_userdata('transactions', 1);
		$time = time() + (5 * 60);
		$this->session->set_userdata('order_late', $time);

		flash_message('primary', 'Silahkan isi data pembayaran untuk kemudian melakukan pembayaran', 'order/payment');
	}

	public function payment()
	{
		$data['title'] = "Pembayaran";

		if ($this->session->userdata('orders')) {
			$data['code_payment'] = time() . random_str(6, '0123456789');
			$data['user'] = $this->user->get($this->session->userdata('orders')[0]['user_id']);
			$data['orders'] = $this->session->userdata('orders');
			$data['methodPayments'] = $this->methodpayment->getAll();

			if ($this->session->userdata('transactions') != 2) {
				if ($this->session->userdata('order_late') < time()) {
					unset($_SESSION['payment_id']);
					unset($_SESSION['orders']);
					unset($_SESSION['transactions']);
					unset($_SESSION['order_late']);

					flash_message('danger', 'Anda telah melebihi batas waktu konfirmasi pembayaran', 'order/payment');
				}
			}
		}

		$this->form_validation->set_rules('paymentCode', 'Kode Pembayaran', 'required|trim');
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('address[]', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('paymentMethod', 'Metode Pembayaran', 'required|trim');

		if (empty($_FILES['image']['tmp_name'])) {
			$this->form_validation->set_rules('image', 'Image', 'required|trim');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("templates/header", $data);
			$this->load->view("pages/payment", $data);
			$this->load->view("templates/footer");
		} else {
			if ($this->session->userdata('transactions') != 2) {
				if ($this->session->userdata('order_late') < time()) {
					flash_message('danger', 'Anda telah melebihi batas waktu konfirmasi pembayaran', 'order/payment');
				}
			}

			$quantity = $this->input->post('quantity', true);
			$address = $this->input->post('address', true);
			$size_id = $this->input->post('size_id', true);

			$name = $this->input->post('name', true);
			$hp = $this->input->post('hp', true);
			$payment_code = $this->input->post('paymentCode', true);

			$collection_id = $this->input->post('collection_id', true);
			$total_quantity = $this->input->post('total_quantity', true);
			$total_price = $this->input->post('total_price', true);
			$paymentMethod = $this->input->post('paymentMethod', true);

			$file_name = explode('.', $_FILES['image']['name']);
			$image_name = strtolower($file_name[0] . "-" . time() . "." . $file_name[1]);
			$config['file_name'] = $image_name;
			$config['allowed_types'] = "jpg|png|jfif|bmp";
			$config['max_size'] = 2048;
			$config['upload_path'] = "./assets/images/screenshots/";

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image', $config)) {
				flash_message('danger', '<strong>Gagal</strong> Mengunggah gambar : ' . $this->upload->display_errors('<p class="text-danger">', '</p>'), 'order/payment');
			}

			$data = [
				'payment' => [
					'paymentCode' => $payment_code,
					'paymentMethod_id' => $paymentMethod,
					'customerName' => $name,
					'hp' => $hp,
					'total_quantity' => $total_quantity,
					'total_price' => $total_price,
					'status' => 0,
					'picture' => $image_name,
				],
				'order' => [
					'collection_id' => $collection_id,
					'user_id' => $this->session->userdata('user_id'),
				],
				'order_details' => [
					'address' => $address,
					'size_id' => $size_id,
					'quantity' => $quantity
				]
			];

			if ($this->order->insertConfirmation($data)) {
				$this->session->set_userdata('transactions', 2);
				flash_message('success', 'Berhasil melakukan checkout', 'order/orderstatus');
			} else {
				flash_message('danger', 'Gagal melakukan checkout', 'order/orderstatus');
			}
		}
	}

	public function orderStatus()
	{
		$data['title'] = "Status Pembayaran";

		$data['payment'] = $this->payment->get($this->session->userdata('payment_id'));
		$data['orders'] = $this->order->getOrdersByPaymentId($this->session->userdata('payment_id'));

		$this->load->view("templates/header", $data);
		$this->load->view("pages/order-status", $data);
		$this->load->view("templates/footer");
	}
}
