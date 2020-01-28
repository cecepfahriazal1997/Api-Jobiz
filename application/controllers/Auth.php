<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Auth extends RestController {
	function __construct() {
        parent::__construct();
	}
	
	public function login_get() {
		$token				= $this->get('token');
		$getDataGoogle		= json_decode(file_get_contents(getenv('URL_AUTH_GOOGLE').'?id_token='.$token), true);
		$this->response($getDataGoogle, 200);
	}
}
