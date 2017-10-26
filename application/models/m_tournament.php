<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tournament extends CI_Model
{
	public function load_tournament()
	{
		return $this->db->get('tb_tournament')->result_object();
	}
	public function load_t_for_broadcast()
	{
		return $this->db->query('select t.tournament_id, t.tournament_name, count(team.team_id) as tcount, t.status from tb_tournament t join tb_team team on t.tournament_id = team.tournament_id group by tournament_id having (tcount > 2) and t.status <> 5')->result_object();
	}
	public function load_dropdown_tlist()
	{
		return $this->db->query('select t.tournament_id, t.tournament_name, count(team.team_id) as tcount, t.status from tb_tournament t join tb_team team on t.tournament_id = team.tournament_id group by tournament_id having (tcount = 2 or tcount = 4 or tcount = 8 or tcount = 16 or tcount = 32) and t.status = 1')->result_object();
	}
	public function load_dropdown_dlist()
	{
		return $this->db->query('select t.tournament_id, t.tournament_name, count(team.team_id) as tcount, t.status from tb_tournament t join tb_team team on t.tournament_id = team.tournament_id group by tournament_id having (tcount = 2 or tcount = 4 or tcount = 8 or tcount = 16) and t.status = 2')->result_object();
	}
	public function load_dropdown_mlist()
	{
		return $this->db->query('select t.tournament_id, t.tournament_name, count(m.match_id) as mcount, t.status from tb_tournament t join tb_match m on t.tournament_id = m.tournament_id group by tournament_id having mcount > 0 and t.status >= 3 and t.status < 5')->result_object();
	}
	public function load_match_tournament()	
	{
		return $this->db->query('select * from tb_match m join tb_tournament t on m.`tournament_id` = t.`tournament_id`')->result_object();
	}
	public function get_row_byID($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_tournament')->row_object();
	}
	public function get_setting_byID($id)
	{
		return $this->db->where('tournament_id', $id)->get('tb_settings')->row_object();
	}
	public function get_row_tournament()
	{
		// return $this->db->get('tb_tournament')->num_rows();
		return $this->db->query('select t.tournament_id, t.tournament_name from tb_tournament t join tb_team team on t.tournament_id = team.tournament_id and (select count(team_id) as tcount from tb_team having tcount > 1) group by t.tournament_id')->num_rows();
	}
	public function get_max_id()
	{
		return $this->db->select_max('tournament_id', 'id')->get('tb_tournament')->row_object();
	}
	public function update_data_tour($id, $data)
	{
		return $this->db->where('tournament_id', $id)->update('tb_tournament', $data);
	}
	public function update_data_setting($id, $data)
	{
		return $this->db->where('tournament_id', $id)->update('tb_settings', $data);
	}
	public function delete_row($id)
	{
		return $this->db->where('tournament_id', $id)->delete('tb_tournament');
	}
	public function filteryearTournament($year)
	{
		$cond = array(
			'tournament_year'=>$year,
			'status'=>2
		);
		return $this->db->where($cond)->get('tb_tournament')->result_object();
	}
	public function filterstatusTournament($stat)
	{
		$cond = array(
			'status'=>$stat
		);
		return $this->db->where($cond)->get('tb_tournament')->result_object();
	}
	public function get_tyear_list()
	{
		return $this->db->group_by('tournament_year')->get('tb_tournament')->result_object();
	}
	public function update_status($status, $id)
	{
		return $this->db->where('tournament_id', $id)->update('tb_tournament', $status);
	}
}