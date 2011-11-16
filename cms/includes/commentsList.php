<?php
	require("functions/connectToDatabase.php");
	
	if(strcmp($_SESSION['user']['UserRole'],"Auther")!=0){
		$query = "SELECT * FROM Comment";
		
		$res=mysql_query($query);
		
		while($comment=mysql_fetch_array($res)){
			echo'<div class="comment" align="left">
					<h3>'.$comment["Title"].'</h3>
					<p>'.$comment["Content"].'<p>
					<div>
						<ul>
							<li>Auther: '.$comment["Auther"].'</li>
							<li><a href="functions/removeComment.php?cid='.$comment["CommentID"].'&l='.$_SERVER["PHP_SELF"].'">Remove</a></li>
						</ul>
					</div>
					<hr />
				</div>
				';
		}
		
	}else {
		
		
	}
	
	
	mysql_close($conn);
?>