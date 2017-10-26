<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_tournament extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tournament', 'mt');
		$this->load->model('m_match', 'mm');
		$this->load->model('m_team');

		$this->data['tournament'] = $this->mt->load_tournament();
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Tournament', $this->data);
		$this->load->view('frontend/banner/footer');
	}

	public function fill_bracket_team()
	{
		$tid = $this->input->post('select');
		$matchList = $this->mm->get_match_data($tid,1);
		$tournament = $this->mt->get_row_byID($tid);

		$matches = array();
		$matches = array_chunk($matches, 2);
		foreach ($matchList as $key) {
			$matches[] = $key;
		}

		$defined = array();
		$defined = array_chunk($defined, 2);
		for ($i=0; $i < count($matches); $i++) { 
			$defined[$i][0] = $matches[$i]['team_a'];
			$defined[$i][1] = $matches[$i]['team_b'];
		}

		$this->set_result($tid,$result, $max_round);

		$data['tname'] = $tournament->tournament_name;
		$data['tstart'] = date('l, d M Y',$tournament->tournament_start);
		$data['tend'] = date('l, d M Y',$tournament->tournament_end);
		$data['rstart'] = date('l, d M Y',$tournament->registration_start);
		$data['rend'] = date('l, d M Y',$tournament->registration_end);
		$data['desc'] = $tournament->tournament_desc;
		$data['req'] = $tournament->tournament_req;
		$data['rules'] = $tournament->tournament_rules;
		if(!empty($this->m_team->count_team($tid)))
		{
			$data['rt'] = $this->m_team->count_team($tid);
		}
		else
		{
			$data['rt'] = 0;
		}
		$data['stat'] = $tournament->status;
		$data['team'] = $defined;
		$data['result'] = $result;
		echo json_encode($data);
		exit;
	}

	public function set_result($tid, &$result, &$max_round)
	{
		$max_round = $this->mt->get_setting_byID($tid)->round;
		$r=0;
		for ($rnd=1; $rnd <= $max_round+1; $rnd++) 
		{
			$matchesList = $this->mm->get_match_data($tid, $rnd);
			$matches = array();
			foreach ($matchesList as $key) {
				$score = explode('v', $key['match_score']); 
				$matches[] = array((int)$score[0],(int)$score[1]);
			}
			$result[] = array_merge($matches);
			$matches = array_chunk($matches, 2);
			$r++;
		}
		$result[$r-2] = array_merge($result[$r-2],$result[$r-1]);
		array_pop($result);
	}
}
?>