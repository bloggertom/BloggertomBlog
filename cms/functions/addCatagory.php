<?php session_start();
	require("connectToDatabase.php");
	$title = $_POST['name'];
	
	$query = "INSERT INTO GalleryCatagories (CatagorieID, CatagorieName) VALUES ('','".$title."')";
	mysql_query($query);
	
	mysql_close($conn);
	
	header("location:../gallery.php");
	exit()
	
	
?>