<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_schedule extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();		
		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');
		$this->load->model('m_tournament');
		$this->load->model('m_schedule');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
	}

	public function index() {
		$this->load->view('home');
	}

	public function form_create()
	{
		$this->data['tid'] = $this->input->post('select2');
		$this->data['team_count'] = $this->m_schedule->get_team_count();
		$this->template->load('Manage/template', 'Manage/schedule/sched_create',$this->data);
	}

	public function rand_schedule() 
	{

	}

	public function list_schedule()
	{
		
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