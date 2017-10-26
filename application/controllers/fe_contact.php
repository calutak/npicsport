<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fe_Contact extends CI_Controller
{
	public $data = array();
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_logging','m_log');		
	}

	public function index() {
		$this->load->view('frontend/banner/header');
		$this->load->view('frontend/content/Contact', $this->data);
		$this->load->view('frontend/banner/footer');
	}

	public function send_feedback()
	{
		$this->form_validation->set_error_delimiters('<div class=\'form-group has-error\'><span class=\'help-block\'>', '</span></div>');
		$this->form_validation->set_rules('sender_name', 'Your Name', 'required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('sender_mail', 'Email', 'required|max_length[150]|valid_email');
		$this->form_validation->set_rules('sender_phone', 'Phone', 'required|max_length[158]');
		$this->form_validation->set_rules('message','Message', 'required|min_length[2]|max_length[500]');

		if(isset($_POST['g-recaptcha-response'])){
			$api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=6Ld2ijMUAAAAAOzC8nn8T-IdUJ1bywB46anhgGn8&response='.$_POST['g-recaptcha-response'];
	        $hasilcapca = @file_get_contents($api_url);
	        $hasilcapca = json_decode($hasilcapca, true);
		} else {
			$hasilcapca['success'] = false;
		}
		
		if($this->form_validation->run() AND $hasilcapca)
		{
			$logData = array(
				'log_type' => 'feedback',
				'log_desc' => 'New message/comments from '.$this->input->post('sender_name'),
				'log_datetime' => strtotime('now')
			);
			$data = array(
				'message_subject' => 'Guest`s Comments',
				'message_content' => $this->input->post('message'),
				'message_date' => strtotime('now'),
				'message_sender' => $this->input->post('sender_name'),
				'message_type' => 'Comments',
				'message_target' => 'Admin',
				'sender_mail' => $this->input->post('sender_mail'),
				'sender_phone' => $this->input->post('sender_phone')
			);
			$this->db->insert('tb_message', $data);
			$this->session->set_flashdata('response','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Thanks for your feedback!</div>');
			$this->m_log->new_message($logData);
			redirect(site_url('contact'));
		}
		else
		{
			$this->session->set_flashdata('response','<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error submit your feedback!</div>');
			redirect(site_url('contact'));
		}	
	}
}
?>