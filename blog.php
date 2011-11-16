<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Bloggertom.com - Blog</title>
		<link rel="stylesheet" href="css/cssprint.php" type="text/css" />

	</head>
	
	<body>
		<?php 
			include("includes/Header.php");
			include("includes/navigation.php");
		?>
		<div id="content">
			<div id="left">
			<?php include("includes/posts.php");?>
			</div>
		
			<div id="right">
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
				<div class="widget">
					<p>Meta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta dataMeta data</p>
				</div>
			</div>
		</div>
		<?php include("includes/footer.php");?>
	</body>
</html>