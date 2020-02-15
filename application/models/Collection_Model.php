<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collection_Model extends CI_Model
{
	protected const TABLE_NAME = "collections";

	public function getAll()
	{
		return $this->db
			->select('collections.*, catalogs.name AS catalog_name')
			->from($this::TABLE_NAME)
			->join('catalogs', 'collections.catalog_id = catalogs.id')
			->get()->result_object();
	}

	public function get($id)
	{
		return $this->db
			->select('collections.*, catalogs.name AS catalog_name')
			->from($this::TABLE_NAME)
			->join('catalogs', 'collections.catalog_id=catalogs.id')
			->where('collections.id', $id)
			->get()
			->row_object();
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
