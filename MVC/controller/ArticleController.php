<?php

/**
* 
*/
class ArticleController
{
	public function __construct()
	{
		include('./model/ArticleModel.php');
	}

	public function index()
	{
		$article = new ArticleModel();
		$articleList = $article->getArticleList();
		include('./views/articleView.php');
	}
	
}