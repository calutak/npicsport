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
		$this->template->load('Manage/template', 'Manage/schedule/sched_create',$this->data);
	}

	public function rand_schedule() 
	{

	}

	public function list_schedule()
	{
		
	}
}
?>