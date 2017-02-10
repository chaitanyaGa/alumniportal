<?php
//Connection file is included
include 'connection.php';

//Session start
session_start();

@mysql_select_db($dbname,$connection);

//Getting username from the previous page session
$username=$_SESSION['user'];

$qur="select * from registration where BINARY username='".$username."'";
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
	$Languages=$_POST['Languages'];
	$Other=$_POST['Other'];
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
		$Languages=$row['languages'];
		$Other=$row['other'];
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
    <link rel="stylesheet" href="css/RegForm.css">
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  
	<script type="text/javascript">
		window.history.forward();
		function noBack() { window.history.forward(); }
	</script>
<body onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
<style>
  #search{
	margin-left:10%;
}   
html .login-wrap .form input[type="text"],
html .login-wrap .form input[type="email"],
html .login-wrap .form input[type="url"],
html .login-wrap .form input[type="password"] {
  border: 1px solid #bbb;
  padding: 0 0 0 5px;
  font-size: 20px;
}  
</style>    
</head>
<body background="images/back.jpg" data-spy="scroll" data-offset="0" data-target="#theMenu">  
<br><br>
<div class="login-wrap">
	<?php
	if($_SESSION["username"]) {
	?>
	Welcome <?php echo $_SESSION["username"]." you can edit/update your information here..." ?>.<br><br>Click here to <a href="logout.php" tite="Logout" style="color:red">Logout.</a>
	<?php
	}
	?>  
		<div class="form">
			<!--update form start-->
			<form method='post' action='EditProfile.php' enctype='multipart/form-data'>
				<h3><u>Personal Details</u></h3><br>
				<label>Name</label><br><input type='text' name='Name' value="<?php echo $Name ?>"/>
				<label>Branch</label><br><input type='text' name='Branch' value="<?php echo $Branch ?>" required/>
				<label>Date of birth</label><br><input type='text' name='DOB' value="<?php echo $DOB ?>" required/>
				<br><br>			   
				<br><br>   	
				<label>Passing Year</label><br><input type='text' name='PassingYear' value="<?php echo $PassingYear ?>" required /><br><br>
				<label>Higher Education Details(if any)</label><br><input type='text' name='EduDetails' value="<?php echo $EduDetails ?>" required/><br><br>
				<label>Email ID</label><br><input type='email' name='EmailID' onfocusout='checkEmail()' value="<?php echo $EmailID ?>" required /> <br><br>
				<label>Contact Number</label><br><input type='text' name='ContactNumber' value="<?php echo $ContactNumber ?>" pattern='[7-9]{1}[0-9]{9}' title='Phone number with 7-9 and remaing 9 digit with 0-9' required/>
				<label>Present Address</label><br><input type='text' name='PresentAddress' value="<?php echo $PresentAddress ?>" required/><br><br>
				<label>Permanant Address</label><br><input type='text' name='PermanantAddress' value="<?php echo $PermanantAddress ?>" required/><br><br>
				<label>Update profile</label><input type="file" name="update_profile_pic" style="width: 100%;margin-left:12%;" required/> 
				<h3><u>Present Occupation</u></h3><br>
				<label>Organization Name</label><br><input type='text' name='NameOfOrganization' value="<?php echo $NameOfOrganization ?>" required/><br><br>
				<label>Working as a</label><br><input type='text' name='PostInCompany' value="<?php echo $PostInCompany ?>" required/><br><br>
				<label>Organization Website URL</label><br><input type='url' name='CompanyURL' value="<?php echo $CompanyURL ?>" required/><br><br>
				<label>Organization Address</label><br><input type='text' name='CompanyAddress' value="<?php echo $CompanyAddress ?>" required/><br><br>
				<br><br>
				
				<!--State selection-->
				<label>State</label><br>
				<select name="state" id="search"  >
					<option value=""><?php echo $State ?></option>
					<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
					<option value="Andhra Pradesh">Andhra Pradesh</option>
					<option value="Arunachal Pradesh">Arunachal Pradesh</option>
					<option value="Assam">Assam</option>
					<option value="Bihar">Bihar</option>
					<option value="Chandigarh">Chandigarh</option>
					<option value="Chhattisgarh">Chhattisgarh</option>
					<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
					<option value="Daman and Diu">Daman and Diu</option>
					<option value="Delhi">Delhi</option>
					<option value="Goa">Goa</option>
					<option value="Gujarat">Gujarat</option>
					<option value="Haryana">Haryana</option>
					<option value="Himachal Pradesh">Himachal Pradesh</option>
					<option value="Jammu and Kashmir">Jammu and Kashmir</option>
					<option value="Jharkhand">Jharkhand</option>
					<option value="Karnataka">Karnataka</option>
					<option value="Kerala">Kerala</option>
					<option value="Lakshadweep">Lakshadweep</option>
					<option value="Madhya Pradesh">Madhya Pradesh</option>
					<option value="Maharashtra">Maharashtra</option>
					<option value="Manipur">Manipur</option>
					<option value="Meghalaya">Meghalaya</option>
					<option value="Mizoram">Mizoram</option>
					<option value="Nagaland">Nagaland</option>
					<option value="Orissa">Orissa</option>
					<option value="Pondicherry">Pondicherry</option>
					<option value="Punjab">Punjab</option>
					<option value="Rajasthan">Rajasthan</option>
					<option value="Sikkim">Sikkim</option>
					<option value="Tamil Nadu">Tamil Nadu</option>
					<option value="Tripura">Tripura</option>
					<option value="Uttaranchal">Uttaranchal</option>
					<option value="Uttar Pradesh">Uttar Pradesh</option>
					<option value="West Bengal">West Bengal</option>
				</select>
				
				<br><br>
				
				<!--city selection-->
				<label>City</label><br>
				<select name="city" id="search"  required>
					<option selected="selected"><?php echo $City ?></option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#000000"><i>-Top Metropolitan Cities-</i></font></option>
					<option>Ahmedabad</option> 
					<option>Bengaluru/Bangalore</option>
					<option>Chandigarh</option>
					<option>Chennai</option>
					<option>Delhi</option>
					<option>Gurgaon</option>
					<option>Hyderabad/Secunderabad</option>
					<option>Kolkatta</option>
					<option>Mumbai</option>
					<option>Noida</option>
					<option>Pune</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
					<option>Anantapur</option>
					<option>Guntakal</option>
					<option>Guntur</option>
					<option>Hyderabad/Secunderabad</option>
					<option>kakinada</option>
					<option>kurnool</option>
					<option>Nellore</option>
					<option>Nizamabad</option>
					<option>Rajahmundry</option>
					<option>Tirupati</option>
					<option>Vijayawada</option>
					<option>Visakhapatnam</option>
					<option>Warangal</option>
					<option>Andra Pradesh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
					<option>Itanagar</option>
					<option>Arunachal Pradesh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
					<option>Guwahati</option>
					<option>Silchar</option>
					<option>Assam-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
					<option>Bhagalpur</option>
					<option>Patna</option>
					<option>Bihar-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
					<option>Bhillai</option>
					<option>Bilaspur</option>
					<option>Raipur</option>
					<option>Chhattisgarh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
					<option>Panjim/Panaji</option>
					<option>Vasco Da Gama</option>
					<option>Goa-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
					<option>Ahmedabad</option>
					<option>Anand</option>
					<option>Ankleshwar</option>
					<option>Bharuch</option>
					<option>Bhavnagar</option>
					<option>Bhuj</option>
					<option>Gandhinagar</option>
					<option>Gir</option>
					<option>Jamnagar</option>
					<option>Kandla</option>
					<option>Porbandar</option>
					<option>Rajkot</option>
					<option>Surat</option>
					<option>Vadodara/Baroda</option>
					<option>Valsad</option>
					<option>Vapi</option>
					<option>Gujarat-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
					<option>Ambala</option>
					<option>Chandigarh</option>
					<option>Faridabad</option>
					<option>Gurgaon</option>
					<option>Hisar</option>
					<option>Karnal</option>
					<option>Kurukshetra</option>
					<option>Panipat</option>
					<option>Rohtak</option>
					<option>Haryana-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
					<option>Dalhousie</option>
					<option>Dharmasala</option>
					<option>Kulu/Manali</option>
					<option>Shimla</option>
					<option>Himachal Pradesh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
					<option>Jammu</option>
					<option>Srinagar</option>
					<option>Jammu and Kashmir-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
					<option>Bokaro</option>
					<option>Dhanbad</option>
					<option>Jamshedpur</option>
					<option>Ranchi</option>
					<option>Jharkhand-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
					<option>Bengaluru/Bangalore</option>
					<option>Belgaum</option>
					<option>Bellary</option>
					<option>Bidar</option>
					<option>Dharwad</option>
					<option>Gulbarga</option>
					<option>Hubli</option>
					<option>Kolar</option>
					<option>Mangalore</option>
					<option>Mysoru/Mysore</option>
					<option>Karnataka-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
					<option>Calicut</option>
					<option>Cochin</option>
					<option>Ernakulam</option>
					<option>Kannur</option>
					<option>Kochi</option>
					<option>Kollam</option>
					<option>Kottayam</option>
					<option>Kozhikode</option>
					<option>Palakkad</option>
					<option>Palghat</option>
					<option>Thrissur</option>
					<option>Trivandrum</option>
					<option>Kerela-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
					<option>Bhopal</option>
					<option>Gwalior</option>
					<option>Indore</option>
					<option>Jabalpur</option>
					<option>Ujjain</option>
					<option>Madhya Pradesh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
					<option>Ahmednagar</option>
					<option>Aurangabad</option>
					<option>Jalgaon</option>
					<option>Kolhapur</option>
					<option>Mumbai</option>
					<option>Mumbai Suburbs</option>
					<option>Nagpur</option>
					<option>Nasik</option>
					<option>Navi Mumbai</option>
					<option>Pune</option>
					<option>Solapur</option>
					<option>Maharashtra-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
					<option>Imphal</option>
					<option>Manipur-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
					<option>Shillong</option>
					<option>Meghalaya-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
					<option>Aizawal</option>
					<option>Mizoram-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
					<option>Dimapur</option>
					<option>Nagaland-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
					<option>Bhubaneshwar</option>
					<option>Cuttak</option>
					<option>Paradeep</option>
					<option>Puri</option>
					<option>Rourkela</option>
					<option>Orissa-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
					<option>Amritsar</option>
					<option>Bathinda</option>
					<option>Chandigarh</option>
					<option>Jalandhar</option>
					<option>Ludhiana</option>
					<option>Mohali</option>
					<option>Pathankot</option>
					<option>Patiala</option>
					<option>Punjab-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
					<option>Ajmer</option>
					<option>Jaipur</option>
					<option>Jaisalmer</option>
					<option>Jodhpur</option>
					<option>Kota</option>
					<option>Udaipur</option>
					<option>Rajasthan-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
					<option>Gangtok</option>
					<option>Sikkim-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
					<option>Chennai</option>
					<option>Coimbatore</option>
					<option>Cuddalore</option>
					<option>Erode</option>
					<option>Hosur</option>
					<option>Madurai</option>
					<option>Nagerkoil</option>
					<option>Ooty</option>
					<option>Salem</option>
					<option>Thanjavur</option>
					<option>Tirunalveli</option>
					<option>Trichy</option>
					<option>Tuticorin</option>
					<option>Vellore</option>
					<option>Tamil Nadu-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
					<option>Agartala</option>
					<option>Tripura-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
					<option>Chandigarh</option>
					<option>Dadra & Nagar Haveli-Silvassa</option>
					<option>Daman & Diu</option>
					<option>Delhi</option>
					<option>Pondichery</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
					<option>Agra</option>
					<option>Aligarh</option>
					<option>Allahabad</option>
					<option>Bareilly</option>
					<option>Faizabad</option>
					<option>Ghaziabad</option>
					<option>Gorakhpur</option>
					<option>Kanpur</option>
					<option>Lucknow</option>
					<option>Mathura</option>
					<option>Meerut</option>
					<option>Moradabad</option>
					<option>Noida</option>
					<option>Varanasi/Banaras</option>
					<option>Uttar Pradesh-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
					<option>Dehradun</option>
					<option>Roorkee</option>
					<option>Uttaranchal-Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
					<option>Asansol</option>
					<option>Durgapur</option>
					<option>Haldia</option>
					<option>Kharagpur</option>
					<option>Kolkatta</option>
					<option>Siliguri</option>
					<option>West Bengal - Other</option>
					<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
					<option>Other</option>
				</select>  
				
				<br><br>
				
				<h3><u>Skills</u></h3><br>
				<label>Software Knowledge</label><br><input type="text" name="SoftwareKnowledge" value="<?php echo $SoftwareKnowledge ?>"  required/><br><br>
				<label>Languages</label><br><input type="text" name="Languages" value="<?php echo $Languages?>"  required/><br><br>
				<label>Other</label><br><input type="text" name="Other" value="<?php echo $Other ?>" required/><br><br>
				<br><br>
				<h3><u>Other Information</u></h3><br>
				<label>Hobbies</label><br><input type='text' name='Hobbies' value="<?php echo $Hobbies ?>" required/><br><br>
				<label>Area Of Interest</label><br><input type='text' name='AreaOfInterest' value="<?php echo $AreaOfInterest ?>" required/><br><br>
				<label>Your Thoughts</label><br><input type='text' name='Thoughts' value="<?php echo $Thoughts ?>" required/><br><br>
				
				<input id='submit' name='submit' type='submit' value='Update'></input>				
			</form>
			<!--update form end-->
		</div>
</div>
<br><br> 
</body>
</html>
  



