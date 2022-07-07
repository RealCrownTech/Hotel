<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class AmenitiesModel extends Model {
		public function getAllAmenities() {
			$builder = $this->db->table('amenities');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function createAmenities($data) {
			$builder = $this->db->table('amenities');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAmenitiesData($amenities_id) {
			$builder = $this->db->table('amenities');
			$builder->where('amenities_id', $amenities_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getAmenitiesOrder($lodge_no) {
			$builder = $this->db->table('orders');
			$builder->where('lodge_no', $lodge_no);
			$builder->where('ptr', '1');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getAllAmenitiesOrder() {
			$builder = $this->db->table('orders');			
			$builder->where('category', 'Amenities');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function editAmenities($amenities_id, $data) {
			$builder = $this->db->table('amenities');
			$builder->where('amenities_id', $amenities_id);
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

		public function getAmenitiesOrderData($id) {
			$builder = $this->db->table('orders');			
			$builder->where('category', 'Amenities');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getAmenitiesOrderItemData($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function deleteAmenities($id) {
			$builder = $this->db->table('amenities');
			$builder->where('amenities_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteAmenitiesOrder($id) {
			$builder = $this->db->table('orders');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteAmenitiesOrdersItem($id) {
			$builder = $this->db->table('orders_item');
			$builder->where('order_id', $id);
			$builder->delete();
			return true;
		}
	}