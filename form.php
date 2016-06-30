  <?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('testing');
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}
  		session_start();
  		$username = $_SESSION['username'];
  		$password = $_SESSION['password'];
  		

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
  			$firstname = test_input($_POST['firstname']);
			$lastname = test_input($_POST['lastname']);
			$nationality = test_input($_POST['nationality']);
			$email = test_input($_POST['email']);
			$address = test_input($_POST['address']);
			$phoneno = test_input($_POST['phoneno']);
 		}
		function test_input($data) 
		{
  			$data = trim($data);
  			$data = stripslashes($data);

  			$data = htmlspecialchars($data);
  				$data = mysql_real_escape_string($data);
  			return $data;
  		}

  		if($_POST['details_submit'])
  		{		

  			$file = $_FILES['image']['tmp_name'];
  			
  			if(isset($file))
  			{
  				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  				$file_name = addslashes($_FILES['image']['name']);
  				$image_size = getimagesize($_FILES['image']['tmp_name']);
  				$flag = 0;
  				if($image_size == TRUE)
    			{
    				$flag = 1;	
    			}
  			}
			
			
			$oldpassword = sha1($_POST['oldpassword']);
			
			$newpassword = sha1($_POST['newpassword']);
			$confirmnewpassword = sha1($_POST['confirmnewpassword']);

			if($oldpassword != $password)
			{
				echo  "<script> 
					
    				history.go(-1);
    				alert(\"old password is incorrect\");

    				</script>";

				exit();
			}	
			if($newpassword != $confirmnewpassword)
			{

				echo  "<script> 
					
    				history.go(-1);
    				alert(\"passwords don't match\");

    				</script>";

				exit();
			} 
			else
			{	
				$result = mysql_query("SELECT * FROM LinkZone WHERE username = \"$username\"")or die(mysql_error());
					
					$count = mysql_num_rows($result);
					$user = mysql_fetch_array($result);

					
				{	
					
					$result = mysql_query("SELECT * FROM LinkZone WHERE email = \"$email\"")or die(mysql_error());
					
					$count = mysql_num_rows($result);
					$user = mysql_fetch_array($result);

					if($count == 1 && $user['USERNAME']!=$username) 
					{
						echo  "<script> 
						history.go(-1);
    					alert('user with this email already exists');
    					</script>";
    					exit();
					} 
    				else
					{	
						$result = mysql_query("SELECT * FROM LinkZone WHERE phoneno = \"$phoneno\"")or die(mysql_error());
						
						$count = mysql_num_rows($result);
						$user = mysql_fetch_array($result);
						
						if($count == 1 && $user['USERNAME']!=$username) 
						{
							
     						echo  "<script> 
							history.go(-1);
    						alert('user with mobile number already exists');
    						</script>";
    						exit();
						} 
						else
						{	
							if($flag == 1)
							mysql_query(" UPDATE LinkZone 
							SET 
								FIRSTNAME ='$firstname',
								LASTNAME = '$lastname',
								PASSWORD ='$newpassword',
								NATIONALITY ='$nationality',
								EMAIL =	'$email',
								ADDRESS ='$address',
								PHONENO ='$phoneno',
								FILENAME ='$file_name',
								PROFILEPIC ='$image'
							 WHERE
							 	USERNAME = '$username'") or die(mysql_error()) ;
						    else
						    	mysql_query(" UPDATE LinkZone 
							SET 
								FIRSTNAME ='$firstname',
								LASTNAME = '$lastname',
								PASSWORD ='$newpassword',
								NATIONALITY ='$nationality',
								EMAIL =	'$email',
								ADDRESS ='$address',
								PHONENO ='$phoneno'
							 WHERE
							 	USERNAME = '$username'") or die(mysql_error()) ;
							session_unset();
							echo "<script>alert('Edit Successful. Login again to proceed');
									document.location='index.php';
								</script>";
							//header("location:index.php");
						}

					}

				}
			
			}
		}
 ?>