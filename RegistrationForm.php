<?php
include 'connection.php';
error_reporting(0);
if($_POST['submit'])
{
	$flg=0;
	//$Name=$_POST['Name'];
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
	//$Username=$_POST['Username'];
	//$Password=$_POST['Password'];
	$Key=$_POST['Key'];
	$Country=$_POST['country'];
	$State=$_POST['state'];
	$City=$_POST['city'];
	$SoftwareKnowledge=$_POST['SoftwareKnowledge'];
	$Languages=$_POST['Languages'];
	$Other=$_POST['Other'];
	

	
	if(strcmp($Key,"alumni@wlug")==0)
	{
		 
	  
	if(@mysql_select_db($dbname,$connection))
    {
        $qur1="select username from registration where BINARY username='".$Username."'";
        $res1=@mysql_query($qur1,$connection);
		$result_count=@mysql_fetch_array($res1);
		
        if($result_count>0)
       	{
			echo "<script>";
            echo "alert('Username is already exist.')";
            echo "</script>";
		}
		else
	    {
          $qur="insert into registration(name,branch,passingyear,edudetails,emailid,contactnumber,presentaddress,permanantaddress,dob,nameoforganization,postincompany,companyurl,companyaddress,hobbies,areaofinterest,thoughts,username,password,country,state,city,softwareknowledge,languages,other) VALUES('$Name','$Branch','$PassingYear','$EduDetails','$EmailID','$ContactNumber','$PresentAddress','$PermanantAddress','$DOB','$NameOfOrganization','$PostInCompany','$CompanyURL','$CompanyAddress','$Hobbies','$AreaOfInterest','$Thoughts','$Username','$Password','$Country','$State','$City','$SoftwareKnowledge','$Languages','$Other')";
          $res=@mysql_query($qur,$connection);
		
		if($res)
        {
			$res=1;
			$flg=1;
            echo "<script>";
            echo "alert('Your account is successfully registered.')";
            echo "</script>";
        }
	    }
	}
	}
	else
	{
		
            echo "<script>";
            echo "alert('Your key is wrong')";
            echo "</script>";
	}
	if($flg==1)
	{
	//profile uploading
	
	
	$name=basename($_FILES['file_upload']['name']);
	$t_name=$_FILES['file_upload']['tmp_name'];
	$dir='php_image/upload';
	
	$cat=$_POST['cat'];
	$types = array('image/jpeg', 'image/gif', 'image/png','image/jpg');
	
if(in_array($_FILES['file_upload']['type'],$types))
{
		
		mysql_select_db($dbname,$connection);
		$qur1="select * from profiles where BINARY profile_name='$name'";
		
		$res1=mysql_query($qur1,$connection);
		$num=mysql_num_rows($res1);
		echo $num;
		if(mysql_num_rows($res1)>0)
		{
			echo '<script language="javascript">';
		    echo 'alert("Your Profile File name is already exists.");';
		    
		    echo '</script>';
		}
    else
	{
	
	
	if(move_uploaded_file($_FILES['file_upload']['tmp_name'],$dir."/".basename($_FILES['file_upload']['name'])))
	{
	       
		mysql_select_db($dbname,$connection);
		$qur="insert into profiles(username,profile_name,path) values('$Username','$name','php_image/upload/$name')";
		$res=mysql_query($qur,$connection);
		echo '<script language="javascript">';
			echo 'alert("Your Profile is successfully uploaded");';
			//echo 'window.location.href="update.php";';
			echo '</script>';
		
	}
	else
	{
			echo "outer";
			echo '<script language="javascript">';
			echo 'alert("There is a problem while uploading your profile please upload again...");';
		//	echo 'window.location.href="update.php";';
			echo '</script>';
			
	}
	}
}
     else
     {
	echo '<script language="javascript">';
	echo 'alert("only images are allowed to upload as a profile.");';
   // echo 'window.location.href = "update.php";';
	echo '</script>';
    }
}

}

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register form</title>
     <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.jpg">
<?php include 'header.php';?>
    <title>RegistrationForm</title>
        <link rel="stylesheet" href="css/RegForm.css">
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">  

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
  <h2>REGISTER HERE</h2>
  
  <div class="form">
  <form method="post" action="RegistrationForm.php" enctype="multipart/form-data">
  <h3><u>Personal Details</u></h3><br>

    <label>Name</label><br><input type="text" name="Name" required />
	<br><br>
	 <label>Select Branch</label>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <select name="Branch">
  <option value="CSE">CSE</option>
  <option value="IT">IT</option>
  <option value="Mechanical">Mechanical</option>
  <option value="Civil">Civil</option>
  <option value="Electronics">Electronics</option>
  <option value="Electrical">Electrical</option>

