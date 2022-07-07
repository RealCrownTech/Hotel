<?php
	namespace App\Models;
	use \CodeIgniter\Model;

	class LoginModel extends Model {
		
		public function verifyEmail($email) {
			$builder = $this->db->table('users');
			// $builder->select("user_id, email, password");
			$builder->where('email', $email);
			$result = $builder->get();
			if (count ($result->getResultArray()) == 1) {
				return $result->getRowArray();
			}else{
				return false;
			}
		}
	}