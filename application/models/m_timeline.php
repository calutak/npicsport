<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_timeline extends CI_Model
{
	public function load_post()
	{
		return $this->db->get('tb_timeline')->result_object();
	}

	public function getrow($id)
	{
		return $this->db->where('timeline_id', $id)->get('tb_timeline')->row_object();
	}

	public function update_post($id, $data)
	{
		return $this->db->where('timeline_id', $id)->update('tb_timeline', $data);
	}

	public function delete_post($id)
	{
		return $this->db->where('timeline_id', $id)->delete('tb_timeline');
	}
}