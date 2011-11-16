<?php session_start();
	
	$location = mysql_real_escape_string($_GET['location']);
	
	session_destroy();
	header("location:".$location);
	exit();
?>