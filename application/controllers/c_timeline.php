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

		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');
		$this->load->model('m_tournament');
		$this->load->model('m_schedule');
		$this->load->model('m_timeline');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
    
	}
	public function create_post()
	{
		$this->template->load('Manage/template', 'Manage/timeline/create_timeline', $this->data);
	}

	public function posting_timeline()
	{
		$picture = $this->upload_image('assets/uploads/ThumbnailPost/');
		$datapost = array( 
			'timeline_details' => $this->input->post('description'),
			'timeline_title' => $this->input->post('title'),
			'timeline_date' => strtotime('now'),
			'timeline_cat' => $this->input->post('cat'),
			'timeline_thumbnail' => $picture['path'].$picture['name']
			);
		if($this->db->insert('tb_timeline', $datapost))
		{
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Timeline posted!</div>');
			redirect(site_url('adm/timeline/manage'));
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
		$picture = $this->upload_image('assets/uploads/ThumbnailPost/');
		$datapost = array (
				'timeline_details' => $this->input->post('description'),
				'timeline_title' => $this->input->post('title'),
				'timeline_date' => strtotime('now'),
				'timeline_cat' => $this->input->post('cat'),
				'timeline_thumbnail' => $picture['path'].$picture['name']
			);
		if($this->m_timeline->update_post($id,$datapost))
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data has been updated!</div>');
			redirect(site_url('adm/timeline/manage'));
		}
	}

	public function delete_post($id)
	{
		if($this->m_timeline->delete_post($id))
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
			redirect(site_url('adm/timeline/manage'));
		}
	}

	public function upload_image($path)
	{
		$upload_path 					= $path;
		$config['upload_path']          = './'.$upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_filename']			= 255;
	    $config['file_name'] 			= $_FILES['name'];
	    $image_data = array();
	    $is_file_error = FALSE;

	    if($_FILES) 
	    {
	    	$is_file_error = TRUE;
	    	//$this->handle_error('Select an Image file');
	    }
	    if($is_file_error) 
	    {
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
		    if(!$this->upload->do_upload('thumbnailpost'))
		    {
		    	//$this->handle_error($this->upload->display_errors());
                $is_file_error = TRUE;
		    }
		    else
		    {
		    	$image_data = $this->upload->data();
		    	$config['image_library'] = 'gd2';
                $config['source_image'] = $image_data['full_path']; //get original image
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                $config['height'] = 100;
                $this->load->library('image_lib', $config);
                if (!$this->image_lib->resize()) {

                } 
		    }
	    }
        if ($is_file_error) {
            if ($image_data) {
                $file = $image_data['file_name'];
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        } else {
            $file = $image_data['file_name'];
        }
        $picture_data['name'] = $file;
     	$picture_data['path'] = $upload_path;  
        return $picture_data;
	}
}