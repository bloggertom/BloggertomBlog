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
					<title>Manage Bloggertom User</title>
					<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

				</head>
				<body>';
				
				
		if(isset($_GET["UID"])){
		$uid = mysql_real_escape_string($_GET["UID"]);
		
		require("functions/connectToDataBase.php");

		$query = "SELECT * FROM User WHERE UID ='".$uid."'";
		$res = mysql_query($query);
		$user = mysql_fetch_array($res);
		echo '
			  <h2>User Name: '.$user["UID"].'</h2>
			  <form action="functions/addUser.php" method="post">
			  <label>Email: </label><input type="text" name="email value="'.$user["Email"].'"/>
			  <label>Role: </label>'.$user["UserRole"];
			  if(strcmp($user["UID"],"admin")!=0){
			  echo'
			  <select name="role">
			  	<option value="0">Change Role</option>
			  	<option value="Editor">Editor</option>
			  	<option value="Author">Author</optoin>
			  	<option value="Subscriber">Subscriber</option>
			  </select>';
			  }
			  
			  
			  echo'<input type="submit" value="Submit" />
			  </form>';
		}
		mysql_close($conn);
				
	}
	echo '</body>';
?>