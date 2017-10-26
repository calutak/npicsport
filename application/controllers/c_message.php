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

		$this->load->view('Manage/header');
		$this->load->view('Manage/footer');
		$this->load->model('m_tournament');
		$this->load->model('m_schedule');
		$this->load->model('m_message');
		$this->load->model('m_logging','m_log');
		//load data table
		$this->data['tnumrows'] = $this->m_tournament->get_row_tournament();
		$this->data['schedule'] = $this->m_schedule->get_row_schedule();
		$this->data['tdropdown'] = $this->m_tournament->load_dropdown_tlist();
		$this->data['ddropdown'] = $this->m_tournament->load_dropdown_dlist();
		$this->data['mdropdown'] = $this->m_tournament->load_dropdown_mlist();
		$this->data['mtour'] = $this->m_tournament->load_match_tournament();
		$this->data['team_count'] = $this->m_schedule->get_team_count($this->t_helper->get_tid());
	}

	public function clear_inbox()
	{
		if(!empty($_POST['sel']))
		{
			for ($i=0; $i < count($_POST['sel']); $i++) { 
				$this->db->where('message_id', $_POST['sel'][$i])->delete('tb_message');
			}
		}
		else
		{
			$this->session->set_flashdata('response','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No Data Selected!</div>');
			redirect(site_url('adm/message/manage'));
		}
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data deleted!</div>');
		redirect(site_url('adm/message/manage'));
	}

	public function form_broadcast() 
	{
		$this->data['tlist'] = $this->m_tournament->load_t_for_broadcast();
		$this->template->load('Manage/template','Manage/message/create_broadcast',$this->data);
	}

	public function config_mail()
	{
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'npicsport@gmail.com',
		    'smtp_pass' => 'abcde123',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);

		$this->load->library('email');
		$this->email->initialize($config);
	}

	public function send_mail()
	{
		$tid = $this->input->post('tid');
		$t = $this->m_tournament->get_row_byID($tid);
		$team = $this->m_team->load_team_by_tid($tid);

		foreach ($team as $key) {
			$cc[] = $key->team_email;
		}

		$subject = '[Broadcast Message] Tournament '.$t->tournament_name;
		$message = $this->input->post('description');

		$result = $this->email
		        ->from('npicsport@gmail.com')
		        ->to($cc)
		        ->subject($subject)
		        ->message($message)
		        ->send();
	}

	public function manage_message()
	{
		$this->data['message'] = $this->m_message->load_message();
		$this->template->load('Manage/template','Manage/message/manage',$this->data);
	}

	public function reply($id)
	{
		$this->data['contact_details'] = $this->m_message->find_message($id);
		$this->template->load('Manage/template','Manage/message/reply_message',$this->data);
	}

	public function delete($id)
	{
		$this->m_message->delete($id);
		$logData = array(
				'log_type' => 'Delete',
				'log_desc' => 'Deleted message with id : '.$id,
				'log_datetime' => strtotime('now')
			);
		$this->m_log->delete_log($logData);
		$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Deleted!</div>');
		redirect(site_url('adm/message/manage'));
	}

	public function post_reply($id)
	{
		$subject = $this->input->post('subject');
		$message = $this->input->post('body');
		$to = $this->input->post('recipient');
		$toName = $this->m_message->find_message($id)->message_sender;

		$result = $this->email
		        ->from('npicsport@gmail.com')
		        ->to($to)
		        ->subject($subject)
		        ->message($message)
		        ->send();
		$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Reply sent to '.$toName.' with email <i>'.$to.'</i></div>');
		redirect(site_url('adm/message/manage'));	
	}
}
?>