<?php
//Connection file included
include "connection.php";

//avoiding error showing
error_reporting(0);

//session start
session_start();

//If user hit login button
if(isset($_POST['login']))
{
	$message="";
	//Getting username and password from the user
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	mysql_select_db($dbname,$connection);
	$qur="select * from registration where BINARY username='".$Username."' and BINARY password='".$Password."'";
	$result=@mysql_query($qur,$connection);
	$count_lines=mysql_num_rows($result);
	//Checking username validaty
	if($count_lines>0)
		$val=TRUE;
	else
		$val=FALSE;
	$row  = @mysql_fetch_array($result);
	//If username find store it in session variables
	if($val) 
	{
		$_SESSION["username"] = $row['username'];
		$_SESSION['user']=$Username;
		header("Location:EditProfile1.php");
	}
	//Invalid username or password
	else 
	{
		echo "<script>";
		echo "alert('Invalid Username or Password')";
		echo "</script>";
	}
}

if($_POST['register'])
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.jpg">
	<!--navbar is included-->
	<?php include 'header.php';?>
    <title>Alumni Portal</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

<style>
	.button1 {
    background-color: #009688; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color:orange;
    color:white;
	width:130px;
	height:60px;
    border: 2px solid #009688;
	border-radius: 25px;

}

.button1:hover {
    background-color:#FFCA28;
    color: white;
}
.logo img{
background-color:hsla(50,100%,75%,0.3);
}
.logo img{
opacity:0.8;
	font-size: .8em;
	text-align: center;
	padding: 10px;
	background-color: #111;
	color: #fff;
	box-shadow:	0px 1px 3px 0px rgba(0, 0, 0, .3);
	text-transform: uppercase;
	position: relative;
	font-weight: bold;
	
	-webkit-animation: bounce 800ms ease-out;
	-moz-animation: bounce 800ms ease-out;
	-o-animation: bounce 800ms ease-out;
	animation: bounce 800ms ease-out;
}

/* Webkit, Chrome and Safari */

