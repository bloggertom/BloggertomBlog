<?php
	require("functions/connectToDatabase.php");
	
	$query = "SELECT * FROM Post WHERE Status!='draft' AND Location='blog'";
	$res = mysql_query($query);
	
	while($post = mysql_fetch_array($res))
	{
		$content = htmlspecialchars_decode($post["Content"]);
		$query = sprintf("SELECT COUNT(*) FROM Comment WHERE Post = %d",$post["PostID"]);
		$res2 = mysql_query($query);
		$array= mysql_fetch_array($res2);
		$commentCount=$array["COUNT(*)"];
			echo '<div class="title">
					<h3>'.$post["Title"].'</h3>
				</div>';
			echo '<div class="post">
					'.$content.'
				</div>';
			echo '<div class="postFooter">
						<span class="postMeta">Auther: '.$post["Auther"].'</span><span class="postCommentLabel"><a href="postDetail.php?pid='.$post["PostID"].'">Comments ('.$commentCount.')</a></span>
				  </div>';
				
	}
	mysql_close($conn);
?>