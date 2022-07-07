<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class TransactionModel extends Model {

		public function getAllTransactions() {
			$builder = $this->db->table('hidden_transaction');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getSumOfAllTransactions() {
			$builder = $this->db->table('transactions');
			$builder->select('lodge_no');
			$builder->selectSum('amount');
			$builder->where('ptr', '1');
			$builder->groupBy("lodge_no");
			$result = $builder->get();
			return $result->getResultArray();
		}
		

		public function getTransaction($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function create($data) {
			$builder = $this->db->table('transactions');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function createHidden($data) {
			$builder = $this->db->table('hidden_transaction');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getInvoiceCheckInDates($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('title', 'Check-In');
			$result = $builder->get();
			return $result->getResultArray();
		}		

		public function getTotalInvoiceAmount($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->selectSum('amount');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function getTotalCheckInAmount($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->selectSum('amount');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('title', 'Check-In');
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function getTotalOrderAmount($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->selectSum('amount');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$builder->where('title !=', 'Check-In');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function editTransaction($lodge_no, $date, $data) {
			$builder = $this->db->table('transactions');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('date', $date);
			$builder->where('title', 'Check-In');
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function createClose($data) {
			$builder = $this->db->table('close_account');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return $this->db->insertID();
			}else{
				return false;
			}
		}

		public function updateCloseAccount($close_id, $data) {
			$builder = $this->db->table('close_account');
			$builder->where('close_id', $close_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function updateTransaction($staff_id, $data) {
			$builder = $this->db->table('hidden_transaction');
			$builder->where('staff_id', $staff_id);
			$builder->where('close_id', '');
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getSumOfAllOpenTransactions() {
			$builder = $this->db->table('hidden_transaction');
			$builder->selectSum('amount');
			$builder->where('close_id', '');
			$builder->groupBy('close_id');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function getAllOpenTransactions($close_id) {
			$builder = $this->db->table('hidden_transaction');
			$builder->where('close_id', $close_id);
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function lastCloseID() {
			$builder = $this->db->table('close_account');
			$builder->selectMax('close_id');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function deleteTransaction($lodge_no) {
			$builder = $this->db->table('transactions');
			$builder->where('title', 'Check-In');
			$builder->where('lodge_no', $lodge_no);
			$builder->delete();
			return true;
		}

		public function deleteHiddenTransaction($lodge_no) {
			$builder = $this->db->table('hidden_transaction');
			$builder->like('title', 'Check-In');
			$builder->where('lodge_no', $lodge_no);
			$builder->delete();
			return true;
		}
	}