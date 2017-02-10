<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!--PHP code for writing blog-->
<?php
//connection file included
include '../connection.php';

//Error show avoided
error_reporting(0);

//Session start
session_start();

//get username from previous session
$username=$_SESSION['user'];

//database selected
mysql_select_db($dbname,$connection);

//Query processing for selecting all data from profiles by username checking
$qur_get_image="select * from profiles where username='".$username."'";
$result_get_image=mysql_query($qur_get_image,$connection);
$row_get_image=mysql_fetch_array($result_get_image);

//Process to write a blog after form submission checked
if(isset($_POST['submit']))
{
	//blog title recieved
	$title=$_POST['title'];
	
	//blog contents recieved
	$description=$_POST['blogcontent'];	
	$description=base64_encode($description);
	//blog cover page recieved
	$blogcover=basename($_FILES['blogcover']['name']);	
	
	//Current date recieved 
	$date=date("d/m/Y");
	
	if(mysql_select_db($dbname,$connection))
	{
		
		$types = array('image/jpeg', 'image/gif', 'image/png','image/jpg');
		if(in_array($_FILES['blogcover']['type'],$types))
		{
			$url = 'blogcovers/'.basename($_FILES['blogcover']['name']);
			
			$Button_ID=0;
			//Inserting blogs data into blogs table
			$qur="insert into blogs(username,title,description,blogcover,Button_ID,date) values('$username','$title','$description','$url','$Button_ID','$date')";
				
			$name = ''; $type = ''; $size = ''; $error = '';
			//Data inserted successfully
			if(mysql_query($qur,$connection))
			{
				$source_url=$_FILES["blogcover"]["tmp_name"];
				$destination_url=$url;
				$quality=20;
				
					$info = getimagesize($source_url);

					if ($info['mime'] == 'image/jpeg')
					$image = imagecreatefromjpeg($source_url);

					elseif ($info['mime'] == 'image/gif')
					$image = imagecreatefromgif($source_url);

					elseif ($info['mime'] == 'image/png')
					$image = imagecreatefrompng($source_url);

					imagejpeg($image, $destination_url, $quality);
	
					
				
			
					echo "<script>";
					echo "alert('Thank you for writing a blog.')";
					echo "</script>";	
				
			}
			//Failure while inserting data
				else
				{
					echo "<script>";
					echo "alert('There is problem while creating a blog please try again.')";
					echo "</script>";
				}
		
         
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Uploding file should be JPG,GIF or PNG");';
		echo '</script>';
	}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("There is a problem while creating your blog please try again...");';
		echo '</script>';
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

    <title>Write Blog</title>
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
	<link href="https://fonts.googleapis.com/css?family=Nova+Script|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">     
<style>
	.avatar 
	{
		position: relative;
		top: -50px;
		margin-bottom: -50px;
	
	}

	.avatar img
	{
		width: 300px;
		height: 300px;
		max-width: 150px;
		max-height: 150px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		border: 5px solid rgba(255,255,255,0.5);
	}
	
	hr 
	{
		height: 10px;
		border: 0;
		box-shadow: 0 10px 10px -10px black inset;
	}
	
	p
	{
		text-align: justify;
	}

	input
	{
		display: block;
		font-family: 'Dancing Script', cursive;
		font-size: 2rem;
		padding: 0.5rem 1rem;
		box-shadow: none;
		border-color: #ccc;
		border-width: 0 0 2px 0;
	}
	
	textarea
	{
		display: block;
		font-family: 'Dancing Script', cursive;
		width: 90%;
	    min-height: 35px;
	    font-size: 2rem;
	    padding: 0.5rem 1rem;
	    box-shadow: none;
	    border-color: #ccc;
	    border-width: 0 0 2px 0;
	}
	
	textarea:focus
	{
		outline:none;
		border-color:orange;	
	}
	
	input:focus
	{
		outline: none;
	border-bottom-color: orange;
	}

	.fo
	{
		margin-top:5%;
		background-color:white;
		height:80%;
		width:80%;
		box-shadow:  0 0 10px  rgba(0,0,0,0.6);
		-moz-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
		-webkit-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
		-o-box-shadow: 0 0 10px  rgba(0,0,0,0.6);
 	}
	
	.intro
	{
		margin-top:2%;
		font-family: 'Roboto Condensed', sans-serif;
		font-size:30px;
	}
</style>
    <script src="js/prefixfree.min.js"></script>
    </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">

	<center>
	
		<div class="intro">
			<h2>Welcome<?php echo " ".$row_get_image['username']." ";?>.Write your blog here....</h2>	
		</div>
	
		<br><br><br>
	
		<div class="fo">
			<form method="post" action="WriteBlog.php" enctype='multipart/form-data'>
				<!--Div to get profile pic of the Alumni-->
				<div class="avatar">	
					<img alt="" src="<?php echo "../".$row_get_image['path'];?>"/>
				</div>
				<!--getting input for title blog-->
				<label>Title of Blog</label>
				<input type="text" name="title" required />
				
				<br>
				<!--getting input for contnts of the blog-->
				<label>Blog Content</label><br><br><br>
				<textarea  name="blogcontent" rows="4" cols="50" required></textarea>
	
				<br><br>
				<!--Facility to upload cover photo for blog-->
				<label>Upload CoverPhoto</label><br><br>
				<input class="cover" type="file" name="blogcover" style="font-size:20px;" required/>
	
				<br><br>
				<!--submit and logout buttons-->
				<input type="submit" name="submit" class="btn btn-warning" style="width:100px;font-size:20px;" value="Submit"></input>
				<button name="logout"  class="btn btn-danger" style="width:100px;font-size:20px;" onclick="location.href='../login/login.php'">Logout</button> 
				
				<br><br>
	
			</form>
	
			<br><br><br><br>
		
		</div>
		
		<br><br><br><br>
		<br><br><br><br>
	
	</center>
	
</body>
	
</html>