@-webkit-keyframes bounce {
  0% {
	-webkit-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-webkit-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateY(-50%);
  }
  40% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateY(-30%);
  }
  70% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateY(-15%);
  }
  90% {
  	-webkit-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-webkit-transform:translateY(-10%);
  }
  97% {
  	-webkit-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-webkit-transform:translateY(-5%);
  }
  100% {
  	-webkit-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* Mozilla Firefox 15 below */
@-moz-keyframes bounce {
  0% {
	-moz-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-moz-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateY(-50%);
  }
  40% {
  	-moz-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateY(-30%);
  }
  70% {
  	-moz-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateY(-15%);
  }
  90% {
  	-moz-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-moz-transform:translateY(-10%);
  }
  97% {
  	-moz-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-moz-transform:translateY(-5%);
  }
  100% {
  	-moz-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* Opera 12.0 */
@-o-keyframes bounce {
  0% {
	-o-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-o-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-o-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-o-transform:translateY(-50%);
  }
  40% {
  	-o-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-o-transform:translateY(-30%);
  }
  70% {
  	-o-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-o-transform:translateY(-15%);
  }
  90% {
  	-o-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-o-transform:translateY(-10%);
  }
  97% {
  	-o-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-o-transform:translateY(-5%);
  }
  100% {
  	-o-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* W3, Opera 12+, Firefox 16+ */
@keyframes bounce {
  0% {
	transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	transform:translateY(-50%);
  }
  40% {
  	transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	transform:translateY(-30%);
  }
  70% {
  	transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	transform:translateY(-15%);
  }
  90% {
  	transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	transform:translateY(-7%);
  }
  97% {
  	transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	transform:translateY(-3%);
  }
  100% {
  	transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}



/***************/
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 3%; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top:10%; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
    position: relative;
    margin: auto;
    padding: 0;
    width:70%;
    background-color:rgba(0, 0, 0, 0.5);
    
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}
.modal-content1 {
    position: relative;
    margin: auto;
    padding: 0;
    width:450px;
    height:400px;
	background-color:rgba(0, 0, 0, 0.5);

	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: red;
    float: right;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}




.close1 {
    color: red;
    float: right;
    font-size: 35px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
/*login Form*/

      * {
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}



.login {
  position: absolute;
  top: 44%;
  left: 44%;
  margin: -10rem 0 0 -10rem;
  width: 25rem;
  height: 25rem;
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
  width: 25rem;
  height: 25rem;
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


/*register form*/
#DOB{
	width:40%;
	height:30px;
}
#profile_upload{
	width:40%;
	height:30px;
	margin-left:30%
}
label{
	padding-left:10%;
	letter-spacing:2px;
	font-family:'Arima Madurai', cursive;
}
html .login-wrap {
  position: relative;
  margin: 0 auto;
  background: #ecf0f1;
  width:80%;
  border-radius: 5px;
  box-shadow: 3px 3px 10px #333;
  padding: 15px;
}
html .login-wrap h2 {
  text-align: center;
  font-weight: 200;
  font-size: 2em;
  margin-top: 10px;
  color: #34495e;
}

html .login-wrap .form input[type="text"],
html .login-wrap .form input[type="email"],
html .login-wrap .form input[type="url"],
html .login-wrap .form input[type="password"],
html .login-wrap .form #submit {
  width: 80%;
  margin-left: 10%;
  margin-bottom: 25px;
  height: 40px;
  border-radius: 5px;
  outline: 0;
  -moz-outline-style: none;
}
html .login-wrap .form input[type="text"],
html .login-wrap .form input[type="email"],
html .login-wrap .form input[type="url"],
html .login-wrap .form input[type="password"] {
  border: 1px solid #bbb;
  padding: 0 0 0 5px;
  font-size: 20px;
}
html .login-wrap .form input[type="text"]:focus,
html .login-wrap .form input[type="email"]:focus,
html .login-wrap .form input[type="url"],:focus,
html .login-wrap .form input[type="password"]:focus {
  border: 1px solid #3498db;
}
html .login-wrap .form a {
  text-align: center;
  font-size: 10px;
  color: #3498db;
}
html .login-wrap .form a p {
  padding-bottom: 10px;
}
html .login-wrap .form #submit {
  background: #e74c3c;
  border: none;
  color: white;
  font-size:18px;
  font-weight: 200;
  cursor: pointer;
  transition: box-shadow .4s ease;
}
html .login-wrap .form #submit:hover {
  box-shadow: 1px 1px 5px #555;
}
html .login-wrap .form #submit:active {
  box-shadow: 1px 1px 7px #222;
}
html .login-wrap:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background: -webkit-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
  background: -moz-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
  height: 5px;
  border-radius: 5px 5px 0 0;
}

</style>


</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">	
	<section id="home" name="home"></section>
	<div id="headerwrap">
		<div class="container-fluid">
			<div class="logo">
				<img src="images/logo.jpg" style="background-color:;opacity:0.8" width="15%" height="80px">
			</div>
			<h1 style="text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,
				0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);">WLUG ALUMNI PORTAL</h1>
			<h3 >Meet Our Alumni Here</h3>
			<br>
			<br>			

			<button class="button1" id="myBtn" style="font-size:20px;font-family:bold;" >LogIn</button></center>
			</div>
			</div>
			<!-- The Modal -->
<div id="myModal" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
	<div class="login">
	          <span class="close">&times;</span>

	  <header class="login-header"><span class="text">LOGIN</span><span class="loader"></span></header>
		<form  method="post" action="index.php">
			<input type="text" name="Username" placeholder="Username" class="login-input"/>
			<input type="password" name="Password" placeholder="Password" class="login-input"/>
			<!--class="login-btn"-->
			<br><br><br>
			<button class="login-btn" name="login" type="submit" >LOGIN</button> 
		</form>
	</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script> 
    
  </div>

</div>

<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

	<div class="login-wrap">
			          <span class="close1">&times;</span>

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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script> 
    
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
	
}
span1.onclick = function() {
    modal1.style.display = "none";
	 

}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		        

    }
}
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
		        

    }
}
</script>
</body>
</html>
