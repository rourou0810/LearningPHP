<?php

class ArticleModel
{
	
	public function getArticleList()
	{
		$data = array(
					array('id'=>1, 'title'=>'news01', 'text'=>'this is news 01.'),
					array('id'=>2, 'title'=>'news02', 'text'=>'this is news 02.'),
					array('id'=>3, 'title'=>'news03', 'text'=>'this is news 03.')
				);

		return $data;
	}
}