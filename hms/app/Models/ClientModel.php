<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class ClientModel extends Model {

		public function create($data) {
			$builder = $this->db->table('clients');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function create_guest($data) {
			$builder = $this->db->table('clients');
			$res = $builder->insert($data);
			if ($this->db->affectedRows() == 1 ) {
				return $this->db->insertID();
			}else{
				return false;
			}
		}

		public function edit($client_id, $data) {
			$builder = $this->db->table('clients');
			$builder->where('client_id', $client_id);
			$res = $builder->update($data);
			if ($this->db->affectedRows() == 1 ) {
				return true;
			}else{
				return false;
			}
		}

		public function getAllClients() {
			$builder = $this->db->table('clients');
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getResultArray();
			}else{
				return false;
			}
		}

		public function getClientData($client_id) {
			$builder = $this->db->table('clients');
			$builder->where('client_id', $client_id);
			$result = $builder->get();
			if (count ($result->getResultArray()) > 0) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}

		public function deleteClient($id) {
			$builder = $this->db->table('clients');
			$builder->where('client_id', $id);
			$builder->delete();
			return true;
		}
	}