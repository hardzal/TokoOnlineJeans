<?php

class Size_Model extends CI_Model
{
	private const TABLE = "sizes";

	public function getAll()
	{
		return $this->db->get($this::TABLE)->result_object();
	}

	public function get($id)
	{
		return $this->db->get_where($this::TABLE, ['id' => $id])->row_object();
	}

	public function getCollectionSize($id_collection, $id_size)
	{
		return $this->db->select('sizes.size, collection_sizes.*')
			->from($this::TABLE)
			->join('collection_sizes', 'sizes.id=collection_sizes.size_id')
			->where([
				'collection_sizes.collection_id' => $id_collection,
				'collection_sizes.size_id' => $id_size
			])
			->get()
			->row_object();
	}

	

	public function getCollection($collection_id)
	{
		return $this->db->select('collection_sizes.*, sizes.size')
			->from('collection_sizes')
			->join('sizes', 'sizes.id = collection_sizes.size_id')
			->where('collection_id', $collection_id)
			->get()
			->result_object();
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
