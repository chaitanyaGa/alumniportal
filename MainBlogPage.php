<?php
//connection file included
include '../AlumniPortal/connection.php';

mysql_select_db($dbname,$connection);


$qur1="select * from newblogtable1";
$qur2="select * from newblogtable1 order by likes DESC limit 5";
$res2=mysql_query($qur2,$connection);


if(isset($_POST['category']))
{
	$value=$_POST['category'];
	if(strcmp($value,"recent")==0)
	{
		$qur1="select * from newblogtable1 order by id DESC ";
			$res1=mysql_query($qur1,$connection);

	}
	else
	{
	 $qur1="select * from newblogtable1 where category='".$value."'";
	 	$res1=mysql_query($qur1,$connection);

	}
	
}

if(isset($_POST['searchButton']))
{
	$value=$_POST['search'];
	$qur1="select * from newblogtable1 where title='".$value."' or category='".$value."' or username='".$value."'";
	
}

$res1=mysql_query($qur1,$connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blogs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<?php include 'header.php';?>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  
 
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    h5{
		display:inline;
		margin-right:15px;
	}
	.list button{
		width:100px;
		margin:5px;
		align:center;
	}
    
	
	
	
	
	
.center-block {
    float: none;
    margin-left: auto;
    margin-right: auto;
}

.input-group .icon-addon .form-control {
    border-radius: 0;
}

.icon-addon {
    position: relative;

    color: #555;
    display: block;
}

.icon-addon:after,
.icon-addon:before {
    display: table;
    content: " ";
}

.icon-addon:after {
    clear: both;
}

.icon-addon.addon-md .glyphicon,
.icon-addon .glyphicon, 
.icon-addon.addon-md .fa,
.icon-addon .fa {
    position: absolute;
    z-index: 2;
    left: 10px;
    font-size: 14px;
    width: 20px;
    margin-left: -2.5px;
    text-align: center;
    padding: 10px 0;
    top: 1px
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 46px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 30px;
    padding: 5px 10px 5px 28px;
    font-size: 12px;
    line-height: 1.5;
}

.icon-addon.addon-lg .fa,
.icon-addon.addon-lg .glyphicon {
    font-size: 18px;
    margin-left: 0;
    left: 11px;
    top: 4px;
}

.icon-addon.addon-md .form-control,
.icon-addon .form-control {
    padding-left: 30px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 12px;
    left: 5px;
    top: -1px
}

.icon-addon .form-control:focus + .glyphicon,
.icon-addon:hover .glyphicon,
.icon-addon .form-control:focus + .fa,
.icon-addon:hover .fa {
    color: orange;
} 






DIV.texthover {
    width:100%;
    display:block;
    position:relative;
    text-align: center!important;}

DIV.texthover .overlay {
    position:absolute;
    top:45%;
    width:0;
    width:100%;
    height:50%;
    padding:10px;
    background-color:rgba(0, 0, 0, 0.3);
    display:none;
}
DIV.texthover:hover .overlay {
    display:block;
}
  </style>
</head>
<body style="background-color:#616161">

<div class="container-fluid" >
<center>
<form action="MainBlogPage.php" method="post">
 <div class="list" style="margin-top:3%">
  <button type="submit" class="btn btn-warning" name="category" value="recent">Recent</button>
 <button type="submit" class="btn btn-warning" name="category" value="technical">Technical</button>
<button type="submit" class="btn btn-warning" name="category" value="educational">Educational</button>
<button type="submit" class="btn btn-warning" name="category" value="social">Social</button>
<button type="submit" class="btn btn-warning" name="category" value="other">Other</button>
 </div>
</form>
 </center>
 
 
    <div class="row" style="background-color:#616161;width: 104%;height: 700px;overflow: scroll;">
	<div class="col-sm-9">
	<br>
	<form action="MainBlogPage.php" method="post">
	 <div class="form-group">
                <div class="icon-addon addon-lg">
                    <input type="text" placeholder="Search by Title , Author , Category" class="form-control" id="email" style="color:orange" name="search">
					<button style="appearance: none;-webkit-appearance: none;-moz-appearance: none;outline: none;border: 0;background: transparent;" type="submit" name="searchButton"> 
          <span class="glyphicon glyphicon-search"></span>
        </button>
                </div>
  </div>
  </form>
	<?php
$cnt=mysql_num_rows($res1);
		if($cnt>0)
		{
		while($row1=mysql_fetch_array($res1))
			{
	?>	
	<!--<div class="row">-->
	
	<div class="row" style="background-color:#FFF8E1">
      <div class="col-sm-3">
	  <center>
		<img src="<?php echo "../AlumniPortal/blog/".$row1['cover'];?>" width="100%" height="200px" style="margin-right:30%;margin-top:10%"></img>
	  </center>
	  </div>
	  <div class="col-sm-6">
      <h2><?php echo $row1['title'];?></h2>
      <h5><span class="glyphicon glyphicon-time"></span>  <?php echo $row1['username']?>, <?php echo $row1['date'];?></h5>
	   <h5><span class="glyphicon glyphicon-thumbs-up"></span>  <?php echo $row1['likes']?></h5>    

	   <h4><span class="label label-success"><?php echo $row1['category'];?></span></h4><br>
	<!--getting blog contents fron the db-->
		<?php $str=$row1['content'];
		      $str=base64_decode($str);
		?>
		    <!--php code to show only few description of a blog-->
			<?php $small_description=substr($str,0,100);?>
			<p><?php echo $small_description.".............";?></p>
			<form action="../AlumniPortal/blog/ReadMore.php" method="post">
			<button type="submit"  class="btn btn-link" style="color:red">Continue Reading</button>
			<input type="hidden" value="<?php echo $row1['username'];?>" name="user">
			<input type="hidden" value="<?php echo $row1['cover'];?>" name="cover">
			
			</form>
			
		    <form action="../AlumniPortal/blog/blog1.php" method="post">
			<input type="hidden" value="<?php echo $row1['username'];?>" name="username">

			<button type="submit" class="btn btn-link">See all posts of <?php echo $row1['username'];?></button>
			</form>

      </div>


	  
	</div>
	<br>
					  

	
		<?php
		}}
		else
		{
			?>
			<h2 style="color:orange">No result found</h2>
	<?php
		}
		
			?>
			
	  </div>
	  <div class="col-sm-3" style="background-color:#616161;height:100%">
<center><div style="background-color:#BBDEFB;height:35%"><h3 style="font-size:32px;font-family: 'PT Serif', serif;">Popular Posts</h3></div></center>
<div style="margin:8px"></div>
<?php 

while($row2=mysql_fetch_array($res2))
{/***********************************/
	?>
	
	<form action="../AlumniPortal/blog/ReadMore.php" method="post">
			
			<div class="texthover"><br />
			<img src="<?php echo "../AlumniPortal/blog/".$row2['cover']?>" width="100%" height="130px"/>
			<div class="overlay"><br />
			<span><button style="color:white;font-size:20px;font-family: 'Yanone Kaffeesatz', sans-serif;" type="submit" class="btn btn-link"><?php echo $row2['title']." by ".$row2['username'];?></button></span></div>
</div>
			<input type="hidden" value="<?php echo $row2['username'];?>" name="user">
			<input type="hidden" value="<?php echo $row2['cover'];?>" name="cover">
			
	</form>
	
	<br>
<?php
}
?>


</div>
</div>
	  
      </div>
	  
    </div>
  




</body>
</html>
