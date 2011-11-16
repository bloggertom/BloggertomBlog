<?php session_start();
	require("connectToDatabase.php");
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$user = $_SESSION['user']['UID'];
	$postID = mysql_real_escape_string($_GET['pid']);
	$my_t = getdate(date("U"));
	$date = $my_t['year']."-".$my_t['mon']."-".$my_t['mday'];
	
	$query = "INSERT INTO Comment (CommentID, Title, Content, Date, Auther, Post) VALUES('','".$title."', '".$content."','".$date."','".$user."','".$postID."')";
	mysql_query($query);
	
	mysql_close($conn);
	
	header("location:../postDetail.php?pid=".$postID);
	exit();
	
?>