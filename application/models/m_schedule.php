<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_schedule extends CI_Model
{
	public function get_team_count()
	{
		return $this->db->get('tb_team')->num_rows();
	}
}