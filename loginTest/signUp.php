<?php 
	
	header("Content-Type:text/html;charset=utf-8");

	require "ConnMysql.class.php";

	function checkIfEmpty($username, $pwd, $email){
		if(empty($username) && empty($pwd) && empty($email)){
			exit();
		}
	}

	$username = $_POST["username"];
	$pwd      = $_POST["password"];
	$email    = $_POST["email"];

	checkIfEmpty($username, $pwd, $email);

	$connsql = new ConnMysql("localhost:3306", "root", "", "users");
	$connsql->connectMysql();
	$connsql->queryMysql("userlist","username",$username,"此用户名已被注册过！");
	$connsql->insertInto("userlist","username,password,email","'".$username."','".$pwd."','".$email."'");
	
?>
