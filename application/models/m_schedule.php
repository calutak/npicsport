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
	public function get_min_id_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->select_min('schedule_id', 'id')->get('tb_schedule')->row_object()->id;
	}
	public function get_max_time_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->select_max('schedule_time', 'st')->get('tb_schedule')->row_object()->st;
	}
	public function get_min_time_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->select_min('schedule_time', 'st')->get('tb_schedule')->row_object()->st;
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
	public function clear_schedule($tid)
	{
		$this->db->where('tournament_id', $tid)->delete('tb_schedule');
		$cek = $this->db->get('tb_schedule')->num_rows();
		if($cek == 0){
			$this->db->truncate('tb_schedule');
		}
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
	public function get_schedule_byID($id)
	{
		return $this->db->where('schedule_id', $id)->get('tb_schedule')->row_object();
	}
	public function upd_schedule($id, $data)
	{
		return $this->db->where('schedule_id', $id)->update('tb_schedule', $data);
	}
	public function append_schedule($id, $sid)
	{
		$data = array('schedule_id' => $sid);
		return $this->db->where('match_id', $id)->update('tb_match', $data);
	}
	public function schedule_check($val, $tid)
	{
		return $this->db->where('tournament_id',$tid)->where($val)->get('tb_schedule')->num_rows();
	}
}