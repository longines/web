<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Account extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('account_model','',TRUE);
		$this->load->helper(array('url','html','form'));
		$this->load->library(array('form_validation','table'));
	}

	function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_view');
		}
		else
		{
			redirect('','refresh');
		}
	}

	function check_database($password)
	{
		$username = $this->input->post('username');

		$login = $this->account_model->login($username,$password);

		if($login)
		{
			$details = $this->account_model->getRecordByID('user_details',$login[0]['id']);

			$sess_array = array(
						'id' => $login[0]['id'],
						'username' => $login[0]['username'],
						'usertype' => $login[0]['usertype'],
						'firstname' => $details[0]['firstname'],
						'middlename' => $details[0]['middlename'],
						'lastname' => $details[0]['lastname'],
						'birthdate' => $details[0]['birthdate'],
						'email' => $details[0]['email']
						);
			$this->session->set_userdata('logged_in',$sess_array);
			
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database','Invalid username and password.');
			return FALSE;
		}
	}

	function register()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		$this->form_validation->set_rules('conf_pass','Confirm Password','trim|required|xss_clean|matches[password]');
		$this->form_validation->set_rules('firstname','Firstname','trim|required|xss_clean');
		$this->form_validation->set_rules('middlename','Middlename','trim|required|xss_clean');
		$this->form_validation->set_rules('lastname','Lastname','trim|required|xss_clean');
		$this->form_validation->set_rules('birthdate','Birth Date','trim|required|xss_clean');
		$this->form_validation->set_rules('email','E-mail','trim|required|xss_clean|valid_email');

		if(isset($_POST['usertype']))
		{
			$this->form_validation->set_rules('usertype','Usertype','required|trim|xss_clean');
		}

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('result',validation_error());
			redirect('','refresh');
		}
		else
		{
			// USER account
			$user['username'] = $_POST['username'];
			$user['password'] = $_POST['password'];

			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				if($session_data['usertype'] == 'admin')
				{
					$user['usertype'] = $_POST['usertype'];
				}
			}
			else
			{
				$user['usertype'] = 'user';
			}

			//USER details
			$data = $_POST;
			unset($data['submit'],$data['username'],
				$data['password'],$data['conf_pass']);

			$register_user = $this->account_model->register('user',$user);
			if($register_user)
			{
				$data['id'] = $register_user;
				$register_data = $this->account_model->register('user_details',$data);
			}

			if($register_user && $register_data)
			{
				if($user['usertype'] == 'user')
				{
					$this->session->set_flashdata('result','Account successfully registered!');
					redirect('','refresh');
				}
				elseif($user['usertype'] == 'admin')
				{
					$this->session->set_flashdata('result','New admin successfully registered!');
					redirect('','refresh');
				}
			}
		}
	}
}
?>