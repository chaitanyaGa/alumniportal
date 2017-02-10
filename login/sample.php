<?php
//Connection file included
include "../connection.php";

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
		header("Location:../EditProfile1.php");
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
<html>
<head>

	<link rel="stylesheet" href="shubham.css">


</head>
<body>

<h2>Animated Modal with Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>
<button id="myBtn1">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
	<div class="login">
	          <span class="close">&times;</span>

	  <header class="login-header"><span class="text">LOGIN</span><span class="loader"></span></header>
		<form  method="post" action="sample.php">
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
