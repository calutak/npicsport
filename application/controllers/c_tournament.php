<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tournament extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');		
		$this->load->model('m_tournament');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['tmax'] = $this->m_tournament->get_max_id();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
	}

	public function index() 
	{
		$this->load->view('home');
	}

	public function create_tour() 
	{
		$this->template->load('Manage/template', 'Manage/tournament/create', $this->data);
	}

	public function edit_data_tour($id)
	{
		$this->data['rowbyid'] = $this->m_tournament->get_row_byID($id);
		$this->template->load('Manage/template', 'Manage/tournament/edit_details', $this->data);
	}

	public function show_details($id)
	{
		$this->data['rowbyid'] = $this->m_tournament->get_row_byID($id);
	}

	public function manage()
	{
		$this->template->load('Manage/template', 'Manage/tournament/manage', $this->data);
	}

	public function show_history()
	{
		$this->template->load('Manage/template', 'Manage/tournament/history', $this->data);
	}

	public function find_tournament_year()
	{
		// $year = $this->input->post('select2');
		// $this->data['yearfilteredData'] = $this->m_tournament->filteryearTournament($year);
		// $this->data['form_findtourhistory'] = ;
		// $this->template->load('Manage/template', 'Manage/tournament/history', $this->data);
		// echo $autoNumber;
	}

	public function insert_new_tour()
	{
		$autoNumber = substr($this->input->post('tournament_id'), -1);
		$t_startdate = strtotime(substr($this->input->post('tdate'),0,10));
		$t_enddate = strtotime(substr($this->input->post('tdate'),-10));
		$r_startdate = strtotime(substr($this->input->post('rdate'),0,10));
		$r_enddate = strtotime(substr($this->input->post('rdate'),-10));
		if($this->m_tournament->get_row_tournament() > 0) 
		{
			$data_tournament = array(
				'tournament_id' => 'NPICT'.(substr($this->input->post('id'), -1) + 1),
				'tournament_name' => $this->input->post('t_name'),
				'tournament_start' => $t_startdate,
				'tournament_desc' => $this->input->post('description'),
				'tournament_req' => $this->input->post('req'),
				'tournament_rules' => $this->input->post('rules'),
				'tournament_end' => $t_enddate,
				'tournament_year' => date('Y', $t_enddate),
				'registration_start' => $r_startdate,
				'registration_end' => $r_enddate,
				'min_games' => $this->input->post('min_games'),
				'game_duration' => $this->input->post('game_dur'),
				'type' => $this->input->post('select2')
			);
			if($this->db->insert('tb_tournament', $data_tournament)) 
			{
				$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Created new tournament!</div>');
				redirect(site_url('tournament/manage'));
			}
		} 
		else 
		{
			$data_tournament = array(
					'tournament_id' => 'NPICT'.($this->m_tournament->get_row_tournament() + 1),
					'tournament_name' => $this->input->post('t_name'),
					'tournament_start' => $t_startdate,
					'tournament_desc' => $this->input->post('description'),
					'tournament_req' => $this->input->post('req'),
					'tournament_rules' => $this->input->post('rules'),
					'tournament_end' => $t_enddate,
					'tournament_year' => date('Y', $t_enddate),
					'registration_start' => $r_startdate,
					'registration_end' => $r_enddate,
					'min_games' => $this->input->post('min_games'),
					'game_duration' => $this->input->post('game_dur'),
					'type' => $this->input->post('select2')
				);
			if($this->db->insert('tb_tournament', $data_tournament)) 
			{
				$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Created new tournament!</div>');
				redirect(site_url('tournament/manage'));
			}
		}
	}

	public function delete($id)
	{
		if($this->m_tournament->delete_row($id))
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
			redirect(site_url('tournament/manage'));
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
				'min_games' => $this->input->post('min_games'),
				'game_duration' => $this->input->post('game_dur'),
				'type' => $this->input->post('select2')
			);
		$id = $this->input->post('t_id');
		if($this->m_tournament->update_data_tour($id, $data_tournament))
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data has been updated!</div>');
			redirect(site_url('tournament/manage'));
		}
	}
	public function matching_up($n)
	{	
		$nr = $n - 1;
		$arr = '';
		for($i=1; $i<$n; $i++)
		{
			for ($j=1; $j <= $n/2; $j++) { 
				if($j==1){
					$arr .= "Team ".$this->format(1)." VS Team ".$this->format(($n-1+$i-1) % ($n-1)+2).'<br>';
				} else {
					$arr .= "Team ".$this->format(($i+$j-2) % ($n-1)+2)." VS Team ".$this->format(($n-1+$i-$j) % ($n-1)+2).'<br>';
				}
			}
			$this->data['list'] = $arr;
		}
	}
	function format($x)
	{
		if($x < 10) {
			return ' '+$x;
		} else {
			return $x;
		}
	}

}
?>