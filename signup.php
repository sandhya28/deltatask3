<!DOCTYPE html>
<html>
<head>
	<title>SignUp for LinkZone</title>
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

<form action = "action.php" method = "post" enctype="multipart/form-data">

	PROFILE PICTURE<br><input type="file" name="image" required oninvalid="setCustomValidity('Enter a valid file. Can\'t be left blank')"
	 onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	FIRSTNAME<input type="text" name="firstname" required oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	LASTNAME<br><input type="text" name="lastname" ><br><br>

	USERNAME(Min. 4 characters)<br><input type="text" name="username"  required pattern="([a-zA-Z][a-zA-Z0-9\s]*).{4,}" oninvalid="setCustomValidity('Can only be alphanumeric.Can\'t be left blank')" onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	PASSWORD(Min. 8 characters)<br><input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">
	<br><br>

	CONFIRM PASSWORD(Min. 8 characters)<br><input type="password" name="confirmpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">
	<br><br>

	GENDER<br><input type="radio" name="gender" value="Female" required 
	oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">Female<br>
			  <input type="radio" name="gender" value="Male">Male<br><br>

	NATIONALITY<br><input type="text" name="nationality" required 
	oninvalid="setCustomValidity('Can\'t be left blank)" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	E-MAIL<br><input type="email" name="email" placeholder="e.g. user@example.com" required  
	oninvalid="setCustomValidity('Fill in a valid e-mail address E.g. user@example.com.Can\'t be left blank.')" 
	onchange="try{setCustomValidity('')}catch(e){}"><br><br>

	ADDRESS<br><textarea name="address" rows="7" cols="50" required
	 oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}"></textarea><br><br>

	MOBILE NUMBER(10 digit)<br><input type="number" name="phoneno" min="1000000000" max="9999999999" 
	oninvalid="setCustomValidity('Enter a valid 10 digit number. Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" required><br><br>

	<input type="submit" name="details_submit" value="Submit" class="submitbuttonforsignup">

</form>
 

</div>
</body>
</html>