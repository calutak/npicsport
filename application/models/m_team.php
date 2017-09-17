<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_team extends CI_Model
{
	public function load_team()
	{
		return $this->db->order_by('team_id', 'ASC')->get('tb_team')->result_object();
	}
	public function load_team_by_tid($tid)
	{
		return $this->db->where('tournament_id', $tid)->get('tb_team')->result_object();
	}
	public function load_team_by_mid($mid)
	{
		return $this->db->where('team_id', $mid)->get('tb_team')->row_object();
	}
	public function check_name($tName, $tId)
	{
		$cond = array(
				'team_name' => $tName,
				'tournament_id' => $tId
			);
		return $this->db->where($cond)->get('tb_team')->num_rows();
	}
	public function create_user_pass($user, $passwd, $mid)
	{
		$cond = array(
			'team_user' => $user,
			'team_pass' => $passwd
		);
		return $this->db->where('team_id', $id)->update('tb_team', $cond);
	}
	public function update_status($id, $param)
	{
		$upd = array(
			'team_status' => $param
		);
		return $this->db->where('team_id', $id)->update('tb_team', $upd);
	}
	public function get_max_id($trid)
	{
		return $this->db->select_max('team_id','ti')->where('tournament_id', $trid)->get('tb_team')->row_object();
	}
}