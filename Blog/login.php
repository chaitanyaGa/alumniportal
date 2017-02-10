<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!--PHP code for Login page-->

<?php

//Connection file included
include "../connection.php";

//avoiding error showing
error_reporting(0);

//Starting session
session_start();

//processing code after user pressed login button
if(isset($_POST['submit']))
{
	$message="";
	//Getting username and password
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];	
	mysql_select_db($dbname,$connection);
	
	//Checking valid user or not
	$qur="select * from registration where BINARY username='".$Username."' and BINARY password='".$Password."'";
	$result=@mysql_query($qur,$connection);
	$count_lines=mysql_num_rows($result);

	if($count_lines>0)
		$val=TRUE;
	else
		$val=FALSE;

	$row  = @mysql_fetch_array($result);
	
	//Valid user
	if($val) 
	{		
		//Storing username and password in session variables
		$_SESSION["username"] = $row['username'];
		$_SESSION['user']=$Username;
		header("Location:../OptionWindow.php");
	}
	
	//Invalid User
	else 
	{
		echo "<script>";
		echo "alert('Invalid Username or Password')";
		echo "</script>";
	}

}
?>
<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<!--nav bar file included-->
	<?php include 'header.php';?>

    <title>login form</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../images/logo.jpg">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/modernizr.custom.js"></script>
	

	
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/reset.css">

    
    <style>
* {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: #333;
  font: 100%/1 "Helvetica Neue", Arial, sans-serif;
}

.login {
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -10rem 0 0 -10rem;
  width: 20rem;
  height: 20rem;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  overflow: hidden;
}

.login:hover > .login-header, .login.focused > .login-header {
  width: 2rem;
}

.login:hover > .login-header > .text, .login.focused > .login-header > .text {
  font-size: 1rem;
  transform: rotate(-90deg);
}

.login.loading > .login-header {
  width: 20rem;
}

.login.loading > .login-header > .text {
  display: none;
}

.login.loading > .login-header > .loader {
  display: block;
}

.login-header {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
  width: 20rem;
  height: 20rem;
  background: orange;
  transition: width 0.5s ease-in-out;
}

.login-header > .text {
  display: block;
  width: 100%;
  height: 100%;
  font-size: 5rem;
  text-align: center;
  line-height: 20rem;
  color: #fff;
  transition: all 0.5s ease-in-out;
}

.login-header > .loader {
  display: none;
  position: absolute;
  left: 5rem;
  top: 5rem;
  width: 10rem;
  height: 10rem;
  border: 2px solid #fff;
  border-radius: 50%;
  animation: loading 2s linear infinite;
}

.login-header > .loader:after {
  content: "";
  position: absolute;
  left: 4.5rem;
  top: -0.5rem;
  width: 1rem;
  height: 1rem;
  background: #fff;
  border-radius: 50%;
  border-right: 2px solid orange;
}

.login-header > .loader:before {
  content: "";
  position: absolute;
  left: 4rem;
  top: -0.5rem;
  width: 0;
  height: 0;
  border-right: 1rem solid #fff;
  border-top: 0.5rem solid transparent;
  border-bottom: 0.5rem solid transparent;
}

@keyframes loading {
  50% {
    opacity: 0.5;
  }
  100% {
    transform: rotate(360deg);
  }
}
.login-form {
  margin: 0 0 0 2rem;
  padding: 0.5rem;
}

.login-input {
  display: block;
  width: 100%;
  font-size: 2rem;
  padding: 0.5rem 1rem;
  box-shadow: none;
  border-color: #ccc;
  border-width: 0 0 2px 0;
}
.login-input + .login-input {
  margin: 10px 0 0;
}
.login-input:focus {
  outline: none;
  border-bottom-color: orange;
}

.login-btn {
  position: absolute;
  right: 1rem;
  bottom: 1rem;
  width: 5rem;
  height: 5rem;
  border: none;
  background: orange;
  border-radius: 50%;
  font-size: 0;
  border: 0.6rem solid transparent;
  transition: all 0.3s ease-in-out;
}
.login-btn:after {
  content: "";
  position: absolute;
  left: 1rem;
  top: 0.8rem;
  width: 0;
  height: 0;
  border-left: 2.4rem solid #fff;
  border-top: 1.2rem solid transparent;
  border-bottom: 1.2rem solid transparent;
  transition: border 0.3s ease-in-out 0s;
}
.login-btn:hover, .login-btn:focus, .login-btn:active {
  background: #fff;
  border-color: orange;
  outline: none;
}
.login-btn:hover:after, .login-btn:focus:after, .login-btn:active:after {
  border-left-color: orange;
}
</style>

    <script src="js/prefixfree.min.js"></script> 
</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu">
	<div class="login">
	  <header class="login-header"><span class="text">LOGIN</span><span class="loader"></span></header>
	  <form  method="post" action="login.php">
		
		<input type="text" name="Username" placeholder="Username" class="login-input"/>
		<input type="password" name="Password" placeholder="Password" class="login-input"/>
		
		<br><br><br>
		
		<button class="login-btn" name="submit" type="submit" >LOGIN</button> 
	
	  </form>
	</div>
    
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
