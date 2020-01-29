<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthModel extends CI_Model {
	function __construct() {
        parent::__construct();
	}

	public function checkUser($email, $table) {
		$this->db->select('*', false);
		$this->db->where('email', $email);
		return $this->db->get($table)->row();
	}

	public function checkAccount($username, $role) {
		$this->db->select('*', false);
		$this->db->where('username', $username);
		$this->db->where('role', $role);
		return $this->db->get('users')->row();
	}
}
