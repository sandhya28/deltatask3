<?php 

	
if (isset($_POST['myprofile'])) 
{
	header("location:display.php");
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];

$result = mysql_query("SELECT * FROM LinkZone WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
					$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					$user = mysql_fetch_array($result);
					
				} 
				
}

?>

<?php

  	$conn = mysql_connect('localhost','root','')or die(mysql_error());
  	mysql_select_db('testing')or die(mysql_error());
  	
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

if(($_POST['searchuser']))
{
	$username = $_POST['search'];
		
	$result = mysql_query("SELECT * FROM LinkZone WHERE username = \"$username\" ")or die(mysql_error());
					
					$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					$user = mysql_fetch_array($result);
				} 
				else 
				{
					echo "<script>alert('No such user exist');history.go(-1);</script>";
				}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	<style type="text/css">
		body {
			
			background-image: url("backgroundlogin.jpg");
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

<div id=user_login>
	<h3>DETAILS</h3>
	<p>
	<?php
	$image = $user['PROFILEPIC'];

	$imag = base64_encode($image);

	echo "<p align='center'>"."<img style='display:block; width:200px;height:200px;' id='base64image'                 
       src='data:image/jpeg;base64,$imag' >"."</p>";
   ?>
	<?php echo "<p>NAME          : ".$user['FIRSTNAME']." ".$user['LASTNAME']."</p>";?>
	<?php echo "<p>USER NAME     : ".$user['USERNAME']."</p>";?>
	<?php echo "<p>GENDER        : ".$user['GENDER']."</p>";?>
	<?php echo "<p>NATIONALITY   : ".$user['NATIONALITY']."</p>";?>	
	<?php echo "<p>EMAIL         : ".$user['EMAIL']."</p>";?>
	<?php echo "<p>ADDRESS       : <br>".$user['ADDRESS']."</p>";?>
	<?php echo "<p>MOBILE NUMBER : ".$user['PHONENO']."</p>";?>
	
	</p>
	
	<form method="post" action="search.php">
		<input type="submit" name="myprofile" value="My Profile" class="loginbutton" >
	</form>

</div><form action="search.php" method="post">
	<input type="text" name="search" id = "search" placeholder="Search using username" list="names" >
	
	<?php 
	{
	$conn = mysql_connect('localhost','root','')or die(mysql_error());
  	mysql_select_db('testing')or die(mysql_error());
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}
  	
  	$result = mysql_query("SELECT USERNAME FROM LinkZone")or die(mysql_error());
	echo "<datalist id=\"names\">";
	while($user = mysql_fetch_array($result))
	{
		echo"<option value = \"".$user['USERNAME']."\">";
	}
	echo "</datalist>";
}
?><input type="submit" name="searchuser" id="searchuser" value="Search User" >	
</form>
</body>
</html>
