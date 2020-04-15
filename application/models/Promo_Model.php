<?php

class Promo_Model extends CI_Model
{
	private const TABLE_NAME = "promotes";

	public function __construct()
	{
		$this->load->model('Voucher_Model', 'voucher');
	}

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
		$this->db->trans_start();
		$this->db->insert($this::TABLE_NAME, $data['promo']);
		$promo_id = $this->db->insert_id();
		$vouchers = [];

		foreach ($data['voucher'] as $voucher) {
			$vouchers[] = [
				'promo_id' => $promo_id,
				'kode' => $voucher['kode']
			];
		}

		$this->db->insert_batch('vouchers', $vouchers);

		return $this->db->trans_complete();
	}

	public function update($data, $id)
	{
		$this->db->trans_start();
		$this->db->update($this::TABLE_NAME, $data['promo'], ['id' => $id]);
		$vouchers = [];
		$size_of_voucher = count($data['vouchers']['voucher']);

		foreach ($data['vouchers']['voucher_id'] as $index => $voucher_id) {
			$vouchers[] = [
				'id' => $voucher_id,
				'kode' => $data['vouchers']['voucher'][$index]
			];
			$size_of_voucher--;
		}

		$this->db->update_batch('vouchers', $vouchers, 'id');
		$vouchers = [];
		if ($size_of_voucher) {
			for ($i = $size_of_voucher; $i > 0; $i--) {
				$vouchers[] = [
					'kode' => $data['vouchers']['voucher'][$i]
				];
			}
			$this->db->insert_batch('vouchers', $vouchers);
		}

		return $this->db->trans_complete();
	}

	public function delete($id)
	{
		return $this->db->delete($this::TABLE_NAME, ['id' => $id]);
	}

	public function getPromoUser($promo_id)
	{
		return $this->db->select('user_vouchers.*, users.username, users.email, user_details.nama_lengkap, user_details.telp')
			->from('user_vouchers')
			->join('vouchers', 'vouchers.id=user_vouchers.voucher_id')
			->join('promotes', 'promotes.id=user_vouchers.promo_id')
			->join('users', 'users.id=user_vouchers.user_id')
			->join('user_details', 'user_details.user_id=users.id')
			->where('user_vouchers.promo_id', $promo_id)
			->get()
			->result_object();
	}
}
