<?php
	
	require("functions/connectToDataBase.php");
	
	if(strcmp($_SESSION['user']['UserRole'],"Auther")!=0){
		$query = "SELECT * FROM Post WHERE Location='recipe'";
	}else{
		$query = "SELECT * FROM Post WHERE Location='recipe' AND Auther=".$_SESSION['user']['UID'];
	}
	
	$res = mysql_query($query);
	
	
	
	
		while($post = mysql_fetch_array($res))
		{
			echo '<div class="postDis">';
				echo '<h3>Post ID: '.$post["PostID"].'</h3>';
				echo '	<ul>
							<li>Title: '.$post["Title"].'</li>
							<li>Author: '.$post["Auther"].'</li>
							<li>Status: '.$post["Status"].'</li>
						</ul>';
			echo '</div>';
			echo '<div class="postDisLinks">';
				echo '	<ul>
							<li><a href="aPost.php?post='.$post["PostID"].'&type=recipe">Edit</a></li>
							<li><a href="functions/removePost.php?post='.$post["PostID"].'&callBack=recipes">Delete</a></li>
						</ul>';
			echo '</div>';
		}
	
	
	mysql_close($conn);
?>