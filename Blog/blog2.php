<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>
<!--php code for showing all blogs of a user-->
<?php
//connection file included
include '../connection.php';

mysql_select_db($dbname,$connection);
//$myVar=$_POST['var'];
//Getting username from the porevious page


$username=$_POST['username'];

//Session start
session_start();
//Storing username into session variable
$_SESSION['user']=$username;

$qur1="select * from Blogs where BINARY username='".$username."'";
$res1=mysql_query($qur1,$connection);
$count_blogs=mysql_num_rows($res1);



?>
<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- navbar file included-->
	<?php include 'header.php';?>
   
   <title>Blog Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
	
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	
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
	  border-radius: 4px;
	  background-color: #f4511e;
	  border: none;
	  color: #FFFFFF;
	  text-align: center;
	  font-size: 25px;
	  padding: 15px;
	  width: 120px;
	  transition: all 0.5s;
	  cursor: pointer;
	  margin: 2px;
	  margin-top:15px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right:-40px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 40px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.ex {
    height: 200px;
    width: 400px;
	text-align:center;
	position:relative;
}
.button span {
     display: block;
    width: 100px;
}

.container h4{
	font-family: 'Varela Round', sans-serif;

	text-align: justify;
    
}
.btn-primary {
    box-shadow:0 0 0 1px #428bca inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #357ebd, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#428bca;
}
.buttons{
	display:inline;
}
.btn3d {
    transition:all .08s linear;
    position:relative;
    outline:medium none;
    -moz-outline-style:none;
    border:0px;
    margin-right:10px;
    margin-top:15px;
}
.btn3d:focus {
    outline:medium none;
    -moz-outline-style:none;
}
.btn3d:active {
    top:9px;
}
.w3-btn {width:150px;}

</style>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
	<center>
		<header> 
			<h1><b>MY BLOG</b></h1>
			<p style="background-color:orange;font-size:20px">Welcome to the blog of <?php echo $username;?></p>
		</header>
	</center>

	
	<?php
	
	if($count_blogs>0)
	{?>

		<div class="row">
<?php
		while($row1=mysql_fetch_array($res1))
			{
				
	?>	
	<div class="col-sm-6">
	<div class="card">
        <!--getting cover page from the db-->
		<img src="<?php echo $row1['blogcover'];?>" style="width:100%;height:350px">
    
		<div class="heading">
		  <!--getting title and date of the blog from the db-->
		  <h3><b><?php echo $row1['title'];?></b></h3>
		  <h5><?php echo $row1['date'];?></h5>
		</div>

		
		<!--getting blog contents fron the db-->
		<?php $str=$row1['description'];?>
		    <!--php code to show only few description of a blog-->
			<?php $small_description=substr($str,0,200);?>

		  <h4><?php echo $small_description.".............";?></h4>
		  <form action="ReadMore.php" method="post">
			<div class="row">
			   <input type="hidden" name="blogtitle" value=<?php echo $row1['title'];?>/> 
			   <input type="hidden" id="var"  name="cover" value="<?php echo $row1['blogcover'] ?>"	/>
				<?php $_SESSION['cover']=$row1['blogcover'];
				$cover=$_SESSION['cover'];
				?>
				  <button  class="button" style="margin-left:5px;" type="submit" ><span>MORE</span></button>
				  <button  style="width:80px;margin-bottom:20px;margin-right:5px;float:right" type="button" name="like" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-thumbs-up"></span><span style="font-size:30px">&nbsp&nbsp<?php echo $row1['likes'];?></span></button>
   				
			</div>

		  </form>
		
	</div>
	</div>
	


  
<?php
}
?>

</div>
<?php
}
else
{
?>
<div class="no_blogs_message">
<h1><?php echo $username;?> has not write any blog yet.....</h1>
</div>
<?php
}
?>
  
  <hr>

  </body>
  </html>

        