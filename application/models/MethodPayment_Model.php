<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MethodPayment_Model extends CI_Model
{
	private const TABLE = "paymentmethods";

	public function getAll()
	{
		return $this->db->get($this::TABLE)->result_object();
	}

	public function get($id)
	{
		return $this->db->get_where($this::TABLE, ['id' => $id])->row_object();
	}

	public function insert($data)
	{
		return $this->db->insert($this::TABLE, $data);
	}

	public function update($data, $id)
	{
		return $this->db->update($this::TABLE, $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this::TABLE, ['id' => $id]);
	}
}
