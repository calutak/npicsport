<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_team extends CI_Model
{
	public function load_team()
	{
		return $this->db->order_by('team_id', 'ASC')->get('tb_team')->result_object();
	}
	public function load_team_data()
	{
		return $this->db->get('team_view')->result_object();
	}
	public function load_team_member_view_byID($id)
	{
		return $this->db->where('teamid', $id)->get('team_member_view')->result_object();
	}
	public function load_team_by_tid($tid)
	{
		return $this->db->where('tournament_id', $tid)->get('tb_team')->result_object();
	}
	public function load_team_by_mid($mid)
	{
		return $this->db->where('team_id', $mid)->get('tb_team')->row_object();
	}
	public function load_member_by_teamid($teamid)
	{
		return $this->db->where('team_id', $teamid)->get('tb_team_member')->result_object();
	}
	public function load_member_by_memberid($memberid)
	{
		return $this->db->where('member_id', $memberid)->get('tb_team_member')->row_object();
	}
	public function check_member($param,$name,$teamid)
	{
		if($param=='mail')
		{
			return $this->db->where('team_id', $teamid)->where('member_email', $name)->get('tb_team_member')->num_rows();
		} 
		elseif($param=='name') 
		{
			return $this->db->where('member_name', $name)->get('tb_team_member')->num_rows();
		}
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
	public function count_major($str, $tid)
	{
		return $this->db->where('tournament_id', $tid)->where('major', $str)->get('tb_team')->num_rows();
	}
	public function count_member($teamid)
	{
		return $this->db->query('select count(member_id) as cm from tb_team_member where team_id=\''.$teamid.'\'')->row()->cm;
	}
	public function get_team_setting_byID($mid)
	{
		return $this->db->where('team_id', $mid)->get('tb_team_settings')->row_object();
	}
	public function delete_member($id)
	{
		return $this->db->where('member_id', $id)->delete('tb_team_member');
	}
	public function update_member($memberid, $data)
	{
		return $this->db->where('member_id', $memberid)->update('tb_team_member', $data);
	}
	public function update_team($teamid, $data)
	{
		return $this->db->where('team_id', $teamid)->update('tb_team', $data);
	}
	public function update_team_setting($teamid, $data)
	{
		return $this->db->where('team_id', $teamid)->update('tb_team_settings', $data);
	}
	public function count_team($tid)
	{
		return $this->db->where('tournament_id', $tid)->get('tb_team')->num_rows();
	}
	//dasbor
	public function _count_team()
	{
		return $this->db->where('team_status', 2)->get('tb_team')->num_rows();
	}
}