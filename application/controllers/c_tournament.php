<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tournament extends CI_Controller
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
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tmax'] = $this->m_tournament->get_max_id();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
	}

	public function create_tour() 
	{
		$this->template->load('Manage/template', 'Manage/tournament/create', $this->data);
	}

	public function edit_data_tour($id)
	{
		$this->data['rowbyid'] = $this->m_tournament->get_row_byID($id);
		$this->data['setting'] = $this->m_tournament->get_setting_byID($id);
		$this->template->load('Manage/template', 'Manage/tournament/edit_details', $this->data);
	}

	public function manage()
	{
		$this->template->load('Manage/template', 'Manage/tournament/manage', $this->data);
	}

	public function get_details($id)
	{
		$data = $this->m_tournament->get_row_byID($id);
		$data->tournament_start = date('d/M/Y', $data->tournament_start);
		$data->tournament_end = date('d/M/Y', $data->tournament_end);
		$data->registration_start = date('d/M/Y', $data->registration_start);
		$data->registration_end = date('d/M/Y', $data->registration_end);
		echo json_encode($data);
		exit;
	}

	public function insert_new_tour()
	{
		$t_startdate = strtotime(substr($this->input->post('tdate'),0,10));
		$t_enddate = strtotime(substr($this->input->post('tdate'),-10));
		$r_startdate = strtotime(substr($this->input->post('rdate'),0,10));
		$r_enddate = strtotime(substr($this->input->post('rdate'),-10));
		$zeroCount = $this->t_helper->autonumber_id($this->input->post('id'));
		if($this->m_tournament->get_row_tournament() > 0) 
		{
			$data_tournament = array(
				'tournament_id' => 'NPICT'.$zeroCount,
				'tournament_name' => $this->input->post('t_name'),
				'tournament_start' => $t_startdate,
				'tournament_desc' => $this->input->post('description'),
				'tournament_req' => $this->input->post('req'),
				'tournament_rules' => $this->input->post('rules'),
				'tournament_end' => $t_enddate,
				'tournament_year' => date('Y', $t_enddate),
				'registration_start' => $r_startdate,
				'registration_end' => $r_enddate,
				'type' => $this->input->post('select2')
			);
			$data_setting = array(
				'tournament_id' => 'NPICT'.$zeroCount,
				'max_team' => $this->input->post('max_team'),
				'max_team_faculty' => $this->input->post('max_team_fac'),
				'game_duration' => $this->input->post('game_dur'),
				'max_member' => $this->input->post('max_mem')
			);
		} 
		else 
		{
			$data_tournament = array(
				'tournament_id' => 'NPICT000'.($this->m_tournament->get_row_tournament() + 1),
				'tournament_name' => $this->input->post('t_name'),
				'tournament_start' => $t_startdate,
				'tournament_desc' => $this->input->post('description'),
				'tournament_req' => $this->input->post('req'),
				'tournament_rules' => $this->input->post('rules'),
				'tournament_end' => $t_enddate,
				'tournament_year' => date('Y', $t_enddate),
				'registration_start' => $r_startdate,
				'registration_end' => $r_enddate,
				'type' => $this->input->post('select2')
			);
			$data_setting = array(
				'tournament_id' => 'NPICT000'.($this->m_tournament->get_row_tournament() + 1),
				'max_team' => $this->input->post('max_team'),
				'max_team_faculty' => $this->input->post('max_team_fac'),
				'game_duration' => $this->input->post('game_dur'),
				'max_member' => $this->input->post('max_mem')
			);
		}
		if($this->db->insert('tb_tournament', $data_tournament) && $this->db->insert('tb_settings', $data_setting)) 
		{
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Created new tournament!</div>');
			redirect(site_url('adm/tournament/manage'));
		}
	}

	public function delete($id)
	{
		if($this->m_tournament->delete_row($id))
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
			$this->m_schedule->clear_schedule($id);
			redirect(site_url('adm/tournament/manage'));
		}
	}

	public function update()
	{
		$t_startdate = strtotime(substr($this->input->post('tdate'),0,10));
		$t_enddate = strtotime(substr($this->input->post('tdate'),-10));
		$r_startdate = strtotime(substr($this->input->post('rdate'),0,10));
		$r_enddate = strtotime(substr($this->input->post('rdate'),-10));

		$data_tournament = array(
				'tournament_name' => $this->input->post('t_name'),
				'tournament_start' => $t_startdate,
				'tournament_desc' => $this->input->post('description'),
				'tournament_req' => $this->input->post('req'),
				'tournament_rules' => $this->input->post('rules'),
				'tournament_end' => $t_enddate,
				'tournament_year' => date('Y', $t_enddate),
				'registration_start' => $r_startdate,
				'registration_end' => $r_enddate,
				'status' => 0,
				'type' => $this->input->post('select2')
			);
		$data_setting = array(
				'max_team' => $this->input->post('max_team'),
				'max_team_faculty' => $this->input->post('max_team_fac'),
				'game_duration' => $this->input->post('game_dur'),
				'max_member' => $this->input->post('max_mem')
			);
		$id = $this->input->post('t_id');
		if($this->m_tournament->update_data_tour($id, $data_tournament) && $this->m_tournament->update_data_setting($id, $data_setting))
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data has been updated!</div>');
			redirect(site_url('adm/tournament/manage'));
		}
	}

	public function clear_tournament_data()
	{
		if(!empty($_POST['sel']))
		{
			for ($i=0; $i < count($_POST['sel']); $i++) { 
				$this->m_tournament->delete_row($_POST['sel'][$i]);
			}
		}
		else
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No Data Selected!</div>');
			redirect(site_url('adm/tournament/manage'));
		}
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
		redirect(site_url('adm/tournament/manage'));
	}
}
?>