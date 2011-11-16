<?php session_start();
	require("connectToDataBase.php");
	
	$id = mysql_real_escape_string ($_GET['post']);
	$callBack = mysql_real_escape_string ($_GET['callBack']);
	
	$query = "DELETE FROM Post WHERE PostID='".$id."'";
	mysql_query($query) or die(mysql_error());
	
	mysql_close($conn);
	
	if(strcmp($callBack,"posts")==0){
		header("location:../posts.php");
	}else if(strcmp($callBack,"recipes")==0){
		header("location:../recipes.php");
	}
	exit();


?>