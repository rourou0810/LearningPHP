<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('loginModel');
		$this->load->library('session');
	}
	
	public function index()
	{
		$uname = $this->input->post('username');
		$pwd   = md5($this->input->post('password'));
		$query = $this->loginModel->getUser($uname,$pwd);
		
		if($uname == NULL || $pwd == NULL) {
			$this->load->view('login');
		}else{

			if(sizeof($query) == 0){
				$data['errorMsg'] = "用户名或密码错误";
				$this->load->view('login',$data);
			}else{
				$this->session->set_userdata('username',$uname);
				redirect('home/index');
			}
		}

		
	}
}
