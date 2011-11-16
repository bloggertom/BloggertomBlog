<?php session_start();

	$uid = mysql_real_escape_string($_POST['uid']);
	$password = mysql_real_escape_string($_POST['password']);
	$email = mysql_real_escape_string($_POST['email']);
	
	$password = md5($password);
	
	$_SESSION['user']['UID'] = $uid;
	$_SESSION['user']['password']= $password;
	$_SESSION['user']['email'] = $email;
	
	require("connectToDatabase.php");
	
	$query_str = "INSERT INTO User (UID, Password, UserRole, Email) VALUES('".$uid."', '".$password."', 'Subscriber', '".$email."')";
	mysql_query($query_str) or die(mysql_error());
	
	mysql_close($conn);
	
	header("location:../index.php");
	exit();
?>