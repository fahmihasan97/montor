<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KrisisModel extends CI_Model {
	public function view(){
		return $this->db->get('krisis')->result(); 
	}
}
