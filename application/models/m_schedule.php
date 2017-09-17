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
	public function get_team_name($id)
	{
		$options = array(
			'team_status'=>2,
			'tournament_id'=>$id
			);
		return $this->db->where($options)->get('tb_team')->result_object();
	}
	public function get_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_schedule')->result_object();
	}
	public function get_max_id_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->select_max('schedule_id', 'id')->get('tb_schedule')->row_object()->id;
	}
	public function get_row_schedule()
	{
		return $this->db->get('tb_schedule')->num_rows();
	}
	public function insert_schedule($date, $time, $id)
	{
		$query = array(
			'schedule_date' => $date,
			'schedule_time' => $time,
			'tournament_id' => $id
			);
		return $this->db->insert('tb_schedule',$query);
	}
	public function clear_table()
	{
		$this->db->truncate('tb_schedule');
	}
	public function add_setting($round, $bracket, $id)
	{
		$set_id = $this->db->where('tournament_id', $id)->get('tb_settings')->row_object();
		$arrSet = array(
			'id_settings' => $set_id->id_settings,
			'tournament_id' => $id,
			);
		$arrData = array(
			'bracket_size' => $bracket,
			'round' => $round
			);
		return $this->db->where($arrSet)->update('tb_settings',$arrData);
	}
	public function get_filtered_schedule($id)
	{
		return $this->db->query('select s.schedule_id, s.schedule_date, s.schedule_time, s.tournament_id FROM tb_schedule s LEFT JOIN tb_match m ON s.schedule_id=m.schedule_id WHERE m.schedule_id IS NULL and s.tournament_id=\''.$id.'\'')->result_object();
	}
}