<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_matchresult extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_tournament', 'mt');
		$this->load->model('m_match');

		$this->data['tournament'] = $this->mt->load_tournament();
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/match-result', $this->data);
		$this->load->view('frontend/banner/footer');
	}

	public function retrieve_list_date($id) {
		$list = $this->m_match->show_match_list($id);
		foreach ($list as $key) {
			$dates[$key->dates] = date('d M Y', $key->dates);
		}
		echo json_encode($dates);
	}

	public function retrieve_matches()
	{
		$tid = $this->input->post('tid');
		$date = $this->input->post('date');

		$matches = $this->m_match->show_matches($tid, $date);
		echo json_encode($matches);
	}
}
?>