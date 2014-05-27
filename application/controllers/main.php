<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('table');
		$this->load->helper(array(
							'url','html','form'
							));
	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('home','refresh');
		}
		else
		{
			$this->load->view('login_view');
		}
	}

	function signup()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');

			if($session_data['usertype'] == 'admin')
			{
				$this->load->view('signup/signup_admin_view');
			}
			else
			{
				refresh('','refresh');
			}
		}
		else
		{
			$this->load->view('signup/signup_view');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('','refresh');
	}
}
?>