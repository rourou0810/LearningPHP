<?php 	

	//------------------------------session的注销过程----------------------------------------------
	//session的注销过程，四个步骤：
	
	//第一步：开启session并初始化
	session_start();

	//第二步：删除所有session的变量，也可用unset($_SESSION["XXX"])诸葛删除
	$_SESSION = array();

	//第三步：如果使用基于cookie的session，使用setcookie()删除包含session Id 的cookie

	if (isset($_COOKIE[session_name()])) {//判断cookie中是否保存session Id
		setcookie(session_name(),"",time()-42000,"/");//删除包含session Id的cookie
	}

	//第四步：最后彻底销毁session
	session_destroy();

	//------------------------------传递Session ID-------------------------------------------------
	/*1.通过Cookie传递session ID*/
	setcookie(session_name(),session_id(),0,"/");//向cookie中设置session id 的过程
	//"0":是通过在php.ini文件中由session.cookie_lifetime选项设置的值。默认值为0，表示session id将在客户机的cookie中延续到浏览器关闭。
	//"/":也是通过PHP配置文件指定的值，在php.ini中由session.cookie_path选项设置的值。默认为"/",表示在cookie中药设置的路径在整个域内都有效。
	//例子：
	session_start();
	echo $_SESSION["username"]."<br>";
	echo "session id:".session_id()."<br>";


	/*2.通过URL传递Session ID*/
	//例子：
	session_start();
	$_SESSION["username"] = "admin";
	echo "session id:".session_id()."<br>";

	echo "<a href='transSession.php?".session_name()."=".session_id()."'>通过URL传递session id</a>";
?>