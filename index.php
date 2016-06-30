<?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('testing');

	
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

if(isset($_POST['submit']))
{
	$username = $_POST['Name'];
	$password = sha1($_POST['loginpass']);
	
	$result = mysql_query("SELECT * FROM LinkZone WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
				$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					header("location:display.php");
				}

				else 
				{
					echo "<script>alert('User Name and Password didnt match');document.location='index.php';</script>";
				}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		LinkZone: You and them
	</title>
	<style type="text/css">
		body {
			
			background-image: url("background.jpg");
			background-size: 100%;
			background-repeat: no-repeat;

		}
		
	</style>
	<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
<header>
	<img src="headerlogo.png" id="logo">
	<h1 class = "header_tag">
		Link Zone 
	</h1>
	<h2>All about YOU</h2>
</header>

<h1>LOGIN</h1>
<div id="login_page">
<form action="index.php" method = "post">
	
	<br><input type="text" name="Name" placeholder="Username" required><br>
		<br><input type="password" name="loginpass" placeholder="Password" required><br><br>
		<input type="submit" name="submit" value="Login" class="loginbutton">
</form>
<form action="signup.php" method="post">
	<input type="submit" name="signup" value="Sign Up" class="submitbutton">
</form>
</div></body>
</html>
