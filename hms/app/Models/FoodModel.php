<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class FoodModel extends Model {
		public function getAllFoods() {
			$builder = $this->db->table('food');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function createFood($data) {
			$builder = $this->db->table('food');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getFoodData($food_id) {
			$builder = $this->db->table('food');
			$builder->where('food_id', $food_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getFoodOrder($lodge_no) {
			$builder = $this->db->table('orders');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getAllFoodOrder() {
			$builder = $this->db->table('orders');			
			$builder->where('category', 'Food');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function editFood($food_id, $data) {
			$builder = $this->db->table('food');
			$builder->where('food_id', $food_id);
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

		public function getFoodOrderData($id) {
			$builder = $this->db->table('orders');			
			$builder->where('category', 'Food');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getFoodOrderItemData($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function deleteFood($id) {
			$builder = $this->db->table('food');
			$builder->where('food_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteFoodOrder($id) {
			$builder = $this->db->table('orders');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteFoodOrdersItem($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}
	}