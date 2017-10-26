<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logging extends CI_Model
{
	public function create_log($data)
	{
		$this->db->insert('tb_log', $data);
	}

	public function update_log($data)
	{
		$this->db->insert('tb_log', $data);
	}

	public function delete_log($data)
	{
		$this->db->insert('tb_log', $data);
	}

	public function new_message($data)
	{
		$this->db->insert('tb_log', $data);
	}
}