<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!empty($_SESSION['id']))
		{
			redirect(site_url('adm'));
		}
		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');
		$this->load->model('m_admin');
	}

	public function index() 
	{
		$this->load->view('Manage/adm_login');
	}

	public function auth() 
	{
		if(empty($_SESSION['id'])){
			$data = $this->input->post();
	        $result = $this->m_admin->login($data);
        	if($result['status'] == 'loginfailed'){
        		$status['status'] = 'loginfailed';
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Wrong username or password.</div>');
	 			redirect(site_url('sysladm')); 
        	} else if ($result['status'] == 'ok') {
        		$newdata = array(
				        'id'  => $result['id'],
				        'name'  => $result['user'],
				        'role' => $result['role']
				);

				$this->session->set_userdata($newdata);

				$status['status'] = 'ok';
	 			redirect(site_url('adm'));   
        	}
	 		echo json_encode($status);    
		}
	}
}