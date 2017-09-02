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
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
	}

	public function index() {
		$this->load->view('home');
	}

	public function form_manage()
	{
		$this->data['tid'] = $this->input->post('select2');
		$this->data['list_schedule'] = $this->m_schedule->get_schedule($this->input->post('select2'));
		$this->template->load('Manage/template', 'Manage/schedule/manage_sch', $this->data);
	}

	public function form_create()
	{
		$this->data['tid'] = $this->input->post('select2');
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->data['tid']);
		$this->data['row_tournament'] = $this->m_tournament->get_row_byID($this->input->post('select2'));
		$this->template->load('Manage/template', 'Manage/schedule/sched_create',$this->data);
	}

	public function getBracket($nteam) 
	{
		$p = range(1, $nteam);
		$pCount = count($p);
		$this->sch_helper->set_rounds(ceil(log($pCount)/log(2)));
		$this->sch_helper->set_bracket_size(pow(2, $this->sch_helper->get_rounds()));
		$this->sch_helper->set_num_byes($this->sch_helper->get_bracket_size() - $pCount);

		// echo sprintf('Number of participants: %d<br/>%s', $pCount, PHP_EOL);
	 //    echo sprintf('Number of rounds: %d<br/>%s', $this->rounds, PHP_EOL);
	 //    echo sprintf('Bracket size: %d<br/>%s', $this->bracketSize, PHP_EOL);
	 //    echo sprintf('Required number of byes: %d<br/>%s', $this->byes, PHP_EOL);  

		if($pCount < 2) 
		{
			return array();
		}

		$matches = array(array(1,2));

		for($r = 1; $r < $this->sch_helper->get_rounds(); $r++)
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

	public function create_schedule()
	{
		// $matches = $this->getBracket($this->input->post('team_count'));
		$matches = $this->getBracket(17);
		// var_dump($matches);
		$tid = $this->input->post('tournament_id');
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
							$arrDate[$i] = date('h:i A', $time).' '.date('d/M/Y', $t_start);
							$time = strtotime('+'.$tot_gap.' minutes', $time);
							$i++;
						}
					}
				}
				$t_start = strtotime('+1 day', $t_start);
			}
			echo '<br> Number Slot of Times : '.$i.'<br>';
			$s = 0;
			$x = 0;
			while ($s < $i) { 
				if(count($matches) <= $s)
				{
					echo '<br>Unscheduled on'.$arrDate[$s];
				}
				else
				{
					if(empty($matches[$s][0]))
					{
						echo 'Match date : TBD <br>';
						echo $matches[$s][1].' VS Bye <br>';	
					}
					else if (empty($matches[$s][1]))
					{
						echo 'Match date : TBD <br>';
						echo $matches[$s][0].' VS Bye <br>';
					}
					else
					{
						echo 'Match date : '.$arrDate[$x].'<br>';
						echo $matches[$s][0].' VS '.$matches[$s][1].'<br>';
						$x++;
					}
				}
				$s++;
			}
		} 
		else
		{
			echo 'please select add the times';
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