
<?php
include 'connection.php';
session_start();

@mysql_select_db($dbname,$connection);
$username=$_SESSION['user'];
$_SESSION['user']=$username;
$qur="select * from registration where BINARY username='".$username."'";
$res=mysql_query($qur,$connection);
$row=mysql_fetch_array($res);

if(isset($_POST['submit']))
{
	$passout=$_POST['passout'];
	$branch=$_POST['branch'];
	$high=$_POST['high'];

	//echo "########".$email;
	//echo "%%%%%%%%%%%".$contact;
	
	mysql_select_db($dbname,$connection);
	if(strcmp($high,'')!=0)
		$update_qur="update registration SET passingyear='$passout',branch='$branch' where username='$username'";
	else
		$update_qur="update registration SET passingyear='$passout',branch='$branch',edudetails='$high' where username='$username'";
	$res_update=mysql_query($update_qur,$connection);
	if($res_update)
	{
		header('Location:EditProfile1.php');
		

	}
	 
}
if(isset($_POST['cancel']))
{
header('Location:EditProfile1.php');

}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--navbar file is included-->
	<?php include 'header.php';?>
    <title>Update Profile</title>   
   <!--<link rel="stylesheet" href="css/RegForm.css">-->
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<script type="text/javascript">
		window.history.forward();
		function noBack() { window.history.forward(); }
	</script>

 <style>
.effect8
{
  	position:relative;       
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
.effect8:before, .effect8:after
{
	content:"";
    position:absolute; 
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:10px;
    bottom:10px;
    left:0;
    right:0;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
} 
.effect8:after
{
	right:10px; 
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg); 
       -moz-transform:skew(8deg) rotate(3deg);     
        -ms-transform:skew(8deg) rotate(3deg);     
         -o-transform:skew(8deg) rotate(3deg); 
            transform:skew(8deg) rotate(3deg);
}  
.container{
	
border-radius: 10px;
   -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;

               
 


}

.box h3{
	text-align:center;
	position:top;
	top:80px;
	

}
.box #head{
	background-color:orange;
	height:40px;
}
.box {
	width:85%;
	min-height:50%;
	background:#FFF;
	margin:40px auto;
	padding-left:2%;
	padding-right:2%;
	background-color:#FFFDE7;
}

.box label,
.box h5{
 display: inline;
    vertical-align: top;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 28px
}
#head{
	-webkit-box-shadow: 0 10px 6px -6px #777;
	   -moz-box-shadow: 0 10px 6px -6px #777;
	        box-shadow: 0 10px 6px -6px #777;
	        border-bottom-left-radius: 2em;
    border-bottom-right-radius: 2em;
}

.box #head a{
	float:right;
	padding-right:5%;
	font-size:20px;
	padding-top:0.7%;

}
.box #head h3{
	text-align:center;
}

 body{
 	background-color:white;
 }
 </style>  
 

</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu" >  

<section class="container">
			<!--update form start-->
			    <form method="post" action="Educational_Details_Update.php">
			    <div class="box effect8">
				    <div id="head">
					<h3><u>Personal Details</u></h3>
					</div>
				 	<label>Passing Year : </label><input type="text" name="passout" value="<?php echo $row['passingyear']?>"/>
					<hr>
					<label>Branch : </label><input type="text" name="branch" value="<?php echo $row['branch'] ?>"/>
					<hr>
					<label>Higher Education Details : </label><input type="text" name="high" value="<?php echo $row['edudetails'] ?>"/>
					<br><br>
					<button  type="submit" name="submit" class="btn btn-warning" style="width:150px;height:40px;font-size:20px;float:right">Submit</button>
					<button  type="submit" name="cancel" class="btn btn-info" style="width:150px;height:40px;font-size:20px;float:left">Cancel</button>
					<br><br>
				</div>
				</form>
</section>
</body>
</html>
