<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Model extends CI_Model
{
	protected const TABLE_NAME = "orders";

	public function getAll()
	{
		return $this->db->select('orders.*, users.username, catalogs.name as catalog_name, collections.name as collection_name, collections.price, order_details.quantity')
			->from('orders')
			->join('users', 'orders.user_id=users.id')
			->join('collections', 'orders.collection_id=collections.id')
			->join('catalogs', 'collections.catalog_id=catalogs.id')
			->join('order_details', 'orders.id=order_details.order_id')
			->get()
			->result_object();
		// return $this->db->get($this::TABLE_NAME)->result_object();
	}

	public function get($id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['id' => $id])->row_object();
	}

	public function insert($data)
	{
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this::TABLE_NAME, $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this::TABLE_NAME, ['id' => $id]);
	}

	public function insertConfirmation($data)
	{
		$this->db->trans_start();
		$this->db->insert('payments', $data['payment']);

		$payment_id = $this->db->insert_id();

		$this->session->set_userdata('payment_id', $payment_id);

		$start = 0;
		foreach ($data['order']['collection_id'] as $collect_id) {
			$order = [
				'collection_id' => $collect_id,
				'payment_id' => $payment_id,
				'status' => 0,
				'user_id' => $data['order']['user_id']
			];

			$this->db->insert('orders', $order);

			$order_id = $this->db->insert_id();
			$order_detail = [
				'order_id' => $order_id,
				'size_id' => $data['order_details']['size_id'][$start],
				'address' => $data['order_details']['address'][$start],
				'quantity' => $data['order_details']['quantity'][$start],
			];
			$this->db->insert('order_details', $order_detail);

			$start++;
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			return false;
		}
		return true;
	}

	public function getOrdersByPaymentId($payment_id)
	{
		return $this->db
			->select('orders.*, order_details.id as order_details_id, order_details.size_id, order_details.quantity, order_details.address, order_details.description, collections.code, collections.name, collections.img, collections.description as description_collection, collections.price')
			->from($this::TABLE_NAME)
			->join('order_details', 'orders.id=order_details.order_id')
			->join('collections', 'orders.collection_id=collections.id')
			->where('orders.payment_id', $payment_id)
			->get()
			->result_object();
	}

	public function getOrderDetails($order_id)
	{
		return $this->db->get_where('order_details', ['order_id' => $order_id])->row_object();
	}
}
