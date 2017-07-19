<?php

/**
* 
*/
class UserController
{
	public function __construct()
	{
		include('./model/UserModel.php');
	}
	
	public function index()
	{
		$user = new UserModel();
		$userList = $user->getAllUsers();
		include('./views/userView.php');
	}
	
}