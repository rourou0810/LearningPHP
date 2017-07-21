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
		$query = $this->db->query("SELECT * FROM article");
		$data  = $query->result();

		return $data;
	}
}