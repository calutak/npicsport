<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_teamdetails extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();		
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Team-details');
		$this->load->view('frontend/banner/footer');
	}
}
?>