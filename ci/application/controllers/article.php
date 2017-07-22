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
			$this->load->view('article_list',$data);
			$this->load->view('template/footer');
		}else{
			redirect('login/index');
		}
		
	}

	public function addArticle()
	{
		if(!$this->session->has_userdata('username')){
			redirect('login/index');
		}	
		
		$data['name'] = $this->session->userdata('username');
		$data['id']   = $this->uri->segment(3);

		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$keywords = $this->input->post('keywords');
		$introduce = $this->input->post('introduce');
		$editorValue = $this->input->post('editorValue');


		if(empty($title) || empty($author) || empty($keywords) || empty($introduce) || empty($editorValue)){
			$this->load->view('template/header',$data);
			$this->load->view('add_article',$data);
			$this->load->view('template/footer');
		}

		else{

			$articleParams = array(
			    'title' => $title,
			    'author' => $author,
			    'keywords' => $keywords,
			    'introduction' => $introduce,
			    'content' => $editorValue
			);

			if(empty($data['id'])){//如果没有id,则是增加数据

				$bool = $this->articleModel->addArticle($articleParams);
				
			} else {

				$bool = $this->articleModel->updateArticle($articleParams,$data['id']);
				$data['editArticle'] = $this->articleModel->editArticle($data['id']);
			}

			$data['saveMsg'] = 0;
			if($bool){
				$data['saveMsg'] = 1;
			}

			echo $data['saveMsg'];
		}

		
	}

	public function editArticle()
	{
		if(!$this->session->has_userdata('username')){
			redirect('login/index');
		}
		$data['name'] = $this->session->userdata('username');
		$data['id']   = $this->uri->segment(3);

		$data['editArticle'] = $this->articleModel->editArticle($data['id']);
		$this->load->view('template/header',$data);
		$this->load->view('add_article',$data);
		$this->load->view('template/footer');
		
	}
}