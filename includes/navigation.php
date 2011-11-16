
<div id="nav">

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="blog.php">Blog</a></li>
		<li><a href="gallery.php">Photos</a></li>
		<li><a href="cooking.php">Cooking</a></li>
		<?php
		if(($_SESSION['user']['UserRole']=='Admin')||($_SESSION['user']['UserRole']=='Editor')||($_SESSION['user']['UserRole']=='Author'))
		{
			echo '<li><a href="cms/index.php">Manage</a></li>';
		}
		?>
	</ul>
	
</div>