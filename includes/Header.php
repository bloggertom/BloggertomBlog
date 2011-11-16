<div id="header">

	<div id="banner">
		<!--<img src="images/logo.jpg" alt="<h2>Blogger Tom</h2>"/>-->	
	</div>
	
	
	<div id="links">
		<h4>Subscribe!</h4>
		<ul>
			<li><a href="http://www.facebook.com/bloggertom"><img src="images/facebookIcon.png" alt="bloggertom facebook" height="50" /></a></li>
			<li><a href="http://www.twitter.com/bloggertom"><img src="images/twitterIcon.png" alt="bloggertom twitter" height="50" /></a></li>
			<li><a href="http://dontai.deviantart.com"><img src="images/deviantart-icon.png" alt="bloggertom photos" height="50" /></a></li>
			<li><a href="#"><img src="images/rssIcon.png" alt="RSS Feed" height="50" ></a></li>
		</ul>
		<?php
		if((!(isset($_SESSION['user']))&&(!(isset($_GET['login']))))){
			echo '<h3>Login</h3>
			<form action="functions/login.php?location='.$_SERVER["PHP_SELF"].'" method="post">
				<table border="0">
				<tr><td><lable>User Name</lable></td><td><input type="text" name="uid" maxlength="12"/></td></tr>
				<tr><td><lable>Password</lable></td><td><input type="password" name="password" maxlength="12"/></td></tr>
				<tr><td></td><td><input type="submit" value="login" /></td></tr>
				</table>
			</form>';
			echo '<div class="meta"><a href="registration.php">Register</a>  or <a href="#">Forgotten Password</a></div>';
		}else if($_GET['login']=='false'){
			echo '<h3>Wrong Username or Password</h3>
			<form action="functions/login.php?location='.$_SERVER["PHP_SELF"].'" method="post">
				<table border="0">
				<tr><td><lable>User Name</lable></td><td><input type="text" name="uid" maxlength="12"/></td></tr>
				<tr><td><lable>Password</lable></td><td><input type="password" name="password" maxlength="12"/></td></tr>
				<tr><td></td><td><input type="submit" value="login" /></td></tr>
				</table>
			</form>';
			echo'<div class="meta"><a href="registration.php">Register</a>  or <a href="#">Forgotten Password</a></div>';	
		}else{
			echo '<h3>Welcome '.$_SESSION["user"]["UID"].'</h3>';
			echo '<a href="functions/logout.php?location='.$_SERVER["PHP_SELF"].'">Logout</a>';
		}
			
		?>
		<!--<div class="meta"><a href="registration.php">Register</a>  or <a href="#">Forgotten Password</a></div>-->
	</div>	
	
	
</div>
	
	