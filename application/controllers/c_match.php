<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_match extends CI_Controller
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
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
	}

	public function index()
	{
		$this->template->load('Manage/template', 'Manage/match/match', $this->data);
	}

	public function find_match()
	{
		$this->dataAjax['match_list'] = $this->m_match->show_match_list($this->input->post('tid'));
		$this->dataAjax['tid'] = $this->input->post('tid');
		echo $this->load->view('ajax/match_update', $this->dataAjax, true);
		exit;
	}

	public function update_match_all()
	{
		$tid = $this->input->post('tid');
		$count = count($this->m_match->show_match_list($tid));
		$arrSA = $_POST['updateallA'];
		$arrSB = $_POST['updateallB'];
		$mid = $this->m_match->show_match_list($tid);

		for($i=0;$i<$count;$i++)
		{
			if(!empty($mid[$i]->teamA) and !empty($mid[$i]->teamB))
			{
				if($arrSA[$i] > $arrSB[$i])
				{
					$winner = $mid[$i]->teamA;
					$rs = 1;
				}
				elseif ($arrSA[$i]==0 and $arrSB[$i]==0) 
				{
				 	$rs=0;
				 	$winner='';
				} 
				else 
				{
					$winner = $mid[$i]->teamB;
					$rs = 2;
				}
				$data = array(
					'match_score' => $arrSA[$i].'v'.$arrSB[$i],
					'winner' => $winner,
					'match_status' => 1,
					'result' => $rs
				);
				if($this->m_match->update_match($mid[$i]->mId, $data))
				{
					$this->update_bracket($tid);
				}	
			}
			else
			{
				$i = $count;
			}
		}
		$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Updated!</div>');
		redirect(site_url('adm/match'));
	}

	public function update_match()
	{
		$mid = $this->input->post('mid');
		$tid = $this->input->post('tid');
		$sA = $this->input->post('scoreA');
		$sB = $this->input->post('scoreB');
		if($sA > $sB)
		{
			$winner = $this->input->post('tA');
			$rs = 1;
		} else {
			$winner = $this->input->post('tB');
			$rs = 2;
		}
		$data = array(
			'match_score' => $sA.'v'.$sB,
			'winner' => $winner,
			'match_status' => 1,
			'result' => $rs
		);
		if($this->m_match->update_match($mid, $data))
		{
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Updated!</div>');
			$this->update_bracket($tid);
			$this->dataAjax['url'] = site_url('adm/match');
			echo json_encode($this->dataAjax['url']);
			exit;
		}
	}

	public function update_bracket($tid)
	{
		$max_round = $this->m_tournament->get_setting_byID($tid)->round;
		if($max_round>1)
		{
			for ($rnd=1; $rnd <= $max_round; $rnd++) 
			{
				if($rnd != 1 && $rnd <= ($max_round-1))
				{
					$lastMatches = $this->m_match->get_match_data($tid, $rnd-1);
					$matchesList = $this->m_match->get_match_data($tid, $rnd);
					$y=0;
					for($i=0;$i<count($matchesList);$i++)
					{
						$this->set_next_round_team($lastMatches[$y]['winner'],0,$matchesList[$i]['match_id']);
						$this->set_next_round_team($lastMatches[$y+1]['winner'],1,$matchesList[$i]['match_id']);
						$y+=2;
					}
				}
				elseif ($rnd == $max_round)
				{
					$lastMatches = $this->m_match->get_match_data($tid, $rnd-1);
					$winnerBracket = $this->m_match->get_match_data($tid, $rnd);
					$loserBracket = $this->m_match->get_match_data($tid, $rnd+1);
					//set for winner bracket
					$this->set_next_round_team($lastMatches[0]['winner'],0,$winnerBracket[0]['match_id']);
					$this->set_next_round_team($lastMatches[1]['winner'],1,$winnerBracket[0]['match_id']);
					//set for loser bracket
					$score1 = explode('v', $lastMatches[0]['match_score']);
					$score2 = explode('v', $lastMatches[1]['match_score']);
					if((int)$score1[0] > (int)$score1[1])
					{
						$this->set_next_round_team($lastMatches[0]['team_b'],0,$loserBracket[0]['match_id']);
					}
					elseif((int)$score1[0] < (int)$score1[1])
					{
						$this->set_next_round_team($lastMatches[0]['team_a'],0,$loserBracket[0]['match_id']);
					}
					if((int)$score2[0] > (int)$score2[1])
					{
						$this->set_next_round_team($lastMatches[1]['team_b'],1,$loserBracket[0]['match_id']);
					}
					elseif((int)$score2[0] < (int)$score2[1])
					{
						$this->set_next_round_team($lastMatches[1]['team_a'],1,$loserBracket[0]['match_id']);
					}
				}
			}
		}
	}

	public function set_next_round_team($team, $j, $mid)
	{
		if($j == 0)
		{
			return $this->m_match->update_a($team, $mid);
		}
		elseif($j == 1)
		{
			return $this->m_match->update_b($team, $mid);
		}
	}
}
?>