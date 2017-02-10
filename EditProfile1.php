<?php
//Connection file is included
include 'connection.php';

//Session start
session_start();

@mysql_select_db($dbname,$connection);

//Getting username from the previous page session
$username=$_SESSION['user'];
$_SESSION['user']=$username;
$qur="select * from registration where BINARY username='".$username."'";
$qur1="select * from profiles where username='".$username."'";
$res1=mysql_query($qur1,$connection);
$row1=mysql_fetch_array($res1);

$res=mysql_query($qur,$connection);
$row=mysql_fetch_array($res);

$check=0;

//If user hits the update button
if(isset($_POST['submit']))
{
	//Getting data from user for update
	$Name=$_POST['Name'];
	$Branch=$_POST['Branch'];
	$PassingYear=$_POST['PassingYear'];
	$EduDetails=$_POST['EduDetails'];
	$EmailID=$_POST['EmailID'];
	$ContactNumber=$_POST['ContactNumber'];
	$PresentAddress=$_POST['PresentAddress'];
	$PermanantAddress=$_POST['PermanantAddress'];
	$DOB=$_POST['DOB'];
	$NameOfOrganization=$_POST['NameOfOrganization'];
	$PostInCompany=$_POST['PostInCompany'];
	$CompanyURL=$_POST['CompanyURL'];
	$CompanyAddress=$_POST['CompanyAddress'];
	$Hobbies=$_POST['Hobbies'];
	$AreaOfInterest=$_POST['AreaOfInterest'];
	$Thoughts=$_POST['Thoughts'];
	$State=$_POST['state'];
	$City=$_POST['city'];
	$SoftwareKnowledge=$_POST['SoftwareKnowledge'];
	$languages=$_POST['Languages'];
	$computer_languages=$_POST['computer_languages'];
	$Other=$_POST['Other'];
	$Companies=$_POST['companies'];
	$Experience=$_POST['experience'];
	$name=basename($_FILES['update_profile_pic']['name']);
	
	if(strcmp($name,"")!=0)
	{
		$qur1="select profile_name from profiles where BINARY username='".$username."'";
		$res1=mysql_query($qur1,$connection);
		$row1=mysql_fetch_array($res1);
		if($row1>0)
		{
			$file_del="php_image/upload/".$row1['profile_name'];
			unlink($file_del);
			$check=1;
		}
		$name=basename($_FILES['update_profile_pic']['name']);
		$t_name=$_FILES['update_profile_pic']['tmp_name'];
		$dir='php_image/upload';
		$types = array('image/jpeg', 'image/gif', 'image/png','image/jpg');	
		if(in_array($_FILES['update_profile_pic']['type'],$types))
		{
			//Profile pic is updating
			
				mysql_select_db($dbname,$connection);
				//$path="php_image/upload/".$name;
				
				$types = array('image/jpeg', 'image/gif', 'image/png','image/jpg');
		
			$url = 'php_image/upload/'.$name;
			if($check==1)
				{
					$qur_profile="update profiles set profile_name='".$name."',path='".$url."' where BINARY username='".$username."'";	

				}
				else
				{
					$qur_profile="insert into profiles values('$username','$name','$url')";
				}
				//$res_profile=mysql_query($qur_profile,$connection);
				
			$name = ''; $type = ''; $size = ''; $error = '';
			//Data inserted successfully
			if(mysql_query($qur_profile,$connection))
			{
				$source_url=$_FILES["update_profile_pic"]["tmp_name"];
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
				echo '<script language="javascript">';
				echo 'alert("Your profile is successfully upldated");';
				echo '</script>';	
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("There is a problem while uploading your file please upload again...");';
				echo '</script>';					
			}
				
				
				
			
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("only images are allowed to upload.");';
			echo '</script>';
		}
	}	
	if(@mysql_select_db($dbname,$connection))
	{
		$qur_update="update registration set name='".$Name."',branch='".$Branch."',passingyear='".$PassingYear."',edudetails='".$EduDetails."',emailid='".$EmailID."',contactnumber='".$ContactNumber."',presentaddress='".$PresentAddress."',permanantaddress='".$PermanantAddress."',dob='".$DOB."',nameoforganization='".$NameOfOrganization."',postincompany='".$PostInCompany."',companyurl='".$CompanyURL."',companyaddress='".$CompanyAddress."',hobbies='".$Hobbies."',areaofinterest='".$AreaOfInterest."',thoughts='".$Thoughts."',city='".$City."',state='".$State."',softwareknowledge='".$SoftwareKnowledge."',languages='".$Languages."',other='".$Other."' where BINARY username='".$username."'";
		$res_update=mysql_query($qur_update,$connection);	
		if($res_update)
		{
			echo "<script>";
			echo "alert('Your profile is successfully updated.')";
			echo "</script>";
		}
	}
}	
if($res)
{

		$Name=$row['name'];
		$Branch=$row['branch'];
		$PassingYear=$row['passingyear'];
		$EduDetails=$row['edudetails'];
		$EmailID=$row['emailid'];
		$ContactNumber=$row['contactnumber'];
		$PresentAddress=$row['presentaddress'];
		$PermanantAddress=$row['permanantaddress'];
		$DOB=$row['dob'];
		$NameOfOrganization=$row['nameoforganization'];
		$PostInCompany=$row['postincompany'];
		$CompanyURL=$row['companyurl'];
		$CompanyAddress=$row['companyaddress'];
		$Hobbies=$row['hobbies'];
		$AreaOfInterest=$row['areaofinterest'];
		$Thoughts=$row['thoughts'];
		$State=$row['state'];
		$City=$row['city'];
		$SoftwareKnowledge=$row['softwareknowledge'];
		$languages=$row['languages'];
		$computer_languages=$row['computer_languages'];
		$Other=$row['other'];
		$Companies=$row['companies'];
	    $Experience=$row['experience'];
		$Honors=$row['honors'];
		$Courses=$row['courses'];
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
<body>
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
	background-color:#FFF3E0;
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
.top_user_info{

min-height:150px;
 }

img.portrait {
	width: 300px;
		height: 300px;
		max-width: 150px;
		max-height: 150px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		border-radius: 50%;
		border: 5px solid orange;
	
}
.update input,
.update button{
	display:inline;
}
 body{
 	background-color:white;
 }
.buttons button{
	display:inline;
}
 </style>  
 }

