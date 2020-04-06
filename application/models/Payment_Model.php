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
}
