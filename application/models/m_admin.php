<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function login($datausr)
	{
		$result = array();
    	$this->db->where('username', $datausr['username']);
    	//$this->db->where('status !=', 4);
    	$query = $this->db->get('tb_user');
		$ret = $query->row();
		$count = $query->num_rows();
		if($count != 1){
			$result['status'] = 'loginfailed';
		} else {
			if (md5($datausr['password'], $ret->password)) {
			    $result['status'] = 'ok';
			    $result['id'] = $ret->id_user;
			    $result['user'] = $ret->username;
			    $result['role'] = $ret->role;
			} else {
			    $result['status'] = 'loginfailed';
			}
		}

		return $result;
	}
}