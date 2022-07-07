<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class RoomModel extends Model {

		public function countOccupiedRooms() {
			$builder = $this->db->table('rooms');
			$builder->where('room_status', 'Occupied');
			$result = $builder->get();
			return count($result->getResultArray());
		}

		public function countVacantRooms() {
			$builder = $this->db->table('rooms');
			$builder->where('room_status', 'Vacant');
			$result = $builder->get();
			return count($result->getResultArray());
		}

		public function countReservedRooms() {
			$builder = $this->db->table('rooms');
			$builder->where('room_status', 'Reserved');
			$result = $builder->get();
			return count($result->getResultArray());
		}

		public function create($data) {
			$builder = $this->db->table('room_type');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function createRoom($data) {
			$builder = $this->db->table('rooms');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAllRoomType() {
			$builder = $this->db->table('room_type');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getAllRoom() {
			$builder = $this->db->table('rooms');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getAllOccupiedRoom() {
			$builder = $this->db->table('rooms');
			$builder->where('room_status', 'Occupied');
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getAllFilledRoom() {
			$builder = $this->db->table('rooms');
			$builder->where('room_status', 'Occupied');
			$builder->where('room_status', 'Reserved');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getRoomData($room_id) {
			$builder = $this->db->table('rooms');
			$builder->where('room_id', $room_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function getRoomTypeData($room_type_id) {
			$builder = $this->db->table('room_type');
			$builder->where('room_type_id', $room_type_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function editRoom($room_id, $data) {
			$builder = $this->db->table('rooms');
			$builder->where('room_id', $room_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function editRoomTypes($room_type_id, $data) {
			$builder = $this->db->table('room_type');
			$builder->where('room_type_id', $room_type_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function editRoomByLodgeNo($lodge_no, $data) {
			$builder = $this->db->table('rooms');
			$builder->where('lodge_no', $lodge_no);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function fetchRoomOfID($room_type_id) {
			$builder = $this->db->table('rooms');
			$builder->where('room_type_id', $room_type_id);
			$builder->where('room_status', 'vacant');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function deleteRoom($id) {
			$builder = $this->db->table('rooms');
			$builder->where('room_id', $id);
			$builder->delete();
			return true;
		}

		public function deleteRoomType($id) {
			$builder = $this->db->table('room_type');
			$builder->where('room_type_id', $id);
			$builder->delete();
			return true;
		}
	}