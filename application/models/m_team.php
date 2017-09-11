<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_team extends CI_Model
{
	public function load_team()
	{
		return $this->db->get('tb_team')->result_object();
	}
	public function load_team_by_tid($tid)
	{
		return $this->db->where('tournament_id', $tid)->get('tb_team')->result_object();
	}
}