<?php

class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->has_userdata('username')){
			$data['name'] = $this->session->userdata('username');
			$this->load->view('template/header',$data);
			$this->load->view('index');
			$this->load->view('template/footer');
		}else{
			redirect('login/index');
		}
		
	}
}