</select>
<br><br>   
    
  
<label>Passing Year</label><br><input type="text" name="PassingYear"  required /><br><br>
<label>Higher Education Details(if any)</label><br><input type="text" name="EduDetails" /><br><br>
<label>Email ID</label><br><input type="email" name="EmailID" onfocusout="checkEmail()" required /> <br><br>

<label>Contact Number</label><br><input type="text" name="ContactNumber" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" required />
<label>Present Address</label><br><input type="text" name="PresentAddress" required /><br><br>
<label>Permanant Address</label><br><input type="text" name="PermanantAddress" required /><br><br>

<label> Date Of Birth</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input id="DOB" type="date" placeholder="" name="DOB" required />
	<br><br>

	   <label>Select Gender</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="Male" value="male">&nbsp&nbspMale</input>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" name="female" value="Female">&nbsp&nbspFemale</input><br><br>
<h3><u>Present Occupation</u></h3><br>
<label>Organization Name</label><br><input type="text" name="NameOfOrganization" required /><br><br>
<label>Working as a</label><br><input type="text" name="PostInCompany" required /><br><br>
<label>Organization Website URL</label><br><input type="url" name="CompanyURL"/><br><br>
<label>Organization Address</label><br><input type="text" name="CompanyAddress" required /><br><br>
<label>Country</label><br>
<select name="country"id="search">
<option value="">--Select Country--</option>

	<option value="Afghanistan">Afghanistan</option>
	<option value="Åland Islands">Åland Islands</option>
	<option value="Albania">Albania</option>
	<option value="Algeria">Algeria</option>
	<option value="American Samoa">American Samoa</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antarctica">Antarctica</option>
	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Armenia">Armenia</option>
	<option value="Aruba">Aruba</option>
	<option value="Australia">Australia</option>
	<option value="Austria">Austria</option>
	<option value="Azerbaijan">Azerbaijan</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrain">Bahrain</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belarus">Belarus</option>
	<option value="Belgium">Belgium</option>
	<option value="Belize">Belize</option>
	<option value="Benin">Benin</option>
	<option value="Bermuda">Bermuda</option>
	<option value="Bhutan">Bhutan</option>
	<option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
	<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
	<option value="Botswana">Botswana</option>
	<option value="Bouvet Island">Bouvet Island</option>
	<option value="Brazil">Brazil</option>
	<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
	<option value="Brunei Darussalam">Brunei Darussalam</option>
	<option value="Bulgaria">Bulgaria</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Cambodia">Cambodia</option>
	<option value="Cameroon">Cameroon</option>
	<option value="Canada">Canada</option>
	<option value="Cape Verde">Cape Verde</option>
	<option value="Cayman Islands">Cayman Islands</option>
	<option value="Central African Republic">Central African Republic</option>
	<option value="Chad">Chad</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Christmas Island">Christmas Island</option>
	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
	<option value="Colombia">Colombia</option>
	<option value="Comoros">Comoros</option>
	<option value="Cuba">Cuba</option>
	<option value="Cyprus">Cyprus</option>
	<option value="Denmark">Denmark</option>
	<option value="Ecuador">Ecuador</option>
	<option value="Egypt">Egypt</option>
	<option value="Estonia">Estonia</option>
	<option value="Ethiopia">Ethiopia</option>
	<option value="Fiji">Fiji</option>
	<option value="Finland">Finland</option>
	<option value="France">France</option>
	<option value="French Southern Territories">French Southern Territories</option>
	<option value="Gabon">Gabon</option>
	<option value="Gambia">Gambia</option>
	<option value="Georgia">Georgia</option>
	<option value="Germany">Germany</option>
	<option value="Ghana">Ghana</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Greece">Greece</option>
	<option value="Greenland">Greenland</option>
	<option value="Grenada">Grenada</option>
	<option value="Guadeloupe">Guadeloupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernsey">Guernsey</option>
	<option value="Guyana">Guyana</option>
	<option value="Haiti">Haiti</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungary">Hungary</option>
	<option value="Iceland">Iceland</option>
	<option value="India">India</option>
	<option value="Indonesia">Indonesia</option>
	<option value="Iran">Iran</option>
	<option value="Iraq">Iraq</option>
	<option value="Ireland">Ireland</option>
	<option value="Israel">Israel</option>
	<option value="Italy">Italy</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japan">Japan</option>
	<option value="Jersey">Jersey</option>
	<option value="Jordan">Jordan</option>
	<option value="Kazakhstan">Kazakhstan</option>
	<option value="Kenya">Kenya</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Kyrgyzstan">Kyrgyzstan</option>
	<option value="Latvia">Latvia</option>
	<option value="Lebanon">Lebanon</option>
	<option value="Lesotho">Lesotho</option>
	<option value="Liberia">Liberia</option>
	<option value="Libya">Libya</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lithuania">Lithuania</option>
	<option value="Luxembourg">Luxembourg</option>
	<option value="Macao">Macao</option>
	<option value="Madagascar">Madagascar</option>
	<option value="Malawi">Malawi</option>
	<option value="Malaysia">Malaysia</option>
	<option value="Maldives">Maldives</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Martinique">Martinique</option>
	<option value="Mauritania">Mauritania</option>
	<option value="Mauritius">Mauritius</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Mexico">Mexico</option>
	<option value="Monaco">Monaco</option>
	<option value="Mongolia">Mongolia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Morocco">Morocco</option>
	<option value="Mozambique">Mozambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="Namibia">Namibia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Netherlands">Netherlands</option>
	<option value="New Caledonia">New Caledonia</option>
	<option value="New Zealand">New Zealand</option>
	<option value="Nicaragua">Nicaragua</option>
	<option value="Niger">Niger</option>
	<option value="Nigeria">Nigeria</option>
	<option value="Niue">Niue</option>
	<option value="Norway">Norway</option>
	<option value="Oman">Oman</option>
	<option value="Pakistan">Pakistan</option>
	<option value="Palau">Palau</option>
	<option value="Panama">Panama</option>
	<option value="Paraguay">Paraguay</option>
	<option value="Peru">Peru</option>
	<option value="Philippines">Philippines</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Poland">Poland</option>
	<option value="Portugal">Portugal</option>
	<option value="Qatar">Qatar</option>
	<option value="Romania">Romania</option>
	<option value="Rwanda">Rwanda</option>
	<option value="Samoa">Samoa</option>
	<option value="Senegal">Senegal</option>
	<option value="Serbia">Serbia</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapore">Singapore</option>
	<option value="Slovakia">Slovakia</option>
	<option value="Slovenia">Slovenia</option>
	<option value="Solomon Islands">Solomon Islands</option>
	<option value="Somalia">Somalia</option>
	<option value="South Africa">South Africa</option>
	<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
	<option value="South Sudan">South Sudan</option>
	<option value="Spain">Spain</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Sudan">Sudan</option>
	<option value="Suriname">Suriname</option>
	<option value="Swaziland">Swaziland</option>
	<option value="Sweden">Sweden</option>
	<option value="Switzerland">Switzerland</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tajikistan">Tajikistan</option>
	<option value="Tanzania">Tanzania</option>
	<option value="Thailand">Thailand</option>
	<option value="Timor-Leste</">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tokelau">Tokelau</option>
	<option value="Tonga">Tonga</option>
	<option value="Tunisia">Tunisia</option>
	<option value="Turkey">Turkey</option>
	<option value="Turkmenistan">Turkmenistan</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Uganda">Uganda</option>
	<option value="Ukraine">Ukraine</option>
	<option value="United Arab Emirates">United Arab Emirates</option>
	<option value="United Kingdom">United Kingdom</option>
	<option value="United States">United States</option>
	<option value="Uruguay">Uruguay</option>
	<option value="Uzbekistan">Uzbekistan</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Yemen">Yemen</option>
	<option value="Zambia">Zambia</option>
	<option value="Zimbabwe">Zimbabwe</option>
