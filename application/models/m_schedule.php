<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_schedule extends CI_Model
{
	public function get_team_count($id)
	{
		$options = array(
			'team_status'=>2,
			'tournament_id'=>$id
			);
		return $this->db->where($options)->get('tb_team')->num_rows();
	}
}