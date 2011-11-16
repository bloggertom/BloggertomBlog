<?php
	
	require("functions/connectToDataBase.php");
	if(strcmp($_SESSION['user']['UserRole'],"Auther")!=0){
		$query = "SELECT * FROM Post WHERE Location='blog'";
	}else{
		$query = "SELECT * FROM Post WHERE Location='blog' AND Auther=".$_SESSION['user']['UID'];
	}
	$res = mysql_query($query);
	
	if(mysql_num_rows($res)==0){
		echo '<h3>you currently have no posts</h3>';
	}else{
	
		while($post = mysql_fetch_array($res))
		{
			$query = sprintf("SELECT COUNT(*) FROM Comment WHERE Post =%d",$post["PostID"]);
			$res2 = mysql_query($query);
			$array= mysql_fetch_array($res2);
			$commentCount=$array["COUNT(*)"];
			echo '<div class="postDis">';
				echo '<h3>Post ID: '.$post["PostID"].'</h3>';
				echo '	<ul>
							<li>Title: '.$post["Title"].'</li>
							<li>Author: '.$post["Auther"].'</li>
							<li>Status: '.$post["Status"].'</li>
							<li>Comments: '.$commentCount.'</li>
						</ul>';
			echo '</div>';
			echo '<div class="postDisLinks">';
				echo '	<ul>
							<li><a href="aPost.php?post='.$post["PostID"].'&type=blog">Open</a></li>
							<li><a href="functions/removePost.php?post='.$post["PostID"].'&callBack=posts">Delete</a></li>
							
						</ul>';
			echo '</div>';
		}
	}
	
	mysql_close($conn);
?>