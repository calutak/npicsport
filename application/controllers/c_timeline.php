<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends CI_Controller
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
		$this->load->model('m_timeline');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
 
		$this->ckeditor->basePath = base_url().'assets/plugins/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
	                array( 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList','-')
	                                                    );
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '350px';            
	}

	public function create_post()
	{
		$this->template->load('Manage/template', 'Manage/timeline/create_timeline', $this->data);
	}

	public function posting_timeline()
	{
		$datapost = array( 
			'timeline_details' => $this->input->post('description'),
			'timeline_title' => $this->input->post('title'),
			'timeline_date' => strtotime('now')
			);
		if($this->db->insert('tb_timeline', $datapost))
		{
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Timeline posted!</div>');
			redirect(site_url('timeline/manage'));
		}
	}

	public function view_post()
	{
		$this->data['show_timeline_post'] = $this->m_timeline->load_post();
		$this->template->load('Manage/template', 'Manage/timeline/manage_timeline', $this->data);
	}

	public function edit_post($id)
	{
		$this->data['tlrow'] = $this->m_timeline->getrow($id);
		$this->template->load('Manage/template', 'Manage/timeline/edit_post', $this->data);
	}

	public function update_post()
	{
		$id = $this->input->post('id');
		$datapost = array (
				'timeline_details' => $this->input->post('description'),
				'timeline_title' => $this->input->post('title'),
				'timeline_date' => strtotime('now')
			);
		if($this->m_timeline->update_post($id,$datapost))
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data has been updated!</div>');
			redirect(site_url('timeline/manage'));
		}
	}

	public function delete_post($id)
	{
		if($this->m_timeline->delete_post($id))
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
			redirect(site_url('timeline/manage'));
		}
	}
}