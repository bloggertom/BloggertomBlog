<?php session_start();
	
	require("connectToDataBase.php");
	
	$post_content = $_POST['content'];
	$post_title = $_POST['title'];
	$auther = $_SESSION['user']['UID'];	
	$my_t = getdate(date("U"));
	$date = $my_t[year]."-".$my_t[mon]."-".$my_t[mday];
	$location = mysql_real_escape_string($_GET['location']);
	if(strcmp($_GET['f'],"add")==0){
	
		$query = sprintf("INSERT INTO Post(PostID, Title, Content, Auther, DatePosted, Location, Status) VALUES('', '%s', '%s', '".$auther."', '".$date."', '".$location."', '".$_POST['status']."')",$post_title,$post_content);
		mysql_query($query) or die(mysql_error());
	
	}else if(strcmp($_GET['f'],"edit")==0){
		$id = mysql_real_escape_string ($_GET['post']);
		$query = "UPDATE Post SET Title='".$post_title."', Content='".$post_content."', Auther='".$auther."', DatePosted='".$date."', Status='".$_POST['status']."' WHERE PostID='".$id."'";
		mysql_query($query) or die(mysql_error());
	}else{
		return false;
	}

	mysql_close($conn);

	if(strcmp($location,"blog")==0){
		header("location:../posts.php");
	}else if(strcmp($location,"recipe")==0){
		header("location:../recipes.php");
	}
	exit();

?>
