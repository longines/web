<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','form'));
		$this->load->library(array('form_validation','table'));
	}

	function index()
	{
		echo 'Welcome Home!';
		echo anchor('logout','Logout');
	}
}
?>