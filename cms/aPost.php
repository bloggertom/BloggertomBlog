<?php session_start(); 
	if(($_SESSION['user']['UserRole']=="Subcriber")||(!(isset($_SESSION['user']['UserRole'])))){
	echo "
	<html>
		<head>
			<title>Go Away</title>
		</head>
		<body>
			<h1>GO BACK TO THE SHADOWS</h1>
		</body>
	</html>";
	}else{
	
	echo '
		
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			
				<head>
					<title>Manage Bloggertom - Post</title>
					<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

				</head>
				<body>';
	
	if(isset($_GET['type'])){
		$type = mysql_real_escape_string($_GET['type']);
	}

	
	if(isset($_GET['post'])){
		require("functions/connectToDataBase.php");
	
		$postID = mysql_real_escape_string($_GET['post']);
		$query = sprintf("SELECT * FROM Post WHERE PostID = '%s'",$postID);
	
		$res = mysql_query($query);
		$post = mysql_fetch_array($res);
	
		echo '<form action="functions/addPost.php?post='.$postID.'&f=edit&location='.$type.'" method="post">';
	
		echo '<label>Post Title</label>
			<input type="text" name="title" value="'.$post["Title"].'" maxlength="40" /><br /><br />
			<label>Post Content</label><br />
			<br />
			<textarea name="content" rows="15" value="" cols="100">'.$post["Content"].'</textarea><br />';
			
			if((strcmp($post["Status"],"draft"))==0){
				echo'<label>Status</label>
					<select name="status">
						<option value="draft">Draft</option>
						<option value="publish">Publish</option>
					</select>
				<input type="submit" value="Submit" />';
				}else{
					echo'<label>Status</label>
					<select name="status">
						<option value="publish">Publish</optoin>
						<option value="draft">Draft</option>
					</select>
				<input type="submit" value="Submit" />';
				}
	echo'</form>
	';
			$query = sprintf("SELECT COUNT(*) FROM Comment WHERE Post = %d",$postID);
			$res = mysql_query($query);
			$array= mysql_fetch_array($res);
			$commentCount=$array["COUNT(*)"];
		if($commentCount){
			echo '<h2 align="center">Comments</h2> ';
			$query = sprintf("SELECT * FROM Comment WHERE Post = %d",$postID);
			$res = mysql_query($query);
			echo'<div id=openPostComments>';
			while($comment=mysql_fetch_array($res)){
				echo'<div class="comment">
						<h4>Title: '.$comment["Title"].'</h4>
							<p>'.$comment["Content"].'</p>
							<div>
								<ul>
									<li>Auther: '.$comment["Auther"].'</li>
									<li><a href="functions/removeComment.php?cid='.$comment["CommentID"].'&l='.$_SERVER["PHP_SELF"].'&type='.$type.'&pid='.$postID.'">Remove</a></li>
								</ul>
							</div>
						<hr />	
					</div>
						
						';
			}
			echo'</div>';
			
		}else{
			echo '<h3 align="center">Currently No Comments</h3>';
		}
		mysql_close($conn);
	}else{

	echo'<form action="functions/addPost.php?f=add&location='.$type.'" method="post">
		<label>Post Title</label>
		<input type="text" name="title" maxlength="40" /><br /><br />
		<label>Post Content</label><br />
		<br />
		<textarea name="content" rows="15" cols="100"></textarea><br />
		<label>Status</label>
		<select name="status">
			<option value="draft">Draft</option>
			<option value="publish">Publish</option>
		</select>
		
		<input type="submit" value="Submit" />
	</form>';
	}
	
	}
	echo'</body>';
?>