<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_message extends CI_Model
{
	public function load_message()
	{
		return $this->db->order_by('message_date', 'desc')->get('tb_message')->result_object();
	}
	public function count_message()
	{
		return $this->db->order_by('message_date', 'desc')->get('tb_message')->num_rows();
	}
	public function find_message($id)
	{
		return $this->db->where('message_id', $id)->get('tb_message')->row_object();
	}
	public function delete($id)
	{
		return $this->db->where('message_id', $id)->delete('tb_message');
	}
}