<?php

class Size_Model extends CI_Model
{
	private const TABLE = "sizes";

	public function getAll()
	{
		return $this->db->get($this::TABLE)->result_object();
	}

	public function getCollection($collection_id)
	{
		return $this->db->get_where('collection_sizes', ['collection_id' => $collection_id])->result_object();
	}

	public function insertCollection($collection_id, $stock)
	{
		$this->db->trans_start();
		foreach ($stock as $stok) {
			$this->db->insert('collection_sizes', [
				'collection_id' => $collection_id,
				'size_id' => $stok['size_id'],
				'stock' => $stok['stock']
			]);
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			return false;
		}
		return true;
	}
}
