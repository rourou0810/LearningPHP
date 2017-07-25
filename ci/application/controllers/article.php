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

	public function paginationList()
	{
		//装载类文件  
		$this->load->library('pagination');  
		//每一页显示的数据条数的变量  
		$page_size = 3;  

		$this->load->helper('url');//分页一定要用它  
		$config['base_url']=site_url("article/index");  
		$config['uri_segment']=3;//分页的偏移量查询在那一段上面  

		$config['full_tag_open'] = '<div class="pagination">';  
		$config['full_tag_close'] = '</div>';  
		$config['first_tag_open'] = '<li>';  
		$config['first_tag_close'] = '</li>';  
		$config['prev_tag_open'] = '<li>';  
		$config['prev_tag_close'] = '</li>';  
		$config['next_tag_open'] = '<li>';  
		$config['next_tag_close'] = '</li>';  
		$config['cur_tag_open'] = '<li class="active"><a>';  
		$config['cur_tag_close'] = '</a></li>';  
		$config['last_tag_open'] = '<li>';  
		$config['last_tag_close'] = '</li>';  
		$config['num_tag_open'] = '<li>';  
		$config['num_tag_close'] = '</li>';    

		 $config['attributes'] = array('class' => 'fg-button ui-button ui-state-default');//给所有<a>标签加上class 
		//每一页显示的数据条数  
		$config['per_page']=$page_size;  
		$config['first_link']= '首页';  
		$config['next_link']= '下一页';  
		$config['prev_link']= '上一页';  
		$config['last_link']= '末页'; 

		//一共有多少条数据  
		$res = $this->db->query("SELECT * FROM article");
		$rows = $res->num_rows() ;
		$config['total_rows']=$rows;  

		//初始化 ，传入配置？？？？  
		$this->pagination->initialize($config);  
		$data['links'] = $this->pagination->create_links(); 

		$totals = array(
			'page_size'=>$page_size,
			'links' => $data['links']
		);

		return $totals;
	}

	public function index()
	{
		if($this->session->has_userdata('username')){
			$data['name'] = $this->session->userdata('username');
			$data['links'] = $this->paginationList()['links'];
			$page_size = $this->paginationList()['page_size'];//每一页显示的数据条数的变量 
			$offset = intval($this->uri->segment(3));//用intval使空格转0，显示出来0 

			$res = $this->articleModel->articleList($offset,$page_size);
			$data['articleList'] = $res->result();
			
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

	public function delArticle()
	{
		$ids = $this->input->post('ids');
		if(empty($ids)){
			exit;
		}

		$bool = $this->articleModel->deleteArticle($ids);

		$data['saveMsg'] = 0;
		if($bool){
			$data['saveMsg'] = 1;
		}

		echo $data['saveMsg'];
	}
}
