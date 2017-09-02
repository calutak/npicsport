<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_message extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();
		if(empty($_SESSION['id']))
		{
			redirect(site_url('sysladm'));
		}

		$this->load->helper('ckeditor');
		$this->load->library('ckeditor');

		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');
		$this->load->model('m_tournament');
		$this->load->model('m_schedule');
		$this->load->model('m_message');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
 
		$this->ckeditor->basePath = base_url().'assets/plugins/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
	                array( 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
	                                                    );
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '350px';   		
	}

	public function form_broadcast() {
		$this->template->load('Manage/template','Manage/message/create_broadcast',$this->data);
	}
}
?>