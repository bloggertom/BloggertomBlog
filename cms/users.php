<? session_start();
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
		
		require("functions/connectToDataBase.php");
	
	$query = "SELECT * FROM User";
	
	$res = mysql_query($query);
	
	echo '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			
				<head>
					<title>Manage Bloggertom - Users</title>
					<link rel="stylesheet" href="css/cssprint.php" type="text/css" />
				</head>
				
				<body>
				<div id="header">
					<h2><a href="../index.php">Return to Bloggertom.com</a></h2>
				</div>
				<div id="main">';
				include("includes/navigation.php");
				echo '<div id="content">';
				echo '<h3 class="center">Users</h3>';
				echo '<table border="1">';
				echo '<tr>
					  <th>User Name</th>
					  <th>Role</th>
					  <th>Email</th>
					  <th>Options</th>
					  </tr>';
				while($user = mysql_fetch_array($res))
				{
					
					echo '<tr>
						  <td>'.$user["UID"].'</td>
						  <td>'.$user["UserRole"].'</td>
						  <td>'.$user["Email"].'</td>
						  <td><a href="aUser.php?UID='.$user["UID"].'">Edit</a> <a href="functions/removeUser.php?UID='.$user["UID"].'">Delete</a></td>
						  </tr>';
					
				}
				echo '</table>';
				echo '</div>';
				
	echo '
				</div>
				
				</body>
			</html>
';
		
		
	}
?>