<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_gallery extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_timeline');		
	}

	public function index() {
		$data['gallery'] = $this->m_timeline->load_gallery();
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Gallery', $data);
		$this->load->view('frontend/banner/footer');
	}
}
?>