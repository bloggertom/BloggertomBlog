<?php session_start();
	require("functions/connectToDatabase.php");
	$photoID = mysql_real_escape_string($_GET['pid']);
	
	$query = sprintf("SELECT * FROM GalleryPhotos WHERE PhotoID = %d",$photoID);
	$res = mysql_query($query);
	$photo = mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Bloggertom.com - Gallery</title>
		<link rel="stylesheet" href="css/cssprint.php" type="text/css" />
	</head>
	
	<body>
		<?php 
			include("includes/Header.php");
			include("includes/navigation.php");
		?>
		<div id="content">
			<div id="fullpage">
				<div id="pageTitle">
					<h3>Photo <?php echo $photo['PhotoID'];?></h3>
				</div>
				<div align="center" style="margin-top:1em;">
					<?php
						echo '<img src="gallery/'.$photo["PhotoName"].'" width="860"/>';
						echo '<h3>'.$photo["PhotoCaption"].'</h3>';
					?>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php"); ?>
	</body>
</html>
<?php mysql_close($conn); ?>