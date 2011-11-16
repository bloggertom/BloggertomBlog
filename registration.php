<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Bloggertom.com</title>
		<link rel="stylesheet" href="css/cssprint.php" type="text/css" />
		
		<script type="text/javascript">
  //<!--[CDATA[
  function valadateOrder(orderForm) {
		orderForm.onsubmit=function()
		{
			var emailRegexp=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!emailRegexp.test(orderForm.elements['email'].value))
			{
				alert("You Have not entered a valid email address");
				return false;
			}
			return true
		}
	}
	//]]-->
	</script>
	</head>
	<body>
		<?php 
			include("includes/Header.php");
			include("includes/navigation.php");
		?>
		<div id="content">
			<div id="fullpage">
				<div id="pageTitle">
					<h3>Registration</h3>
				</div>
				<form class="registration" name="registration" action="functions/addNewUser.php" method="post">
					<table>
					<tr>
						<td><label>User Name</label></td>
						<td><input type="text" name="uid" maxlength="12" />
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="password" maxlength="12" /></td>
					</tr>
					<tr>
						<td><label>Email</label></td>
						<td><input type="text" name="email" maxlength="30" />
					</tr>
					<tr>
						<td><input type="submit" value="Sumbit" /></td>
						<td></td>
					</tr>
					</table>
				</form>
				<script type='text/javascript'>
		<!--
   			 new valadateOrder(document.forms['registration']);
		-->
		</script>
			</div>
		</div>
		
		<?php include("includes/footer.php");?>
	</body
	
</html>