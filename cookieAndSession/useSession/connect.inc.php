<?php  
	$host = "localhost:3306";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "testmail";
	$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);
	if (mysqli_connect_errno()) {
		printf("连接失败：",mysqli_connect_errno());
		exit();
	}
?>