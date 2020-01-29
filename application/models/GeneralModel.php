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
}
