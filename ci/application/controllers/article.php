<?php

class Article extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('articleModel');
	}

	public function index()
	{
		if($this->session->has_userdata('username')){
			$data['name'] = $this->session->userdata('username');
			$data['articleList'] = $this->articleModel->articleList();
			
			$this->load->view('template/header',$data);
			$this->load->view('article',$data);
			$this->load->view('template/footer');
		}else{
			redirect('login/index');
		}
		
	}
}