<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_home extends CI_Controller
{
	
	public $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_match');
		$this->load->model('m_timeline');
		$this->load->model('m_tournament');

		$this->data['Timeline'] = $this->m_timeline->load_post(3);
		$this->data['Headlines'] = $this->m_timeline->load_headline();
	}

	public function index() 
	{
		$this->data['topheadlines'] = $this->m_timeline->load_top_headline();
		$this->latest_match($latest);
		$this->data['result'] = $latest;
		if(!empty($this->m_match->show_ready_matches()))
		{
			$this->nextmatch($result);
			$this->matches($matches);

			$this->data['Match'] = $matches;
			$this->data['nextmatch'] = $result;
		}
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Timeline',$this->data);
		$this->load->view('frontend/banner/footer');
	}

	public function latest_match(&$latest)
	{
		$matches = $this->m_match->latest_matches();
		
		if(!empty($matches))
		{
			$this->findLtTournament($tname);
			foreach ($tname as $k1) {
				foreach ($matches as $k2) {
					if($k1==$k2->tName)
					{
						$late[$k1] = $k2;
					}
				}
				$latest[$k1] = array_pop($late);
			}
		}
	}
	public function matches(&$matches)
	{
		$match = $this->m_match->show_ready_matches();
		$this->findTournament($tname);
		foreach ($tname as $k1) {
			foreach ($match as $k2) {
				if($k1==$k2->tName)
				{
					$matches[$k1] = $k2;
				}
			}
			// $matches[$k1] = array_pop($late);
		}
	}
	public function nextmatch(&$result)
	{
		$curdate = strtotime('now');
		$rs = $curdate;
		foreach ($this->m_match->show_ready_matches() as $key) {
			$minDate[] = abs($curdate - ($key->dates + $key->times));
		}
		$test = $this->m_match->show_ready_matches();
		asort($minDate);
		$index = key($minDate);
		$result['date'] = $test[$index]->dates;
		$result['teamA'] = $test[$index]->teamA;
		$result['teamB'] = $test[$index]->teamB;
		$result['time'] = $test[$index]->times;
		$result['loc'] = $test[$index]->loc;
	}
	public function findTournament(&$tname)
	{
		foreach ($this->m_match->tournament_name() as $key) {
			$tname[] = $key->tName;
		}
	}
	public function findLtTournament(&$tname)
	{
		foreach ($this->m_match->lt_tournament_name() as $key) {
			$tname[] = $key->tName;
		}
	}

	public function find_news($id)
	{
		$this->data['news'] = $this->m_timeline->getrow($id);
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Post',$this->data);
		$this->load->view('frontend/banner/footer');
	}
}
?>