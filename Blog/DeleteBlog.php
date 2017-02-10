<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!--PHP code for Deleting blog-->
<?php
//Connection file included
include '../connection.php';

//starting session
session_start();

mysql_select_db($dbname,$connection);

//getting username from session
$username=$_SESSION['user'];
$_SESSION['user']=$username;
$qur1="select * from newblogtable1 where BINARY username='".$username."'";
$res1=mysql_query($qur1,$connection);
$count_blogs=mysql_num_rows($res1);
?>
<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- nav bar file included-->
	<?php include 'header.php';?>

    <title>Delete Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
	
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    	
	<!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/modernizr.custom.js"></script>
	
<style type="text/css">
	body{
		background-color:#F5F5F5;
	}
	.card{
		background-color:white;
		margin:20px;
		-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	}
	.heading h3{
		font-family: 'Roboto Condensed', sans-serif;
		margin-left:10px;
	}
	.heading h5{
		opacity:0.5;
		color:blue;
		font-size:120%;
		margin-left:10px;
	}
	.button {
    background-color: #4CAF50; /* Green */
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

	.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
	width:250x;
	height:50px;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
.ex {
    height: 200px;
    width: 400px;
	text-align:center;
	position:relative;
}
span {
     display: block;
    width: 150px;
}
</style>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
	<center>
		<header> 
			<h1><b>MY BLOG</b></h1>
			<p>Welcome <?php echo $username;?>.You can delete your blog here...</p>
		</header>
	</center>
<!--php code to delete blog-->
<?php

require ('../connection.php');
error_reporting(0);
session_start();

	$username=$_SESSION['user'];
	echo "<div class='col-sm-12 img-hover' style='background-color:orange;font-family: 'san-serif', cursive;color:#181818'>
	<center><h1>Select Blog To Delete</h1></center>
	</div>";

	echo "<br/><br/><br/><br/><br/>";
	echo "<center>";
		echo "<form action='del_blog.php' method='post' enctype='multipart/form-data'>";
		mysql_select_db($dbname,$connection);
		$qur1="select * from newblogtable1 where username='".$username."'";
		$res1=mysql_query($qur1);
		$cnt=1;
		//echo "<center>";
		echo "<select name='shubham' onchange='myFunction1(this)'>";
		echo "<option selected='true' disabled='disabled'>List of Blogs</option>";   

		while($row1=mysql_fetch_array($res1))
	    { 
	       
		   echo "<option value=".$cnt.">".$row1['title']."</option>";
		   $cnt++;
	    }
	    echo "</select>";
		
		echo "<input id='text1' type = 'hidden' name = 'text1' value = '' />";
		echo "<script type='text/javascript'>
              function myFunction1(ddl) {
                 document.getElementById('text1').value = ddl.options[ddl.selectedIndex].text;
                  }
                 </script>";
		echo "&nbsp&nbsp&nbsp"."<input type='submit' name='delete1' value='delete' />";
		echo "</form>";
		echo "</center>";
		echo "<br/><br/><br/><br/><br/>";
	
		
?>
<center>
<button type="button" class="btn btn-success" style="width:100px;font-size:20px;" onclick="location.href='WriteBlog.php'">Create</button>

<button name="logout"  class="btn btn-danger" style="width:100px;font-size:20px;" onclick="location.href='../index.php'">Logout</button> 
</center>
</body>
</html>

        