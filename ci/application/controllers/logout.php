<?php

class Logout extends CI_Controller
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
			$this->session->unset_userdata('username');
			redirect('admin/login/index');
		}
	}
}