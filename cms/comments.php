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
		echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			
				<head>
					<title>Manage Bloggertom - Comments</title>
					<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

				</head>
				
				<body>
				<div id="header">
					<h2><a href="../index.php">Return to Bloggertom.com</a></h2>
				</div>
				<div id="main">
				';
				include("includes/navigation.php");
				echo '<div id="content" align="center">';
				echo '<h3 class="center">Comments</h3>';
				include("includes/commentsList.php");			
				echo '</div>';
				echo '
				</div>
				
				</body>
			</html>
';
	}
	
?>