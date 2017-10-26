<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_drawing extends CI_Controller
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
		$this->load->model('m_match');
		$this->load->model('m_team');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
	}

	public function drawing_page()
	{
		$this->template->load('Manage/template', 'Manage/Drawing/drawing_page', $this->data);
	}

	public function find_data()
	{
		$dataAjax['tid'] = $this->input->post('tid');
		$dataAjax['registered_team'] = $this->m_schedule->get_team_name($dataAjax['tid']);
		echo $this->load->view('ajax/drawing/drawing_knockout', $dataAjax, true);
		if(!empty($dataAjax['registered_team']))
		{
			foreach ($dataAjax['registered_team'] as $key) {
				$res[] = $key->team_name;
			}
			$dataAjax['res'] = $res;
			echo json_encode($dataAjax['res']);
		}
		exit;
	}

	public function bracket()
	{
		$this->template->load('Manage/template', 'Manage/Drawing/bracket', $this->data);
	}

	// public function retrieve_bracket()
	// {
	// 	$matchList = $this->m_match->get_match_data('NPICT0001',1);
	// 	$matches = array();
	// 	$matches = array_chunk($matches, 2);
	// 	foreach ($matchList as $key) {
	// 		$matches[] = $key;
	// 	}

	// 	$defined = array();
	// 	$defined = array_chunk($defined, 2);
	// 	for ($i=0; $i < count($matches); $i++) { 
	// 		$defined[$i][0] = $matches[$i]['team_a'];
	// 		$defined[$i][1] = $matches[$i]['team_b'];
	// 	}

	// 	$this->set_result('NPICT0001',$result, $max_round);
	// 	$results = array();
	// 	$results = array_chunk($results, 2);
	// 	for ($i=0; $i < $max_round; $i++) { 
	// 		for ($j=0; $j < count($result[$i]); $j++) {
	// 			$score = explode('v', $result[$i][$j]); 
	// 			$results[] = array((int)$score[0],(int)$score[1]);
	// 		}
	// 	}
	// 	$data['team'] = $defined;
	// 	$data['result'] = $results;
	// 	echo json_encode($data);
	// 	exit;
	// }

	// public function set_result($tid, &$result, &$max_round)
	// {
	// 	$min_order = $this->m_match->get_min_order_group($tid);
	// 	$max_round = $this->m_tournament->get_setting_byID($tid)->round;
	// 	for ($rnd=0; $rnd <= $max_round; $rnd++) 
	// 	{
	// 		$matchesList = $this->m_match->get_match_data($tid, $rnd);
	// 		$matches = array();

	// 		foreach ($matchesList as $key) {
	// 			$matches[] = $key['match_score'];
	// 		}
	// 		$result[] = array_merge($matches);
	// 		$matches = array_chunk($matches, 2);
	// 	}
	// }

	public function getBracket($nteam, $tid, &$bCount) 
	{
		$p = range(1, $nteam);
		$pCount = count($p);

		$this->t_helper->set_rounds(ceil(log($pCount)/log(2)));
		$this->t_helper->set_bracket_size(pow(2, $this->t_helper->get_rounds()));
		$this->t_helper->set_num_byes($this->t_helper->get_bracket_size() - $pCount);
		$this->m_schedule->add_setting($this->t_helper->get_rounds(), $this->t_helper->get_bracket_size(), $tid);
		if($pCount < 2) 
		{
			return array();
		}
		$bCount = $this->t_helper->get_bracket_size();
	}

	public function create_match($tid)
	{
		$participant = $this->input->post('counts');
		//get exact number of group bracket
		$this->getBracket($participant, $tid, $bCount);
		foreach ($_POST['team'] as $match) 
		{
			$matches[] = $match;
		}
		//chunk array to get exact number of group bracket
		$matches = array_chunk($matches,2);
		
		$max_round = $this->m_tournament->get_setting_byID($tid)->round;
		//get match order
		if($this->m_match->get_1st_match_count($tid)==0)
		{
			$max_order = 0;
		}
		else
		{
			$max_order = $this->m_match->get_max_order_group($tid);
		}
		// looping to create empty bracket
		if($max_round > 1)
		{
			for ($rnd=1; $rnd <= $max_round+1; $rnd++) 
			{ 
				for ($i=0; $i < count($matches); $i++) 
				{
					if($rnd==1)
					{
						$data = array(
							'team_a' => $matches[$i][0],
							'team_b' => $matches[$i][1],
							'winner' => '',
							'match_score' => '0v0',
							'match_status' => 0,
							'match_order' => $max_order,
							'round' => $rnd,
							'result' => 0,
							'tournament_id' => $tid
						);
					} 
					else
					{
						$data = array(
							'team_a' => '',
							'team_b' => '',
							'winner' => '',
							'match_score' => '0v0',
							'match_status' => 0,
							'match_order' => $max_order,
							'round' => $rnd,
							'result' => 0,
							'tournament_id' => $tid
						);
					}
					$this->db->insert('tb_match', $data);
					$max_order++;
				}
				$matches = array_chunk($matches, 2);
			}
		}
		else
		{
			$data = array(
				'team_a' => $matches[0][0],
				'team_b' => $matches[0][1],
				'winner' => '',
				'match_score' => '0v0',
				'match_status' => 0,
				'match_order' => $max_order,
				'round' => $max_round,
				'result' => 0,
				'tournament_id' => $tid
			);
			$this->db->insert('tb_match', $data);
		}
		$setting = array('status'=>2);
		$this->m_tournament->update_status($setting,$tid);
		redirect(site_url('adm/drawing'));
	}
}
?>