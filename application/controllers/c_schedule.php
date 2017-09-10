<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_schedule extends CI_Controller
{
	public $data = array();
	public $winArr = array(array(1,2));

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

		//setTournamentID Data
		$this->t_helper->set_tid($this->input->post('select2'));

		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
	}

	public function form_manage()
	{
		$this->data['tid'] = $this->t_helper->get_tid();
		$this->data['list_schedule'] = $this->m_schedule->get_schedule($this->input->post('select2'));
		$this->data['list_match'] = $this->m_match->show_match_list();
		$this->template->load('Manage/template', 'Manage/schedule/manage_sch', $this->data);
	}

	public function form_create()
	{
		$this->data['tid'] = $this->t_helper->get_tid();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->data['tid']);
		$this->data['row_tournament'] = $this->m_tournament->get_row_byID($this->input->post('select2'));
		$this->data['setting'] = $this->m_tournament->get_setting_byID($this->input->post('select2'));
		$this->template->load('Manage/template', 'Manage/schedule/sched_create',$this->data);
	}

	public function getBracket($nteam) 
	{
		$p = range(1, $nteam);
		$pCount = count($p);

		$this->t_helper->set_rounds(ceil(log($pCount)/log(2)));
		$this->t_helper->set_bracket_size(pow(2, $this->t_helper->get_rounds()));
		$this->t_helper->set_num_byes($this->t_helper->get_bracket_size() - $pCount);
		$this->m_schedule->add_setting($this->t_helper->get_rounds(), $this->t_helper->get_bracket_size(), $this->input->post('tournament_id'));
		if($pCount < 2) 
		{
			return array();
		}
		
		$matches = array(array(1,2));
		$s=0;
		for($r = 1; $r < $this->t_helper->get_rounds(); $r++)
		{
			$roundMatches = array();
			$sum = pow(2, ($r+1)) + 1;
			foreach ($matches as $match) 
			{
				$home = $this->changeIntoBye($match[0], $pCount);
	            $away = $this->changeIntoBye($sum - $match[0], $pCount);
	            $roundMatches[] = array($home, $away);
	            $home = $this->changeIntoBye($sum - $match[1], $pCount);
	            $away = $this->changeIntoBye($match[1], $pCount);
	            $roundMatches[] = array($home, $away);
			}
			$matches = $roundMatches;
		}
		return $matches;
	}

	function changeIntoBye($seed, $pCount)
	{ 
	    return $seed <= $pCount ?  $seed : null;
	}

	public function getSchedule()
	{
		$tid = $this->input->post('tournament_id');
		$loc = $this->input->post('venue');
		$t_start = $this->input->post('start_tour');
		$t_end = $this->input->post('end_tour');
		//match time
		$gap = $this->input->post('time_gap');
		$start = strtotime($this->input->post('start_time'));
		$end = strtotime($this->input->post('end_time'));
		$game_dur = $this->input->post('gameduration');

		$tot_gap = $game_dur + $gap;

		if(isset($_POST['day'])) 
		{
			$i=0;
			$arrDate = array();
			while ($t_start <= $t_end) 
			{
				$curDay = date('D',$t_start);
				foreach ($_POST['day'] as $day) 
				{
					if($day==$curDay)
					{
						$time = $start;
						while ($time < $end) {
							$this->m_schedule->insert_schedule($t_start, $time, $tid);
							$arrDate[$i] = date('h:i A', $time).'&'.date('d/M/Y', $t_start);
							$time = strtotime('+'.$tot_gap.' minutes', $time);
							$i++;
						}
					}
				}
				$t_start = strtotime('+1 day', $t_start);
			}
			$dataSetting = array (
				'gap_per_game' => $gap,
				'venue' => $loc
				);
			$this->db->where('tournament_id',$tid)->update('tb_settings', $dataSetting);
			return $arrDate;
		} 
		else
		{
			echo 'please select add the times';
		}
	}

	public function create_match()
	{
		$tid = $this->input->post('tournament_id');
		$participant = $this->input->post('team_count');
		$arrTeam = $this->m_schedule->get_team_name($tid);
		$randTeam = array();
		foreach ($arrTeam as $data_team) {
			$randTeam[] = $data_team->team_name;
		}
		//shuffle team for tournament
		shuffle($randTeam);
		//chunk array to get exact number of group bracket
		$matches = array_chunk($this->getBracket($participant),2);
		//define first schedule id
		$index_date = $this->m_schedule->get_row_schedule();
		if($index_date!=0)
		{
			$sid = $this->m_schedule->get_max_id_schedule($tid);
		}
		else
		{
			$sid = 0;
		}
		//end define first schedule ID
		$sch_date = $this->getSchedule();
		//get total round for tournament
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
		//looping to create empty bracket
		for ($rnd=1; $rnd <= $max_round; $rnd++) 
		{ 
			$y=0;
			for ($i=0; $i < count($matches); $i++) 
			{
				for($j=0; $j < count($matches[$i]); $j++) 
				{
					if($rnd==1)
					{
						if(empty($matches[$i][$j][0]) || empty($matches[$i][$j][1]))
						{
							if(empty($matches[$i][$j][0]))
							{
								$randTeam[$matches[$i][$j][0]-1] = 'byes';
								$winner = array('winner' => $randTeam[$matches[$i][$j][1]-1]);
								$this->winArr[$y] = $randTeam[$matches[$i][$j][1]-1];
							}
							if(empty($matches[$i][$j][1]))
							{
								$randTeam[$matches[$i][$j][1]-1] = 'byes';
								$winner = array('winner' => $randTeam[$matches[$i][$j][0]-1]);
								$this->winArr[$y] = $randTeam[$matches[$i][$j][0]-1];
							}
							$dataTemp = array(
								'team_a' => $randTeam[$matches[$i][$j][0]-1],
								'team_b' => $randTeam[$matches[$i][$j][1]-1],
								'match_score' => '0v0',
								'match_status' => 0,
								'match_order' => $max_order,
								'round' => $rnd,
								'result' => 4,
								'tournament_id' => $tid
							);
							$data = array_merge($dataTemp,$winner);
						}
						else
						{
							$sid++;
							$data = array(
								'team_a' => $randTeam[$matches[$i][$j][0]-1],
								'team_b' => $randTeam[$matches[$i][$j][1]-1],
								'winner' => '',
								'match_score' => '0v0',
								'match_status' => 0,
								'match_order' => $max_order,
								'round' => $rnd,
								'result' => 0,
								'schedule_id' => $sid,
								'tournament_id' => $tid
							);
							$this->winArr[$y] = '';
						}	
						$y++;
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
				}
				$max_order++;
			}
			$matches = array_chunk($matches, 2);
		}
		json_encode($matches);
		$this->update_bracket($tid);
		redirect('adm');
	}

	public function clear_schedule()
	{
		$tid = $this->t_helper->get_tid();
		$this->m_schedule->clear_table();
		redirect('adm');
	}

	public function update_bracket($tid)
	{
		$min_order = $this->m_match->get_min_order_group($tid);
		$max_round = $this->m_tournament->get_setting_byID($tid)->round;
		$winArr = array();
		$sid = $this->m_match->get_max_id_schedule_match($tid)+3;
		for ($rnd=1; $rnd <= $max_round; $rnd++) 
		{
			$y=1;
			$matchesList = $this->m_match->get_match_data($tid, $rnd);
			$matches = array();

			foreach ($matchesList as $key) {
				$matches[] = $key;
			}
			$matches = array_chunk($matches, 2);
			$x=0;
			for ($i=0; $i < count($matches); $i++) 
			{
				for($j=0; $j < count($matches[$i]); $j++) 
				{
					if($rnd == 1)
					{
						$winArr[$y-1] = $matches[$i][$j]['winner'];
					}
					elseif($rnd==($max_round - floor($max_round/2)))
					{
						$sid++;
						$this->set_next_round_team($winArr[$x][0], 0, $matches[$i][$j]['match_id'], $sid);
						$this->set_next_round_team($winArr[$x][1], 1, $matches[$i][$j]['match_id'], $sid);
					}
					$x++;
					$y++;
				}
				$min_order++;
			}
			$winArr = array_chunk($winArr, 2);	
		}
		redirect('adm/schedule/manage');
	}

	public function set_next_round_team($team, $j, $mid, $sid)
	{
		if($j == 0)
		{
			return $this->m_match->update_a($team, $mid, $sid);
		}
		elseif($j == 1)
		{
			return $this->m_match->update_b($team, $mid, $sid);
		}
	}
//Reserved for Round Robin - Group Stage Tournament
	// public function matching_up($n)
	// {	
	// 	$nr = $n - 1;
	// 	$arr = '';
	// 	for($i=1; $i<$n; $i++)
	// 	{
	// 		for ($j=1; $j <= $n/2; $j++) { 
	// 			if($j==1){
	// 				$arr .= "Team ".$this->format(1)." VS Team ".$this->format(($n-1+$i-1) % ($n-1)+2).'<br>';
	// 			} else {
	// 				$arr .= "Team ".$this->format(($i+$j-2) % ($n-1)+2)." VS Team ".$this->format(($n-1+$i-$j) % ($n-1)+2).'<br>';
	// 			}
	// 		}
	// 		$this->data['list'] = $arr;
	// 	}
	// }
	// function format($x)
	// {
	// 	if($x < 10) {
	// 		return ' '+$x;
	// 	} else {
	// 		return $x;
	// 	}
	// }
}
?>