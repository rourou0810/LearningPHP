<?php 	

	header('Content-Type: text/html; charset=utf-8');

	$a = $_GET['a'].'Controller';
	$b = $_GET['b'];

	include('controller/'.$a.'.php');

	$test = new $a();
	$test -> $b();