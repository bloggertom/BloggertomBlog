<?php session_start();
require("functions/connectToDatabase.php");

if(isset($_GET['catagory'])){
	$cat = (int)mysql_real_escape_string($_GET['catagory']);
}
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
					<h3>Gallery</h3>
					
				</div>
				
				<div id='gallery' align='center'>
				<div id=galleryFilter align='right'>
				<?php
					$query = "SELECT c.CatagorieID, c.CatagorieName, COUNT(PhotoID) FROM GalleryCatagories AS c LEFT JOIN GalleryPhotos AS p ON p.PhotoCatagory = c.CatagorieID GROUP BY c.CatagorieID";
					
					$res = mysql_query($query);
					
				?>
					<form action='gallery.php' method='get'>
						Filter by catagory: <select name="catagory">
						<?php
							while($a = mysql_fetch_array($res)){
							
								if(isset($a[2])){
									echo '<option value="'.$a[0].'">'.$a[1].' ('. $a[2] .')</option>';
								}else{
									echo '<option value="'.$a[0].'">'.$a[1].' (0)</option>';
								}
							}
							mysql_free_result($res);
						?>
						<input type='submit' value='Filter' />
					</form>
				</div>
					<table border='1'>
						<?php
							$startingPic = 0;
							if(isset($_GET['start'])){
								$startingPic =(int)$_GET['start'];
							}
							$picturesPerPage = 21;
							$picDir = 'gallery/';
							if(isset($cat)){
								$query = sprintf("SELECT * FROM GalleryPhotos  WHERE PhotoCatagory = %d LIMIT %d,%d",$cat,$startingPic,$picturesPerPage);
							}else{
								$query = sprintf("SELECT * FROM GalleryPhotos LIMIT %d,%d",$startingPic,$picturesPerPage);
							}
							$res = mysql_query($query);
							echo'<tr>';
							$count=0;
							while($pic = mysql_fetch_array($res)){
								$count++;
								echo '<td><a href="photoDetails.php?pid='.$pic["PhotoID"].'"><img src="'.$picDir.'thumbnails/tb_'.$pic["PhotoName"].'" width="150" height="auto" /></a></td>';
								if($count%5==0){
									echo'</tr>';
								}
								if(($count%5==0)&&($count!=mysql_num_rows($res))){
									echo'<tr>';
								}
								
							}
							if($count%5!=0){
								echo'</tr>';
							}
							mysql_free_result($res);
						?>
					</table>
					<?php
						if(isset($cat)){
							$query = sprintf("SELECT COUNT(*) FROM GalleryPhotos WHERE PhotoCatagory = %d",$cat);
						}else{
							$query = "SELECT COUNT(*) FROM GalleryPhotos";
						}
						$res = mysql_query($query);
						
						$array = mysql_fetch_array($res);
						$pictureCount =(int)$array["COUNT(*)"];
						
						$numOfPages = $pictureCount/$picturesPerPage;
						
						
						for($i=0;$i<$numOfPages;$i++){
							echo sprintf("<a href='gallery.php?start=%d'>%d</a> ",$picturesPerPage*$i,$i+1);
						}
						mysql_free_result($res);
					?>
				</div>
			</div>
		
		</div>
		<?php 
			include("includes/footer.php");
			mysql_close($conn);
		?>
	</body>
	
</html>