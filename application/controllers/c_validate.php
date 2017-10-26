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
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());		
	}

	public function delete_all_team()
	{
		if(!empty($_POST['sel']))
		{
			for ($i=0; $i < count($_POST['sel']); $i++) { 
				$this->db->where('team_id', $_POST['sel'][$i])->delete('tb_team');
			}
		}
		else
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No Data Selected!</div>');
			redirect('adm/manage/team');
		}
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data team deleted!</div>');
		redirect('adm/manage/team');
	}

	public function delete_all_member($teamid)
	{
		$this->db->where('team_id', $teamid)->delete('tb_team_member');
	}

	public function form_team_register()
	{
		$this->data['tournament'] = $this->m_tournament->filterstatusTournament(0);
		$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
	}

	public function form_add_member($mid)
	{
		$this->data['mid'] = $mid;
		$this->data['major'] = $this->m_team->load_team_by_mid($mid)->major;
		$this->data['year'] = $this->m_team->load_team_by_mid($mid)->year;
		$this->data['maxMem'] = $this->m_team->get_team_setting_byID($mid)->num_member;
		$this->data['curMem'] = $this->m_team->count_member($mid);
		$this->template->load('Manage/template', 'Manage/validate/add_team_member', $this->data);
	}

	public function form_edit_member($teamid, $memberid)
	{
		$this->data['dtt'] = $this->m_team->load_team_by_mid($teamid);
		$this->data['dtm'] = $this->m_team->load_member_by_memberid($memberid);
		$this->template->load('Manage/template', 'Manage/validate/edit_member', $this->data);
	}

	public function form_edit_team($teamid)
	{
		$this->data['dtt'] = $this->m_team->load_team_by_mid($teamid);
		$this->data['dts'] = $this->m_team->get_team_setting_byID($teamid);
		$this->template->load('Manage/template', 'Manage/validate/edit_team', $this->data);
	}

	public function manage_team() 
	{
		$this->data['team_list'] = $this->m_team->load_team();
		$this->template->load('Manage/template', 'Manage/validate/validate_team', $this->data);
	}

	public function manage_team_member($teamID) 
	{
		$this->data['teamname'] = $this->m_team->load_team_by_mid($teamID)->team_name;
		$this->data['teamID'] = $teamID;
		$this->data['member_list'] = $this->m_team->load_member_by_teamid($teamID);
		$this->template->load('Manage/template', 'Manage/validate/manage_member', $this->data);
	}

	public function delete_image($name)
	{
		$file = site_url('assets/uploads/Team').$name;
		if(file_exists($file))
		{
			unlink($file);
		}
	}

	public function upload_image($path, $id)
	{
		$upload_path 					= $path;
		$config['upload_path']          = './'.$upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_filename']			= 255;
	    $config['file_name'] 			= $id.$_FILES['ava']['name'];
	    $image_data = array();
	    $is_file_error = FALSE;

	    if($_FILES) 
	    {
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
		    if(!$this->upload->do_upload('ava'))
		    {
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

	public function do_update_member($teamid, $memberid)
	{
		$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
		$this->form_validation->set_rules('mName','Member Name', 'required|min_length[2]|max_length[30]|callback__check_member_name');
		$this->form_validation->set_rules('mMail', 'Member Email', 'required|valid_email|min_length[2]|max_length[30]|callback__check_member_mail');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('mYear', 'Year', 'required|max_length[1]|numeric');

		if(!$this->form_validation->run())
		{
			$this->data['dtt'] = $this->m_team->load_team_by_mid($teamid);
			$this->data['dtm'] = $this->m_team->load_member_by_memberid($memberid);
			$this->template->load('Manage/template', 'Manage/validate/edit_member', $this->data);
		}
		else
		{
			$pdata = $this->upload_image('assets/uploads/Team/', $teamid);
			$data_member = array(
				'member_name' => $this->input->post('mName'),
				'member_email' => $this->input->post('mMail'),
				'member_photo' => $pdata['name'],
				'dob' => strtotime($this->input->post('dob')),
				'major' => $this->input->post('mMajor'),
				'year' => $this->input->post('mYear')
			);
			if($this->m_team->update_member($memberid, $data_member))
			{
				$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Member Updated!</div>'); 
				redirect(site_url('adm/manage/team/'.$teamid));
			}
			else
			{
				$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error!</div>'); 
				redirect(site_url('adm/manage/team/'.$teamid));
			}
		}
	}

	public function do_delete_member($teamid, $memberid)
	{
		$name = $this->m_team->load_member_by_memberid($memberid)->member_photo;
		if($this->m_team->delete_member($memberid))
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Deleted!</div>'); 
			redirect(site_url('adm/manage/team/'.$teamid));
		}
	}

	public function do_add_member($teamID)
	{
		$pdata = array();
		$maxMem = $this->m_team->get_team_setting_byID($teamID)->num_member;
		$curMem = $this->m_team->count_member($teamID);
		if($curMem < $maxMem)
		{
			$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
			$this->form_validation->set_rules('mName','Member Name', 'required|min_length[2]|max_length[30]|callback__check_member_name');
			$this->form_validation->set_rules('mMail', 'Member Email', 'required|valid_email|min_length[2]|max_length[30]|callback__check_member_mail');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('mYear', 'Year', 'required|max_length[1]|numeric');

			if(!$this->form_validation->run())
			{
				$this->data['mid'] = $teamID;
				$this->data['major'] = $this->m_team->load_team_by_mid($teamID)->major;
				$this->data['year'] = $this->m_team->load_team_by_mid($teamID)->year;
				$this->data['maxMem'] = $this->m_team->get_team_setting_byID($teamID)->num_member;
				$this->data['curMem'] = $this->m_team->count_member($teamID);
				$this->template->load('Manage/template', 'Manage/validate/add_team_member', $this->data);
			}
			else
			{
				$pdata = $this->upload_image('assets/uploads/Team/', $this->input->post('teamid'));
				$data_member = array(
					'team_id' => $this->input->post('teamid'),
					'member_name' => $this->input->post('mName'),
					'member_email' => $this->input->post('mMail'),
					'member_photo' => $pdata['name'],
					'dob' => strtotime($this->input->post('dob')),
					'major' => $this->input->post('mMajor'),
					'year' => $this->input->post('mYear')
				);
				if($this->db->insert('tb_team_member', $data_member))
				{
					$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Member Added!</div>'); 
					redirect(site_url('adm/manage/team/'.$this->input->post('teamid')));
				}
				else
				{
					$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error!</div>'); 
					redirect(site_url('adm/manage/team/'.$this->input->post('teamid')));
				}
			}
		}
		else
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Member Full!</div>'); 
			redirect(site_url('adm/manage/team/'.$this->input->post('teamid')));
		}
	}

	public function do_register()
	{
		// seting rules for input field //
		$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
		$this->form_validation->set_rules('trName', 'Tournament Name', 'required', array('required' => 'You must select {field}'));
		$this->form_validation->set_rules('tName', 'Team Name', 'required|min_length[2]|max_length[30]|callback__check_name');
		$this->form_validation->set_rules('tEmail', 'Team Email', 'required|valid_email|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('tMajor', 'Major', 'required|callback___check_max_major');
		$this->form_validation->set_rules('tYear', 'Year', 'required|max_length[1]|numeric');
		$this->form_validation->set_rules('tnMember', 'Total Team Member', 'required|max_length[2]|numeric|callback__check_max_member');
		// end rules set //

		if(!$this->form_validation->run())
		{
			$this->data['tournament'] = $this->m_tournament->filterstatusTournament(0);		
			$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
		}
		else
		{
			$trId = $this->input->post('trName');
			$countTeam = $this->m_team->count_team($trId);
			$maxTeam = $this->m_tournament->get_setting_byID($trId)->max_team;
			if($countTeam < $maxTeam)
			{
				$tName = $this->input->post('tName');
				$tEmail = $this->input->post('tEmail');
				$tMajor = $this->input->post('tMajor');
				$tYear = $this->input->post('tYear');
				$tnMember = $this->input->post('tnMember');
				$tId = $this->m_team->get_max_id($trId)->ti;
				
				if(empty($tId))
				{
					$tId = '0001';
				}
				else
				{
					$tId = $this->t_helper->autonumber_id(substr($this->m_team->get_max_id($trId)->ti, 11));
				}
				$data_team = array(
					'team_id' => $trId.'TE'.$tId,
					'team_name' => $tName,
					'tournament_id' => $trId,
					'team_email' => $tEmail,
					'major' => $tMajor,
					'year' => $tYear
				);
				$setting = array(
					'team_id' => $trId.'TE'.$tId,
					'num_member' => $tnMember
				);
				if($this->db->insert('tb_team', $data_team) && $this->db->insert('tb_team_settings', $setting))
				{
					$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Added team!</div>'); 
					redirect(site_url('adm/manage/team/'));		
				}
				else
				{
					$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>There is an input error!</div>');
					redirect(site_url('adm/manage/team'));
				}
			}
			else
			{
				$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Team for this Tournament Full!</div>');
				redirect(site_url('adm/manage/team'));
			}		
		}
	}

	public function do_update_team($teamid)
	{
		// seting rules for input field //
		$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
		$this->form_validation->set_rules('trName', 'Tournament Name', 'required', array('required' => 'You must select {field}'));
		$this->form_validation->set_rules('tName', 'Team Name', 'required|min_length[2]|max_length[30]|callback__check_name');
		$this->form_validation->set_rules('tEmail', 'Team Email', 'required|valid_email|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('tMajor', 'Major', 'required|callback___check_max_major');
		$this->form_validation->set_rules('tYear', 'Year', 'required|max_length[1]|numeric');
		$this->form_validation->set_rules('tnMember', 'Total Team Member', 'required|max_length[2]|numeric|callback__check_max_member|callback__min_number');
		// end rules set //
		if(!$this->form_validation->run())
		{
			$this->data['dtt'] = $this->m_team->load_team_by_mid($teamid);
			$this->data['dts'] = $this->m_team->get_team_setting_byID($teamid);
			$this->template->load('Manage/template', 'Manage/validate/add_team', $this->data);
		}
		else
		{
			$tName = $this->input->post('tName');
			$trId = $this->input->post('trName');
			$tEmail = $this->input->post('tEmail');
			$tMajor = $this->input->post('tMajor');
			$tYear = $this->input->post('tYear');
			$tnMember = $this->input->post('tnMember');

			$data_team = array(
				'team_id' => $teamid,
				'team_name' => $tName,
				'team_email' => $tEmail,
				'major' => $tMajor,
				'year' => $tYear
			);
			$setting = array(
				'team_id' => $teamid,
				'num_member' => $tnMember
			);
			if($this->m_team->update_team($teamid, $data_team) && $this->m_team->update_team_setting($teamid, $setting))
			{
				$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Updated!</div>'); 
				redirect(site_url('adm/manage/team/'));		
			}
			else
			{
				$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>There is an input error!</div>');
				redirect(site_url('adm/manage/team'));
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
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No changes!</div>');
		}
	}

	public function delete_team($id)
	{
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data '.$id.' deleted!</div>');
		$this->db->where('team_id', $id)->delete('tb_team');
		redirect('adm/manage/team');
	}

	// Callback

	public function _min_number($str)
	{
		if($str < 12)
		{
			$this->form_validation->set_message('_check_min_number', 'Your team should have min 12 member!');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	} 

	public function __check_max_major($str)
	{
		$tId = $this->input->post('trName');
		$maxMajor = $this->m_tournament->get_setting_byID($tId);
		$fieldCount = $this->m_team->count_major($str, $tId);

		if($fieldCount<$maxMajor->max_team_faculty)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('__check_max_major', 'Team required for {field} already reach its limit!');
			return FALSE;
		}
	}

	public function _check_max_member($str)
	{
		$tId = $this->input->post('trName');
		$max_member = $this->m_tournament->get_setting_byID($tId)->max_member;
		$countMember = $this->input->post('tnMember');

		if($countMember <= $max_member)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_check_max_member', '{field} has too many member!');
			return FALSE;
		}
	}

	public function _check_name($tName)
	{
		$tId = $this->input->post('trName');
		$check = $this->m_team->check_name($tName, $tId);
		if($check > 0)
		{
			$this->form_validation->set_message('_check_name',  $tName.' for {field} in this Tournament already taken!');
			return FALSE;
		}
		else 
		{
			return TRUE;
		}
	}

	public function _check_member_name($name)
	{
		$teamid = $this->input->post('teamid');
		$param = 'name';
		$check = $this->m_team->check_member($param, $name, $teamid);
		if($check > 0)
		{
			$this->form_validation->set_message('_check_member_name',  '{field} '.$name.' already in team!');
			return FALSE;
		}
		else 
		{
			return TRUE;
		}
	}

	public function _check_member_mail($mail)
	{
		$teamid = $this->input->post('teamid');
		$param = 'mail';
		$check = $this->m_team->check_member($param, $mail, $teamid);
		if($check > 0)
		{
			$this->form_validation->set_message('_check_member_mail',  '{field} '.$mail.' already used!');
			return FALSE;
		}
		else 
		{
			return TRUE;
		}
	}
}
?>