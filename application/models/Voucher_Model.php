<?php

class Voucher_Model extends CI_Model
{
	private const TABLE_NAME = "vouchers";

	public function getAll()
	{
		return $this->db->get($this::TABLE_NAME)->result_object();
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

	public function getByPromoId($promo_id)
	{
		return $this->db->get_where($this::TABLE_NAME, ['promo_id' => $promo_id])->result_object();
	}
}
