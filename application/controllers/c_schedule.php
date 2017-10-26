<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_schedule extends CI_Controller
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

		//setTournamentID Data
		$this->t_helper->set_tid($this->input->post('select2'));

		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
	}

	public function find_schedule()
	{
		$dataPost = $this->input->post();
		$json['id'] = $dataPost['tournamentid'];
		$json['url'] = site_url('adm/schedule/manage/').$dataPost['tournamentid'];
		echo json_encode($json);
		exit;
	}

	public function find_tournament()
	{
		$dataPost = $this->input->post();
		$json['id'] = $dataPost['tournamentid'];
		if($this->m_match->mlist_count($json['id']) <= 0)
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>You need to did the drawing Team First!</div>');
			$json['url'] = site_url('adm/drawing');
		}
		else
		{
			$json['url'] = site_url('adm/schedule/create/').$dataPost['tournamentid'];
		}
		echo json_encode($json);
		exit;
	}

	public function form_manage($tournamentid)
	{
		$this->data['tid'] = $tournamentid;
		$this->data['list_match'] = $this->m_match->show_match_list($tournamentid);
		$this->data['team_count'] = $this->m_schedule->get_team_count($tournamentid);
		$this->template->load('Manage/template', 'Manage/schedule/manage_sch', $this->data);
	}

	public function form_create($tid)
	{
		$this->data['tid'] = $tid;
		$this->data['row_tournament'] = $this->m_tournament->get_row_byID($tid);
		$this->data['match'] = $this->m_match->get_match_data($tid,1);
		$this->data['setting'] = $this->m_tournament->get_setting_byID($tid);
		$this->data['team_count'] = $this->m_schedule->get_team_count($tid);
		$this->template->load('Manage/template', 'Manage/schedule/sched_create',$this->data);
	}

	public function createSchedule($tid, &$i)
	{
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
		} 
		else
		{
			echo 'please select add the times';
		}
	}

	public function append_schedule($tid)
	{
		//get total round for tournament
		$max_round = $this->m_tournament->get_setting_byID($tid)->round;
		//set sid
		$index_date = $this->m_schedule->get_row_schedule();
		$this->createSchedule($tid, $i);
		if($index_date!=0)
		{
			$sid = $this->m_schedule->get_min_id_schedule($tid);
		}
		else
		{
			$sid = 1;
		}
		for ($rnd=1; $rnd <= $max_round+1; $rnd++) { 
			$matches = $this->m_match->get_match_data($tid,$rnd);
			foreach ($matches as $m) 
			{
				$this->m_schedule->append_schedule($m['match_id'], $sid);
				$sid++;
			}	
		}
		$status = array('status'=>3);
		$this->m_tournament->update_status($status, $tid);
		redirect(site_url('adm'));
	}

	public function clear_schedule($tid)
	{
		$this->m_match->clear_match_data($tid);
		$this->m_schedule->clear_schedule($tid);
		$status = array('status'=>1);
		$this->m_tournament->update_status($status, $tid);
		redirect('adm');
	}

	public function edit_schedule()
	{
		$dataAjax = array();
		$fromAjax = explode('-', $this->input->post('id'));
		$dataAjax['tid'] = $fromAjax[0];
		$dataAjax['mid'] = $fromAjax[1];
		$dataAjax['sid'] = $fromAjax[2];
		$dataAjax['row_schedule'] = $this->m_schedule->get_schedule_byID($dataAjax['sid']);
		$dataAjax['list_schedule'] = $this->m_schedule->get_filtered_schedule($dataAjax['tid']);
		$dataAjax['data_tournament'] = $this->m_tournament->get_row_byID($dataAjax['tid']);
		echo $this->load->view('ajax/modal_edit_schedule', $dataAjax, true);
		// foreach ($this->m_schedule->get_schedule($dataAjax['tid']) as $key) {
		// 	$temp[] = $key->schedule_time;
		// }
		// sort($temp);
		// $res = array_unique($temp);
		// foreach ($res as $key) {
		// 	$result[] = date('h:i a', $key);
		// }
		// echo json_encode($result);
		exit;
	}

	public function update_schedule($sid, $mid, $tid)
	{
		$data = array(
			'schedule_date' => strtotime($this->input->post('date')),
			'schedule_time' => strtotime($this->input->post('time'))
		);
		if($this->m_schedule->upd_schedule($sid, $data))
		{
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Member Updated!</div>');
			redirect(site_url('adm/schedule/manage/').$tid);
		}
	}

	public function date_time_check()
	{
		$datetime = array(
			'schedule_date'=>strtotime($this->input->post('date')),
			'schedule_time'=>strtotime($this->input->post('time'))
		);
		$tid = $this->input->post('tid');
		$gap = $this->m_tournament->get_setting_byID($tid)->gap_per_game;
		$gamedur = $this->m_tournament->get_setting_byID($tid)->game_duration;
		$total = $gap+$gamedur;
		$checkT = $this->m_schedule->schedule_check($datetime,$tid);
		//query in between buat periksa jam supaya aman
		//skip dulu bray, ini dri db nya
		if($checkT>0)
		{
			$stat['response'] = true;
		}
		else
		{
			$checkD = $this->m_schedule->schedule_check($datetime,$tid);
			if($checkT>0)
			{
				$stat['response'] = true;
				$stat['datetime'] = $datetime;
			}
			else
			{
				$stat['response'] = false;
				$stat['datetime'] = $datetime;
			}
		}
		echo json_encode($stat);
		exit;
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