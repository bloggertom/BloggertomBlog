<?php
	require("functions/connectToDatabase.php");
	
	$query = "SELECT * FROM Post WHERE Status!='draft' AND Location='recipe'";
	
	$res = mysql_query($query);
	
	while($post = mysql_fetch_array($res))
	{
		$content = htmlspecialchars_decode($post["Content"]);
		
			echo '<div class="title">
					<h3>'.$post["Title"].'</h3>
				</div>';
			echo '<div class="post">
					'.$content.'
				</div>';
		
	}
	mysql_close($conn);
?>



<!--<div class="title">
	<h3>Rock and Roll</h3>
</div>
<div class="post">
	<p>This website is being made to replay my wordpress blog,
	it is know where near done yet but seems to now be coming along
	nicely</p>
	<p>Things that still need to be done are:
		<ol>
			<li>background</li>
			<li>database</li>
			<li>gallery</li>
		</ol>
	</p>
</div>-->