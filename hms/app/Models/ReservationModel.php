<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class ReservationModel extends Model {
		
		public function create($data) {
			$builder = $this->db->table('reservation');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAllReservation() {
			$builder = $this->db->table('reservation');			
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getAllCheckin() {
			$builder = $this->db->table('reservation');
			$builder->orderBy('check_in_date', 'ASC');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getReservationData($client_id) {
			$builder = $this->db->table('reservation');
			$builder->where('client_id', $client_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getAllCheckOut() {
			$builder = $this->db->table('reservation');
			$builder->where('checked_out', '1');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function fetchInvoiceData($reservation_no) {
			$builder = $this->db->table('reservation');
			$builder->where('reservation_no', $reservation_no);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getAllFilledRoom() {
			$builder = $this->db->table('reservation');
			$builder->where('check_out_by', '0');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function checkout($reservation_no, $data) {
			$builder = $this->db->table('reservation');
			$builder->where('reservation_no', $reservation_no);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function editReservation($reservation_no, $data) {
			$builder = $this->db->table('reservation');
			$builder->where('reservation_no', $reservation_no);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}
	}