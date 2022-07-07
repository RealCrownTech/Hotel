<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class PaymentModel extends Model {
		
		public function create($data) {
			$builder = $this->db->table('payment');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAllPayment() {
			$builder = $this->db->table('payment');			
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function fetchPaymentData($payment_no) {
			$builder = $this->db->table('payment');
			$builder->where('payment_no', $payment_no);
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