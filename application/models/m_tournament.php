<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tournament extends CI_Model
{
	public function load_tournament()
	{
		$data = $this->db->get('tb_tournament')->result_object();

		return $data;
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
		return $this->db->get('tb_tournament')->num_rows();
	}
	public function get_max_id()
	{
		return $this->db->select_max('tournament_id', 'id')->get('tb_tournament')->row_object();
	}
	public function update_data_tour($id, $data)
	{
		return $this->db->where('tournament_id', $id)->update('tb_tournament', $data);
	}
	public function delete_row($id)
	{
		return $this->db->where('tournament_id', $id)->delete('tb_tournament');
	}
	public function filteryearTournament($year)
	{
		return $this->db->where('tournament_year', $year)->get('tb_tournament')->result_object();
	}
}