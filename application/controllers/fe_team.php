<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_team extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_team');
		$this->data['Team']=$this->m_team->load_team_data();
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Team',$this->data);
		$this->load->view('frontend/banner/footer');
	}

	public function load_member($id)
	{
		$this->data['member'] = $this->m_team->load_team_member_view_byID($id);
		$this->data['tname'] = $this->m_team->load_team_by_mid($id)->team_name;
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Team-details', $this->data);
		$this->load->view('frontend/banner/footer');
	}
}
?>