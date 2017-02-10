<?php
//connection file is included
include 'connection.php';

//acvoiding error showing
error_reporting(0);

//Code after register button is clicked
if($_POST['submit'])
{
	$flg=0;
	
	//Getting data from the register form
	$Name=$_POST['Name'];	
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$Key=$_POST['Key'];

	//Register key verification	
	if(strcmp($Key,"alumni@wlug")==0)
	{	  
		if(@mysql_select_db($dbname,$connection))
		{
			$qur1="select username from registration where BINARY username='".$Username."'";
			$res1=@mysql_query($qur1,$connection);
			$result_count=@mysql_fetch_array($res1);
			
			//Username repetation check
			if($result_count>0)
			{
				echo "<script>";
				echo "alert('Username is already exist.')";
				echo "</script>";
			}
			else
			{
			    $qur="insert into registration(name,username,password) VALUES('$Name','$Username','$Password')";
			    $res=mysql_query($qur,$connection);
				if($res)
				{				
					echo "<script>";
					echo "alert('You are successfully registered.')";
					echo "</script>";
				}
				else
				{
					echo "<script>";
					echo "alert('There is some problem while registring your account.')";
					echo "</script>";
				}
			}
		}
	}
	//Invalid key code 
	else
	{
		
            echo "<script>";
            echo "alert('Please insert a correct key')";
            echo "</script>";
	}
}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.jpg">
	<!--nav bar file is included-->
	<?php include 'header.php';?>
    <title>RegistrationForm</title>
    <link rel="stylesheet" href="css/RegForm.css">
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
<style>
#search{
	margin-left:10%;
}   
html .login-wrap .form input[type="text"],
html .login-wrap .form input[type="email"],
html .login-wrap .form input[type="url"],
html .login-wrap .form input[type="password"] {
  border: 1px solid #bbb;
  padding: 0 0 0 5px;
  font-size: 20px;
}

</style>    
</head>
<body background="images/back.jpg" data-spy="scroll" data-offset="0" data-target="#theMenu">  
	<br><br>
	<div class="login-wrap">
		<h2>REGISTER HERE</h2>
		<div class="form">
			<form method="post" action="Register.php" enctype="multipart/form-data">
				<label>Name</label><br><input type="text" name="Name" required />
				<br><br>	
				<label>Enter Username</label><br><input type="text" name="Username" required /><br><br>
				<label>Enter Password</label><br><input type="password" name="Password" required /><br><br>
				<label>Registration Key</label><br><input type="text" name="Key" required /><br><br>
				<input id="submit" name="submit" type="submit" value="Register"></input>
			</form>
		</div>
	</div>
	<br><br> 
</body>
</html>
