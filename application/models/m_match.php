<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_match extends CI_Model
{
	public function show_match_list()
	{
		return $this->db->order_by('stat','ASC')->get('match_list')->result_object();
	}
	public function get_round($round, $id)
	{
		$arrCond = array(
			'round' => $round,
			'tournament_id' => $id
			);
		return $this->db->where($arrCond)->get('tb_match')->row_object()->round;
	}
	public function get_round_count($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_settings')->list_fields('round');
	}
	public function get_1st_match_count($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_match')->num_rows();
	}
	public function get_match_data_by_order_group($id, $order)
	{
		$arrCond = array(
			'match_order' => $order,
			'tournament_id' => $id
			);
		return $this->db->where($arrCond)->get('tb_match')->row_object();
	}
	public function clear_match_by_tournament_id($id)
	{
		// if($this->db->get('tb_match')->num_rows() == 0)
		// {
		// 	return $this->db->truncate('tb_match');
		// }
		return $this->db->where('tournament_id', $id)->delete('tb_match');
	}
}