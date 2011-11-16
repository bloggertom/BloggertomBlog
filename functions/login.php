<?php session_start();

		require("connectToDatabase.php");
		
		$uid = mysql_real_escape_string($_POST['uid']);
		$password = mysql_real_escape_string($_POST['password']);
		$location = mysql_real_escape_string($_GET['location']);
		
		$password = md5($password);
		
		$quere = "SELECT * FROM User WHERE UID = '".$uid."' AND Password = '".$password."'";
			$res = mysql_query($quere);
			mysql_close($conn);
			
			if (mysql_num_rows($res) == 0) {
				header("location:".$location."?login=false");
				exit();
			} else {
				$user=mysql_fetch_array($res);
				$_SESSION['user'] = $user;				
				header("location:".$location."?login=true");
				exit();
			}
		

	?>

	
	
