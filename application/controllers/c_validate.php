<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_validate extends CI_Controller
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
		$this->load->model('m_team');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tournament'] = $this->m_tournament->load_tournament();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());		
	}

	public function form_team_register()
	{
		$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
	}

	public function manage_team() 
	{
		$this->data['team_list'] = $this->m_team->load_team();
		$this->template->load('Manage/template', 'Manage/validate/validate_team', $this->data);
	}

	public function upload_image()
	{
		$upload_path 					= 'assets/uploads/TeamBanner/';
		$config['upload_path']          = './'.$upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_filename']			= 255;
	    $config['file_name'] 			= $_FILES['tBanner']['name'];
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
		    if(!$this->upload->do_upload('tBanner'))
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

	public function do_register()
	{
		$picture = array();

		// seting rules for input field //
		$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
		$this->form_validation->set_rules('trName', 'Tournament Name', 'required', array('required' => 'You must select {field}'));
		$this->form_validation->set_rules('tName', 'Team Name', 'required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('tEmail', 'Team Email', 'required|valid_email|min_length[2]|max_length[30]');
		if(empty($_FILES))
		{
			$this->form_validation->set_rules('tBanner', 'Team Banner', 'required|min_length[2]|max_length[350]');
		}
		$this->form_validation->set_rules('tFaculty', 'Faculty', 'required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('tMajor', 'Major', 'required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('tYear', 'Year', 'required|max_length[1]|numeric');
		$this->form_validation->set_rules('tnMember', 'Total Team Member', 'required|max_length[2]|numeric');
		// end rules set //

		// $tName = $this->check_name($this->input->post('tName'), $this->input->post('trName'));
		if(!$this->form_validation->run())
		{
			$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
		}
		else
		{

			$tName = $this->input->post('tName');
			$trId = $this->input->post('trName');
			$tEmail = $this->input->post('tEmail');
			$tFaculty = $this->input->post('tFaculty');
			$tMajor = $this->input->post('tMajor');
			$tYear = $this->input->post('tYear');
			$tnMember = $this->input->post('tnMember');
			$tId = $this->m_team->get_max_id($trId)->ti;
			
			if($this->check_name($tName, $trId) == TRUE)
			{
				if(empty($tId))
				{
					$tId = '0001';
				}
				else
				{
					$tId = $this->t_helper->autonumber_id(substr($this->m_team->get_max_id($trId)->ti, 11));
				}
				$picture = $this->upload_image();
				$data_team = array(
					'team_id' => $trId.'TE'.$tId,
					'team_name' => $tName,
					'tournament_id' => $trId,
					'team_email' => $tEmail,
					'faculty' => $tFaculty,
					'major' => $tMajor,
					'year' => $tYear,
					'team_banner' => $picture['path'].$picture['name']
				);
				$setting = array(
					'team_id' => $trId.'TE'.$tId,
					'num_member' => $tnMember
				);
				if($this->db->insert('tb_team', $data_team) && $this->db->insert('tb_team_settings', $setting))
				{
					$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Added team!</div>');
					redirect(site_url('adm/manage/team'));		
				}
				else
				{
					$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>There is an input error!</div>');
					redirect(site_url('adm/manage/team'));
				}		
			}
			else
			{
				$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
			}
		}
	}
	//next work
	public function generateKey($num)
	{
		$this->load->helper('string');

		return random_string('alnum', $num);
	}
	//next work
	public function create_team_credentials($id)
	{
		$randPasswd = $this->generateKey(8);
		$userName = $this->m_team->load_team_by_mid($id)->team_name . $this->generateKey(3);

		return $this->m_team->create_user_pass($userName, $randPasswd, $id);
	}

	public function check_name($tName, $tId)
	{
		$check = $this->m_team->check_name($tName, $tId);
		if($check > 0)
		{
			return FALSE;
		}
		else 
		{
			return TRUE;
		}
	}
	// Next work for register team modul
	public function send_mail_to_user($id)
	{
		$email = $this->m_team->load_team_by_mid($id)->team_email;

	}

	public function get_team_details($id)
	{
		echo json_encode($this->m_team->load_team_by_mid($id));
		exit;
	}

	public function validate_team($id, $isValid, $param)
	{
		if($isValid)
		{
			$this->m_team->update_status($id, $param);
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Validated!</div>');
		}
		else
		{
			return $this->m_team->rejected_team($id);
		}
	}

	public function delete_team($id)
	{
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data '.$id.' deleted!</div>');
		$this->db->where('team_id', $id)->delete('tb_team');
		redirect('adm/manage/team');
	}
}
?>