<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
	protected const TABLE_NAME = "users";

	public function getAll()
	{
		return $this->db
			->select('users.*, user_details.nama_lengkap')
			->from($this::TABLE_NAME)
			->join('user_details', 'users.id = user_details.user_id')
			->get()
			->result_object();
	}

	public function get($id)
	{
		return $this->db
			->select('users.*, user_details.nama_lengkap, user_details.jenis_kelamin, user_details.alamat, user_details.telp')
			->from($this::TABLE_NAME)
			->join('user_details', 'users.id = user_details.user_id')
			->where('users.id', $id)
			->get()
			->row_object();
	}

	public function insert($data)
	{
		return $this->db->insert($this::TABLE_NAME, $data);
	}

	public function update($data, $id)
	{
		$this->db->trans_start();
		$this->db->update($this::TABLE_NAME, $data['users'], ['id' => $id]);
		$this->db->update('user_details', $data['user_details'], ['user_id' => $id]);
		$this->db->trans_complete();

		if ($this->db->trans_status() == false) {
			$this->db->trans_rollback();
			return false;
		}

		$this->db->trans_commit();
		return true;
	}

	public function delete($id)
	{
		$this->db->trans_start();

		$this->db->delete($this::TABLE_NAME, ['id' => $id]);
		$this->db->delete('user_details', ['user_id' => $id]);

		$this->db->trans_complete();
		if ($this->db->trans_status() == false) {
			$this->db->trans_rollback();
			return false;
		}

		$this->db->trans_commit();
		return true;
	}
}