</select><br><br>
<label>State</label><br>
<select name="state" id="search">
<option value="">--Select State--</option>
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
<label>City</label><br>
<select name="city" id="search">
<option selected="selected">--Select City--</option>
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
<label>Software Knowledge</label><br><input type="text" name="SoftwareKnowledge" /><br><br>
<label>Languages</label><br><input type="text" name="Languages" /><br><br>
<label>Other</label><br><input type="text" name="Other" /><br><br>
<br><br>
<h3><u>Other Information</u></h3><br>
<label>Hobbies</label><br><input type="text" name="Hobbies" /><br><br>
<label>Area Of Interest</label><br><input type="text" name="AreaOfInterest" /><br><br>
<label>Your Thoughts</label><br><input type="text" name="Thoughts" /><br><br>
<h3><u>Create An Account</u></h3><br>
<label>Enter Username</label><br><input type="text" name="Username" required /><br><br>
<label>Enter Password</label><br><input type="password" name="Password" required /><br><br>
    <label> Upload Your Profile </label><br>     
    <input type="file" name="file_upload" style="width: 100%;margin-left:12%;" />
	<br><br>

<label>Registration Key</label><br><input type="text" name="Key" required /><br><br>


    <input id="submit" name="submit" type="submit" value="Register"></input>

  </form>
  </div>
</div>

<br><br>
 
  </body>
</html>
