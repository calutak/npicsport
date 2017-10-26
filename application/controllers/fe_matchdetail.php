<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_matchdetail extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();		
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/match-detail');
		$this->load->view('frontend/banner/footer');
	}
}
?>