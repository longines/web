<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','form'));
		$this->load->library(array('form_validation','table'));

		if($this->session->userdata('logged_in'))
		{
			$this->session_data = $this->session->userdata('logged_in');
		}
		else
		{
			redirect('../','refresh');
		}
	}

	function index()
	{
		$loadedViews = array(
						'home/home_automata_test' => NULL
						);
		$this->load->template($this->session_data,$loadedViews);
	}
}
?>