<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_timeline extends CI_Model
{
	public function load_post($limit)
	{
		return $this->db->order_by('timeline_date', 'desc')->limit($limit)->where('timeline_cat', 'news')->get('tb_timeline')->result_object();
	}

	public function manage_gallery()
	{
		return $this->db->order_by('timeline_date', 'desc')->where('timeline_cat', 'Gallery')->get('tb_timeline')->result_object();
	}

	public function getrow($id)
	{
		return $this->db->where('timeline_id', $id)->where('timeline_cat', 'news')->get('tb_timeline')->row_object();
	}

	public function getgallery($id)
	{
		return $this->db->where('timeline_id', $id)->where('timeline_cat', 'Gallery')->get('tb_timeline')->row_object();
	}

	public function load_gallery()
	{
		return $this->db->order_by('timeline_date', 'desc')->limit(6)->where('timeline_cat', 'Gallery')->get('tb_timeline')->result_object();
	}

	public function update_post($id, $data)
	{
		return $this->db->where('timeline_id', $id)->update('tb_timeline', $data);
	}

	public function delete_post($id)
	{
		return $this->db->where('timeline_id', $id)->delete('tb_timeline');
	}

	//FRONT END
	public function load_top_headline()
	{
		return $this->db->order_by('timeline_date', 'DESC')->where('timeline_cat', 'news')->where('isHeadline', 1)->get('tb_timeline')->result_object();
	}
	public function load_headline()
	{
		return $this->db->limit(6)->order_by('timeline_date', 'DESC')->where('timeline_cat', 'news')->get('tb_timeline')->result_object();
	}
}