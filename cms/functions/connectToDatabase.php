<?php 
	$conn = mysql_connect("localhost", "root", "root") or die(mysql_error());
		mysql_select_db("Blog") or die(mysql_error());
?>