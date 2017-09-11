<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_validate extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();
		if(empty($_SESSION['id']))
		{
			redirect(site_url('sysladm'));
		}
		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');		
		$this->load->model('m_tournament');	
		$this->load->model('m_schedule');
		$this->load->model('m_team');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tournament'] = $this->m_tournament->load_tournament();		
	}

	public function form_team_register()
	{
		$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
	}

	public function manage_team() 
	{
		$this->data['team_list'] = $this->m_team->load_team();
		$this->template->load('Manage/template', 'Manage/validate/validate_team', $this->data);
	}
}
?>