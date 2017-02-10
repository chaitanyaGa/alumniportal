<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!--PHP code for Reading whole blog-->

<?php
//Connection file included
include '../connection.php';

//avoiding error show
error_reporting(0);

//Session start

//Getting username from previous session
$username=$_POST['user'];

mysql_select_db($dbname,$connection);

//Getting coverpage of blog from previous page
$cover=$_POST['cover'];

//Process after clicking add_comment button 
if(isset($_POST['add_comment']))
{
	echo "ggggggg";
	$name=$_POST['name'];
	$date=date("d/m/Y");
	date_default_timezone_set('Asia/Kolkata');
	$time=date("h:i:sa");
	$comment=$_POST['comment'];
	if(strcmp($comment,"")!=0)
	{
		//Query processing for adding comments to the DB
		$add_comment="insert into blog_comments values('$username','$cover','$name','$date','$time','$comment')";
		mysql_query($add_comment,$connection);
	}
	echo "<script>
					$('#comment').on('click', function(e) {
    e.preventDefault();
    e.stopPropagation(); // only neccessary if something above is listening to the (default-)event too  
	alert('shubham');
});
</script>";
}

//Process after clicking like button
if(isset($_POST['like']))
{
	$old_likes="select * from newblogtable1 where cover='".$cover."'";
	$res_old_likes=mysql_query($old_likes,$connection);
	$row_old_likes=mysql_fetch_array($res_old_likes);
	$old_cnt=$row_old_likes['likes'];
	$old_cnt++;
	//Query processing for updating likes to the DB	
	$new_likes="update newblogtable1 SET likes='".$old_cnt."' where cover='".$cover."'";
	$res_new_likes=mysql_query($new_likes,$connection);
}
$_SESSION['cover']=$cover;
$qur="select * from newblogtable1 where cover='".$cover."'";
$res=mysql_query($qur,$connection);

//Query processing for reading from DB
$read_comments="select * from blog_comments where blogcover='".$cover."'";
$res_read_comments=mysql_query($read_comments,$connection);
$row=mysql_fetch_array($res);
$count=mysql_num_rows($res);

