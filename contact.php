<?php
//avoiding error showing
error_reporting(0);

//Connection file included
include "connection.php";

//If contact for is submitted then following code is processing
if(isset($_POST['submit']))
{
	
	$name=$_POST['name'];
    $from=$_POST['email'];
    $message=$_POST['message'];
    $contact=$_POST['contact'];
	mysql_select_db($dbname,$connection);
	//Query processing for storing feedback into db
	$qur="insert into contact_form values('$name','$from','$contact','$message','')";
	$res=mysql_query($qur,$connection);
	if($res)
	{
		echo "<script>";
		echo "alert('Your message is successfully reached.We will reach to you soon...')";
		echo "</script>";
	}
    else
	{
		echo "<script>";
		echo "alert('There is some problem while sending your message.Please try again later..')";
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
	<!--nav bar file is included-->
	<?php include 'header.php';?>
    <title>CotactUs</title>
    
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<style>
hr {
  height: 10px;
  border: 0;
  
  box-shadow: 0 10px 10px -10px black inset;
}
p{
	    text-align: justify;

}

input{
	 display: block;
  
  font-size: 2rem;
  padding: 0.5rem 1rem;
  box-shadow: none;
  border-color: #ccc;
  border-width: 0 0 2px 0;
}
input:focus{
 outline: none;
  border-bottom-color: orange;
}
.fo{
	
	background-color:white;
	height:80%;
	width:80%;
	box-shadow:  0 0 10px  rgba(0,0,0,0.6);
			-moz-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
			-webkit-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
			-o-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
 		
			
}
.map{
	box-shadow:  0 0 10px  rgba(0,0,0,0.6);
			-moz-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
			-webkit-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
			-o-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
 		}
}

	.container{
		width:100%;
	}

</style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu" style="background-color:#FF9800">
	
	<br>
    <center><h2 style="margin-top:0px;margin-bottom:0px;">Your suggesions are always welcome..</h2></center>
    <hr>
	<div class="row">
		<!--col divisions for google map and contact form-->
		<div class="col-sm-6">	
			<center>	
				<br>	
				<div class="fo">
					<br><br>
					<!--contact form-->
					<form method="post" action="contact.php">
						<label>Name</label><br>
						<input type="text" name="name" required />						
						<label>E-Mail</label><br>
						<input type="email" name="email" required />
						 <label>Conatct</label><br>
						<input type="text" pattern="[7-9]{1}[0-9]{9}" name="contact" required />
						<label>Message</label><br>
						<input type="text" name="message" required />
						<br><br>
						<button type="submit" name="submit" class="btn btn-warning" style="width:100px;font-size:20px;">Submit</button>
						<br><br>
					</form>
				</div>
			</center>
		</div>
		<div class="col-sm-6">
			<center>
			<br>
			<div class="map" style="height:400px;width:410px;list-style:none; transition: none;overflow:hidden;"><div id="embed-map-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Walchand+College+of+Engineering,+Sangli,+Maharashtra,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-code" rel="nofollow" href="https://www.interserver-coupons.com" id="get-map-data">https://www.interserver-coupons.com</a><style>#embed-map-canvas .text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=8e2e44df-d374-c292-19ab-4d1a68c4006c&c=google-code&u=1477734431" defer="defer" async="async"></script>
			</center>
		</div>
	</div>
</body>
</html>
