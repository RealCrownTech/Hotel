<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class SettingsModel extends Model {

		public function getCompanyData() {
			$builder = $this->db->table('company');
			$result = $builder->get();
			return $result->getRowArray();
		}

		public function getUserRoles() {
			$builder = $this->db->table('roles');
			$builder->where('role_id !=', 1);
			$result = $builder->get();
			return $result->getResultArray();
		}

		public function getUserRole($role_id) {
			$builder = $this->db->table('roles');
			$builder->where('role_id', $role_id);
			$result = $builder->get();
			return $result->getRowArray();
		}
		
		public function create($data) {
			$builder = $this->db->table('company');
			$builder->where('id', '1');
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function addUserRole($data) {
			$builder = $this->db->table('roles');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function updatePermission($role_id, $data) {
			$builder = $this->db->table('roles');
			$builder->where('role_id', $role_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}
	}