</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu" >  

<br><br>
	<div class="buttons">
	<center>
		<button  type="submit" name="logout" onclick="window.location.href='index.php'"><img src="out.png" width="40" height="40"/></button>
		<button  type="submit" name="blog" onclick="window.location.href='OptionWindow.php'"><img src="blog/blog.png" width="40" height="40"/></button>
		<button  type="submit" name="blog" onclick="window.location.href='change_pass.php'""><img src="pass3.png" width="40" height="40"/></button>

		</center>
		</div>
<section class="container">
<center>
	<br><br>
	<div class="top_user_info" style="display: flex; justify-content: center;">
	
	
	<img class="portrait" src="<?php echo $row1['path'];?>" alt="Alumni" style="width:140px;height:200px;"/>
	
	</div>
	<form method="post" action="Profile_Pic_Update.php" enctype="multipart/form-data">
	<div class="update">
		<label>Update profile</label><br>
		<input type="file" name="update_profile_pic"/> 
		<button  type="submit" name="submit" class="btn" style="width:100px;height:35px;font-size:15px;background-color:orange">Update</button>
	</div>
	</form>
	</center>
	
	</center>		
			<!--update form start-->
			    <div class="box effect8">
			    <div id="head">
				<h3><u>Personal Details</u><a href="Personal_Details_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3>
				</div>
				<label>Name : </label><h5><?php echo $Name ?></h5>
				<hr>	
				<label>Date of birth : </label><h5><?php echo $DOB ?></h5>
				<hr>
				<label>Languages Known : </label><h5><?php echo $languages ?></h5>
					
				</div>

				<div class="box effect8">
			    <div id="head">
			    <h3><u>Contact Details</u><a href="Contact_Details_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
			    </div>
			    <label>Email ID : </label><h5><?php echo $EmailID ?></h5>
				<hr>
				<label>Contact Number : </label><h5><?php echo $ContactNumber ?></h5>
				
			    </div>

			    <div class="box effect8">
			    <div id="head">
			    <h3><u>Address Details</u><a href="Address_Details_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
			    </div>
			 	<label>Present Address : </label><h5><?php echo $PresentAddress ?></h5>
				<hr>
				<label>Permanant Address : </label><h5><?php echo $PermanantAddress ?></h5>
				
			    </div>

			    <div class="box effect8">
			    <div id="head">
			    <h3><u>Educational Details</u><a href="Educational_Details_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
			    </div>
			    <label>Institute Name : </label><h5>Walchand college of engineering sangli.</h5>
			    <hr>
			 	<label>Passing Year : </label><h5><?php echo $PassingYear ?></h5>
				<hr>
				<label>Branch : </label><h5><?php echo $Branch ?></h5>
				<hr>
				<label>Higher Education Details : </label><h5><?php echo $EduDetails ?></h5>
			    </div>


				<div class="box effect8">
				<div id="head">
				<h3><u>Present Occupation Details</u><a href="Present_Occupation_Details_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>Organization Name : </label><h5><?php echo $NameOfOrganization ?></h5>
				<hr>
				<label>Working as a : </label><h5><?php echo $PostInCompany ?></h5>
				<hr>
				<label>Organization Address : </label><h5><?php echo $CompanyAddress ?></h5>
				<hr>
				<label>Organization Website URL : </label><h5><a href="<?php echo $CompanyURL ?>"><?php echo $CompanyURL ?></a></h5>
				
				</div>

				<div class="box effect8">
				<div id="head">
				<h3><u>Present Location</u><a href="Present_Location_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>State : </label><h5><?php echo $State ?></h5>
				<hr>
				<label>City : </label><h5><?php echo $City ?></h5>
				</div> 
			
				<div class="box effect8">
				<div id="head">
				<h3><u>Skills</u><a href="Skills_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>Software Knowledge : </label><h5><?php echo $SoftwareKnowledge ?></h5>
				<hr>
				<label>Computer Languages : </label><h5><?php echo $computer_languages?></h5>
				<hr>
				<label>Other : </label><h5><?php echo $Other ?></h5>
				
				</div>
				
				<div class="box effect8">
				<div id="head">
				<h3><u>Past Status</u><a href="Past_Status_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>Companies : </label><h5><?php echo $Companies ?></h5>
				<hr>
				<label>Experience : </label><h5><?php echo $Experience?></h5>
				<hr>
				
				</div>
				
				<div class="box effect8">
				<div id="head">
				<h3><u>Honors and courses</u><a href="Honors_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>Honors/Awards : </label><h5><?php echo $Honors ?></h5>
				<hr>
				<label>Courses : </label><h5><?php echo $Courses?></h5>
				<hr>
				
				</div>

				<div class="box effect8">
				<div id="head">
				<h3><u>Other Information</u><a href="Other_Information_Update.php"><span class="glyphicon glyphicon-pencil"></span>&nbspEdit</a></h3><br>
				</div>
				<label>Hobbies : </label><h5><?php echo $Hobbies ?></h5>
				<hr>
				<label>Area Of Interest : </label><h5><?php echo $AreaOfInterest ?></h5>
				<hr>
				<label>Your Thoughts : </label><h5><?php echo $Thoughts ?></h5>	
				</div>

						
			
			<!--update form end-->
		</section>
		
</div>
<br><br>

</body>
</html>
  



