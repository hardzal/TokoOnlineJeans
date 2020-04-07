<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_Model extends CI_Model
{
	protected const TABLE_NAME = "payments";

	public function getAll()
	{
		return $this->db->select('payments.*, users.username')
			->from($this::TABLE_NAME)
			->join('orders', 'payments.id=orders.payment_id')
			->join('users', 'orders.user_id=users.id')
			->get()
			->result_object();
	}

	public function get($id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['id' => $id])->row_object();
	}

	public function getDetail($id)
	{
		return $this->db->select('payments.*, users.username, user_details.nama_lengkap, users.email, collections.name as collection_name, collections.price, orders.status as order_status, order_details.quantity, order_details.address, order_details.description, sizes.size')
			->from($this::TABLE_NAME)
			->join('orders', 'orders.payment_id=payments.id')
			->join('order_details', 'order_details.order_id=orders.id')
			->join('sizes', 'sizes.id=order_details.size_id')
			->join('collections', 'collections.id=orders.collection_id')
			->join('users', 'orders.user_id=users.id')
			->join('user_details', 'users.id=user_details.user_id')
			->where('payments.id', $id)
			->get()
			->result_object();
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

	public function verify($status, $id)
	{
		$this->db->set('status', $status);
		return $this->db->update($this::TABLE_NAME, ['id' => $id]);
	}
}
