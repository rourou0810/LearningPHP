<?php
/**
* 
*/
class ArticleModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function articleList()
	{
		//查询文章列表数据
		$query = $this->db->query("SELECT * FROM article");
		$data  = $query->result();

		return $data;
	}

	public function addArticle($data)
	{
		//增加数据
		$bool = $this->db->insert('article', $data);//返回布尔值
		return $bool;
	}

	public function editArticle($id)
	{
		//查询当前id的数据
		$query = $this->db->query("SELECT * FROM article WHERE id='".$id."'");
		$data  = $query->result();

		return $data;
	}

	public function updateArticle($data,$id)
	{
		//修改当前id的数据
		$bool=$this->db->update('article',$data,array('id'=>$id));//返回布尔值
		return $bool;
	}
}