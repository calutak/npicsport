<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_match extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_match');	
		$this->load->model('m_tournament');
		$this->data['tournament']=$this->m_tournament->load_tournament();	
	}


	public function index() {
		$this->data['Match']=$this->m_match->show_match_list();
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Match',$this->data);
		$this->load->view('frontend/banner/footer');
	}
}
?>