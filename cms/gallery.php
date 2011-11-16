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
		require("functions/connectToDatabase.php");
		$query = "SELECT * FROM GalleryCatagories";
		$res = mysql_query($query);
		$catagoryList = "";
		while($row = mysql_fetch_array($res)){
		$catagoryList .= <<<__HTML_END
		<option value="$row[0]">$row[1]</option>
__HTML_END;
		}
		mysql_free_result($res);
	echo '
		
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
			
				<head>
					<title>Manage Bloggertom - Manage</title>
					<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

				</head>
				
				<body>
				<div id="header">
					<h2><a href="../index.php">Return to Bloggertom.com</a></h2>
				</div>
				<div id="main">';
				include("includes/navigation.php");
				echo '
					<div id="content" align="center">
					
						<h3 class="center">Add Catagory</h3>
						<form action="functions/addCatagory.php" method="post">
							<label>Catagory Name: </label><input type="text" name="name" />
							<input type="submit" value="Go" />
						</form>
						
						<h3 class="center">Add Photos</h3>
						<form enctype="multipart/form-data" action="functions/imageUploader.php?location=gallery" method="post">
							<table border="1" width="60%">
							<tr><td>
								<label>Select Catagory:</label>
								<select name="catagory">';
									echo $catagoryList;
								echo'</select>
							</td></tr>
							<tr><td>
								<label> Photo 1: </label>
								<input name="photoNames[]"  type="file" />
							</td></tr>
							<tr><td>
								<label>Caption: </label>
								<textarea name="photoCaptions[]" cols="30" rows="1"></textarea>
							</td></tr>
							<tr><td>
								<label> Photo 2: </label>
								<input name="photoNames[]"  type="file" />
							</td></tr>
							<tr><td>
								<label>Caption: </label>
								<textarea name="photoCaptions[]" cols="30" rows="1"></textarea>
							</td></tr>
							<tr><td>
								<label> Photo 3: </label>
								<input name="photoNames[]"  type="file" />
							</td></tr>
							<tr><td>
								<label>Caption: </label>
								<textarea name="photoCaptions[]" cols="30" rows="1"></textarea>
							</td></tr>
							<tr><td>
								<label> Photo 4: </label>
								<input name="photoNames[]"  type="file" />
							</td></tr>
							<tr><td>
								<label>Caption: </label>
								<textarea name="photoCaptions[]" cols="30" rows="1"></textarea>
							</td></tr>
							<tr><td>
								<label> Photo 5: </label>
								<input name="photoNames[]"  type="file" />
							</td></tr>
							<tr><td>
								<label>Caption: </label>
								<textarea name="photoCaptions[]" cols="30" rows="1"></textarea>
							</td></tr>
							<tr><td>
								<input type="submit" value="upload" style="float:right"/>
							</td></tr>
							</table>
						</form>
					</div>
				</div>
				</body>
			</html>';
				
	
	}
	mysql_close($conn)
	?>