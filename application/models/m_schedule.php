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
	public function get_schedule($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_schedule')->result_object();
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
}