?>
<!------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- nav bar file included-->
    <?php include 'header.php';?>

	<title>Read Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    
	
	<!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<script type="text/javascript" src="jquery.min.js"></script>

    <script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/modernizr.custom.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

	<style type="text/css">
	
	.w3-btn 
	{
		width:150px;
	}

	body
	{
		background-color:#616161;
	}
	
	.card
	{
		background-color:white;
		margin:20px;
		-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	}
	
	.heading h3
	{
		font-family: 'Roboto Condensed', sans-serif;
		margin-left:10px;
	}
	
	.heading h5
	{
		opacity:0.5;
		color:blue;
		font-size:120%;
		margin-left:10px;
	}
	
	.button 
	{
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

	.button5 
	{
		background-color: white;
		color: black;
		border: 2px solid #555555;
		width:250x;
		height:50px;
	}

	.button5:hover 
	{
		background-color: #555555;
		color: white;
	}
	
	.ex 
	{
		height: 200px;
		width: 400px;
		text-align:center;
		position:relative;
	}
	
	.container h3 
	{
		text-align: justify;
		text-justify: inter-word;
		font-family: 'Mirza', cursive;
		font-size:25px;

	}
	
	.card
	{
		background-color:white;
		margin:20px;
		-webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		-moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
	}
	
	.like_button
	{
		height:50px;
		
	}
	
	.like_button img
	{
		float:right;
		transition: all .2s ease-in-out; 
	}
	
	.like_button img:hover
	{
		transform: scale(1.1); 
	}
	
button.accordion 
{
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover 
{
    background-color: #ddd;
}

button.accordion:after 
{
    content: '\02795';
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after
{
    content: "\2796";
}

div.panel 
{
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.6s ease-in-out;
    opacity: 0;
}

div.panel.show 
{
    opacity: 1;
    max-height:5000px;  
}

div.hidden
{
	display: none;
}

div.visible
{
	display: block;
}

.comment_box
{
	border-style:solid;
	border-width:1px;
	float:left;
	background-color:#d4d4cb;
	width:280px;
	padding-left:20px;
	padding-top:25px;
	padding-bottom:10px;
}
.btn3d 
{
    transition:all .08s linear;
    position:relative;
    outline:medium none;
    -moz-outline-style:none;
    border:0px;
    margin-right:10px;
    margin-top:15px;
}
.btn3d:focus 
{
    outline:medium none;
    -moz-outline-style:none;
	
}
.btn3d:visited{
    background-color: green;
}

}
.btn3d:active {
    top:9px;

}
.btn-warning {
    box-shadow:0 0 0 1px #f0ad4e inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #eea236, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#f0ad4e;

}
 .btn-success {
    box-shadow:0 0 0 1px #5cb85c inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4cae4c, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#5cb85c;
}
.btn-primary {
    box-shadow:0 0 0 1px #428bca inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #357ebd, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
    background-color:#428bca;
	
}

.buttons{
	display:inline;
}
.btn-primary:focus {
    color: white;
    background:green
}
</style>
	
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
	<center>
		<header> 
			<h1 style="background-color:orange"><b><?php echo $row['title'];?></b></h1>
		</header>
	</center>

<!------------------------------------------------------->

<div class="container-fluid">
	<div class="card">
		<img src="<?php echo $cover;?>" style="width:100%;height:350px">
		<div class="container">
			<?php $str=base64_decode($row['content']);?>
			<h3><?php echo $str;?></h3>
	
			<!--code for read comment-->
			<button class="accordion">Read Comments</button>
			<div class="panel">

			<?php
			    //loop for printing comments,date and time from DB
				while($row_read_comments=mysql_fetch_array($res_read_comments))
				{
	
			?>
				<h4><?php echo $row_read_comments['commentor'];?></h4>
				<h6 style="color:blue"><?php echo "   ".$row_read_comments['date']."   "."(".$row_read_comments['time'].")";?></h6>
				<h5><?php echo $row_read_comments['comment'];?></h5>
				
				<br>
				
			<?php
				}
				//loop end
			?>
			</div>
			<!--JS code for showing comments div-->
			<script>
				var acc = document.getElementsByClassName("accordion");
				var i;
				for (i = 0; i < acc.length; i++) {
					acc[i].onclick = function(){
						this.classList.toggle("active");
						this.nextElementSibling.classList.toggle("show");
				  }
				}
			</script>
			
			<!--JS code for showing comment box-->
			<script type="text/javascript">
				function showCommentBox(){
				var div=document.getElementById('comment');
				div.className='visible';
				}
			</script>
			
			<form action="ReadMore.php" method="post">
				<div class="buttons">
					<input type="button" class="btn btn-warning btn-lg btn3d" value="Comment" onclick="showCommentBox()">
					<button  type="submit" name="like"  class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-thumbs-up"></span></button>
					
					<script>
						$( "button.btn-primary" ).click(function() {
						  $(this).addClass( "selected" );
						});
					</script>
				</div>
				<!--Hidden comment div-->
				<div class="hidden" id="comment">
					
					<br>

					<p>Name<br>
					<input type="text" name="name"/>
				
					<br>
					
					<p>Comment<br>
					<textarea name="comment" rows="3" cols="30"></textarea><br><br>

					<input type="hidden" name="cover" value="<?php echo $row['cover'];?>"/> 
					<input type="hidden" name="user" value="<?php echo $username; ?>"	/>
					<input type="submit" name="add_comment" id="cooment" class="btn btn-success btn-lg btn3d" onclick="return getData()" value="Add comment"></p>
					
				</div>
			</form>
		
			<br><br>
		</div>
    </div>
	

 </div>

</body>
</html>

        