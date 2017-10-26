<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller
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
		$this->load->model('m_match');
		$this->load->model('m_logging');
		$this->load->model('m_schedule');
		$this->load->model('m_message');
		$this->load->model('m_team');
		$this->load->model('m_timeline');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
	}

	public function index()
	{
		$this->data['registered_team'] = $this->m_team->_count_team();
		$this->data['tournament_count'] = count($this->m_match->tournament_count()->result_object());
		$this->data['match_count'] = $this->m_match->match_count();
		$this->data['message_count'] = $this->m_message->count_message();
		$this->check_regist_date();
		$this->template->load('Manage/template', 'Manage/dashboard', $this->data);
	}
	
	public function logout() 
	{
		$this->session->sess_destroy();
		redirect(site_url('sysladm'));
	}

	public function check_regist_date()
	{
		$curdate = strtotime('now');
		$tournament = $this->m_tournament->filterstatusTournament(0);
		if(!empty($tournament))
		{
			foreach ($tournament as $t) 
			{
				if($t->registration_end <= $curdate)
				{
					$status = array('status'=>1);
					$this->m_tournament->update_status($status, $t->tournament_id);
				}
			}
		}
		$tournaments = $this->m_tournament->filterstatusTournament(3);
		if(!empty($tournaments))
		{
			foreach ($tournaments as $t) 
			{
				if ($t->tournament_start <= $curdate) 
				{
					$status = array('status'=>4);
					$this->m_tournament->update_status($status, $t->tournament_id);
				} 
				if ($t->tournament_end < $curdate)
				{
					$status = array('status'=>5);
					$this->m_tournament->update_status($status, $t->tournament_id);
				}
			}
		}
	}
}