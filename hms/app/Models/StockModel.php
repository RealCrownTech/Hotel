<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class StockModel extends Model {
		public function getAllStocks() {
			$builder = $this->db->table('stock');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getLowStocks() {
			$builder = $this->db->table('stock');
			$builder->where('stock_qty <', '10');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function createStock($data) {
			$builder = $this->db->table('stock');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getStockData($stock_id) {
			$builder = $this->db->table('stock');
			$builder->where('stock_id', $stock_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getStockOrder($lodge_no) {
			$builder = $this->db->table('orders');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getAllStockOrder() {
			$builder = $this->db->table('orders');
			$builder->where('category', 'Stock');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function editStock($stock_id, $data) {
			$builder = $this->db->table('stock');
			$builder->where('stock_id', $stock_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function createOrder($data) {
			$builder = $this->db->table('orders');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return $this->db->insertID();
			}else{
				return false;
			}
		}

		public function createOrdersItem($data) {
			$builder = $this->db->table('orders_item');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getStockOrderData($id) {
			$builder = $this->db->table('orders');			
			$builder->where('category', 'Stock');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getStockOrderItemData($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function deleteStock($id) {
			$builder = $this->db->table('stock');
			$builder->where('stock_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteStockOrder($id) {
			$builder = $this->db->table('orders');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteStockOrdersItem($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}
	}