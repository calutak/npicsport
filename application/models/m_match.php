<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_match extends CI_Model
{
	public function show_match()
	{
		$cond = array(
			'rs <>' => 4
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
	public function show_match_list($id)
	{
		$cond = array(
			'rs <>' => 4,
			'tId' => $id
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
	public function get_1st_match_count($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_match')->num_rows();
	}
	public function get_match_data($id, $round)
	{
		$arrCond = array(
			'round' => $round,
			'tournament_id' => $id
			);
		return $this->db->order_by('match_order','ASC')->where($arrCond)->get('tb_match')->result_array();
	}
	public function get_match_data_by_order_group($id, $order)
	{
		$arrCond = array(
			'match_order' => $order,
			'tournament_id' => $id
			);
		return $this->db->where($arrCond)->get('tb_match')->row_object();
	}
	public function check_win_team($id)
	{
		return $this->db->order_by('match_order','ASC')->where('tournament_id',$id)->get('tb_match')->list_fields('winner');
	}
	public function get_max_order_group($id)
	{
		return $this->db->select_max('match_order','mo')->where('tournament_id', $id)->get('tb_match')->list_fields('mo');
	}
	public function get_min_order_group($id)
	{
		return $this->db->select_min('match_order','mi')->where('tournament_id', $id)->get('tb_match')->list_fields('mi');
	}
	public function update_a($team, $id)
	{
		$data = array(
			'team_a' => $team
		);
		return $this->db->where('match_id', $id)->update('tb_match', $data);
	}	
	public function update_b($team, $id)
	{
		$data = array(
			'team_b' => $team
		);
		return $this->db->where('match_id', $id)->update('tb_match', $data);
	}
	public function get_max_id_schedule_match($tid)
	{
		return $this->db->where('tournament_id', $tid)->select_max('schedule_id', 'id')->get('tb_match')->row_object()->id;
	}
	public function clear_match_data($tid)
	{
		$this->db->where('tournament_id', $tid)->delete('tb_match');
		$cek = $this->db->get('tb_match')->num_rows();
		if($cek == 0){
			return $this->db->truncate('tb_match');
		}
	}
	public function mlist_count($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_match')->num_rows();
	}
	public function get_match_data_byID($mid)
	{
		return $this->db->where('match_id', $mid)->get('tb_match')->row();
	}
	public function get_match_with_schedule($mid)
	{
		$cond = array(
			'`mId`' => $mid
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
	public function update_match($mid, $data)
	{
		return $this->db->where('match_id', $mid)->update('tb_match', $data);
	}
	public function tournament_count()
	{
		return $this->db->group_by('tournament_id')->get('tb_match');
	}
	public function match_count()
	{
		return $this->db->where('match_status', 0)->get('tb_match')->num_rows();
	}

	// FRONT END MODEL
	public function tournament_name()
	{
		$cond = array(
			'teamA <>' => '',
			'teamB <>' => '',
		);
		return $this->db->group_by('tName')->where($cond)->get('match_list')->result_object();
	}
	public function lt_tournament_name()
	{
		$cond = array(
			'winner <>' => '', 
			'stat' => 1
		);
		return $this->db->group_by('tName')->where($cond)->get('match_list')->result_object();
	}
	public function show_ready_matches()
	{
		$cond = array(
			'teamA <>' => '',
			'teamB <>' => '',
			'stat' => 0
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
	public function latest_matches()
	{
		$cond = array(
			'winner <>' => '', 
			'stat' => 1
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
	public function show_matches($tid,$date)
	{
		$cond = array(
			'tId' => $tid,
			'dates' => $date,
			'teamA <>' => '',
			'teamB <>' => '',
		);
		return $this->db->where($cond)->get('match_list')->result_object();
	}
}