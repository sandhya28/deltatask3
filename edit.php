<?php 
	
	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('testing');
  
  	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
		
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

{

	$result = mysql_query("SELECT * FROM LinkZone WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
				$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					$user = mysql_fetch_array($result);
				} 
				else 
				{
					
					echo "<script>alert('Something went wrong. SORRY!');document.location='display.php';</script>";
				}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit your LinkZone profile</title>
	<style type="text/css">
		body
			{
				background-image: url("backgroundsignup.jpg");
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
<div id="signup_page">

<p>USERNAME : <?php echo $username;?> </p>

<form action = "form.php" method = "post" enctype="multipart/form-data">

	PROFILE PICTURE<br><input type="file" name="image" oninvalid="setCustomValidity('Enter a valid file. Can\'t be left blank')"
	 onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	FIRSTNAME<input type="text" name="firstname" required value = "<?php echo $user['FIRSTNAME'];?>" oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>	

	LASTNAME<br><input type="text" name="lastname" value = "<?php echo $user['LASTNAME'];?>"><br><br>

	OLD PASSWORD(Min. 8 characters)<br><input type="password" name="oldpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">
	<br><br>


	NEW PASSWORD(Min. 8 characters)<br><input type="password" name="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">
	<br><br>

	CONFIRM PASSWORD(Min. 8 characters)<br><input type="password" name="confirmnewpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">
	<br><br>

	NATIONALITY<br><input type="text" name="nationality" required value = "<?php echo $user['NATIONALITY'];?>"
	oninvalid="setCustomValidity('Can\'t be left blank)" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	E-MAIL<br><input type="email" name="email" placeholder="e.g. user@example.com" required  value = "<?php echo $user['EMAIL'];?>"
	oninvalid="setCustomValidity('Fill in a valid e-mail address E.g. user@example.com.Can\'t be left blank.')" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	ADDRESS<br><textarea name="address" rows="7" cols="50" required
	 oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}"><?php echo $user['ADDRESS'];?></textarea><br><br>

	MOBILE NUMBER(10 digit)<br><input type="number" name="phoneno" min="1000000000" max="9999999999" value = "<?php echo $user['PHONENO'];?>"
	oninvalid="setCustomValidity('Enter a valid 10 digit number. Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" required><br><br>

	<input type="submit" name="details_submit" value="Submit" class="submitbuttonforsignup">

</form>
 

</div>
</body>
</html>