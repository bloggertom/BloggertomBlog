<?php session_start();

	if(isset($_GET['pid'])){
		$pid = mysql_real_escape_string($_GET['pid']);
	}else{
		header("location:index.php");
		exit();
	}
	
	require("functions/connectToDatabase.php");
	
	$query = sprintf("SELECT * FROM Post WHERE PostID = %d",$pid);
	$res = mysql_query($query);
	$post = mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Bloggertom.com</title>
		<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

	</head>
	
	<body>
		<?php 
			include("includes/Header.php");
			include("includes/navigation.php");
		?>
		<div id="content">
			<div id="left">
				<div class="title">
					<h3><?php echo $post['Title'];?></h3>
				</div>
				<div class="post">
					<?php echo $post['Content']; ?>
				</div>
				
				<div id="comments">
					<?php
						$query = sprintf("SELECT * FROM Comment WHERE Post = %d",$pid);
						$res = mysql_query($query);
						
						while($comment = mysql_fetch_array($res)){
							echo '<div class="commentBox">
										<h3>'.$comment["Title"].'</h3>By '.$comment["Auther"];
										echo'<hr />';
										echo '<p>'.$comment["Content"].'</p>';
							echo '</div>';
						}
					?>
					<?php 
						if(isset($_SESSION['user'])){
							echo'<form action="functions/addComment.php?pid='.$post["PostID"].'" method="post">
								<h3>Add Comment</h3>
								<label>Title: </label><input type="text" name="title" style="width:25em; height:2em; margin-bottom:0.5em;"/>
								<textarea rows="8" cols="75" name="content" style="margin-bottom:1em;"></textarea>
								<input type="submit" value="Comment" style="float:right;"/>
							</form>';
						}else{
							echo '<h4 align="center">You need to login to leave a comment.</h4>';
						}
					
					?>
				</div>
			
			</div>
		
			<div id="right">
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php");?>
	</body>
</html>