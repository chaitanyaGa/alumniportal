<?php
//avoiding error showing
error_reporting(0);

//Connection file included
include "connection.php";


mysql_select_db($dbname,$connection);
$qur="select * from contact_form";
$res=mysql_query($qur,$connection);



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
    <title>Developer Page</title>
    
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">


<style>
hr {
  height: 10px;
  border: 0;
  
  box-shadow: 0 10px 10px -10px black inset;
}
.feedback{
	margin-left:30px;
}
</style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu" style="background-color:#FF9800">
	
	<br>
	<center><h2 style="margin-top:0px;margin-bottom:0px;font-family: 'Bangers', cursive;">Welcome Spider</h2></center>
    <center><h2 style="margin-top:0px;margin-bottom:0px;">User's Feedback/Suggestions</h2></center>
    <hr>
	<?php
	while($row=mysql_fetch_array($res))
	{
	?>
	<div class="feedback">
		<label style="font-family: 'Boogaloo', cursive">Name</label>
		<h4 style="font-family: 'Josefin Sans', sans-serif;"><?php echo $row['name'];?></h4>
		<label style="font-family: 'Boogaloo', cursive">From</label>
		<h4 style="font-family: 'Josefin Sans', sans-serif;"><?php echo $row['email'];?></h4>
		<label style="font-family: 'Boogaloo', cursive">Contact</label>
		<h4 style="font-family: 'Josefin Sans', sans-serif;"><?php echo $row['contact'];?></h4>
		<label style="font-family: 'Boogaloo', cursive">Feedback</label>
		<h4 style="font-family: 'Josefin Sans', sans-serif;"><?php echo $row['message'];?></h4>
	</div>
	<hr>
	<?php
	}
	?>
		
</body>
</html>
	