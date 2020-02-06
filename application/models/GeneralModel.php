<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GeneralModel extends CI_Model {
	function __construct() {
        parent::__construct();
	}

	public function insertData($table, $data) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateData($id, $table, $data) {
		if (!empty($id)) {
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		} else {
			return false;
		}
	}

	public function deleteData($id, $table) {
		if (!empty($id)) {
			$this->db->where('id', $id);
			return $this->db->delete($table);
		} else {
			return false;
		}
	}

	public function getDataById($id, $table) {
		$this->db->where('id', $id);
		return $this->db->get($table)->row();
	}

	function randomNumber($len = 6){
		$alphabet = '1234567890';
		$password = array(); 
		$alpha_length = strlen($alphabet) - 1; 
		for ($i = 0; $i < $len; $i++) 
		{
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password); 
	}

	public function replacePhoneNumber($phone) {
        $separator = substr($phone,0,1);

        if($separator == 0) {
            $separator = "62".''.substr($phone,1);
        }
        else if($separator == 8) {
            $separator = "628".''.substr($phone,1);
        }
        else {
            $separator = $phone;
        }
        return $separator;
	}
}
