<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class LodgeModel extends Model {
		
		public function create($data) {
			$builder = $this->db->table('lodge');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAllCheckin() {
			$builder = $this->db->table('lodge');
			$builder->where('checked_out', '0');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getLodgeData($client_id) {
			$builder = $this->db->table('lodge');
			$builder->where('client_id', $client_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getAllCheckOut() {
			$builder = $this->db->table('lodge');
			$builder->where('checked_out', '1');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function fetchInvoiceData($lodge_no) {
			$builder = $this->db->table('lodge');
			$builder->where('lodge_no', $lodge_no);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getAllFilledRoom() {
			$builder = $this->db->table('lodge');
			$builder->where('check_out_by', '0');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function checkout($lodge_no, $data) {
			$builder = $this->db->table('lodge');
			$builder->where('lodge_no', $lodge_no);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function editLodge($lodge_no, $data) {
			$builder = $this->db->table('lodge');
			$builder->where('lodge_no', $lodge_no);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function deleteLodge($lodge_no) {
			$builder = $this->db->table('lodge');
			$builder->where('lodge_no', $lodge_no);
			$builder->delete();
			return true;
		}
	}