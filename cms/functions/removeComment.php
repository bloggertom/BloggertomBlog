<?php
	require("connectToDatabase.php");
	
	$commentID = mysql_real_escape_string($_GET['cid']);
	if(isset($_GET['pid'])){
		$location = mysql_real_escape_string($_GET['l']."?post=".$_GET['pid']."&type=".$_GET['type']);
	}else $location = mysql_real_escape_string($_GET['l']);
	$query = sprintf("DELETE FROM Comment WHERE CommentID=%d", $commentID);
	//mysql_query($query);
	if(mysql_query($query)){
		mysql_close($conn);
		header("location:".$location);
		exit();
	}else{
		echo 'failed to remove comment';
		mysql_close($conn);
	}
?>