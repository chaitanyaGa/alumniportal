
<?php
//Connection file is included
include "connection.php";

//avoiding eroor showing
error_reporting(0);

mysql_select_db($dbname,$connection);
$myVar=$_POST['var'];
$username=$_POST['username'];
$qur="select * from registration where Button_ID='".$myVar."'";
$res=mysql_query($qur,$connection);
$count=mysql_num_rows($res);
$row=mysql_fetch_array($res);

$qur1="select * from profiles where BINARY username='".$username."'";
$res1=mysql_query($qur1,$connection);
$row1=mysql_fetch_array($res1);

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
	$Computer_Languages=$row['computer_languages'];
	$Other=$row['other'];
	$Companies=$row['companies'];
	$Experience=$row['experience'];
	$Honors=$row['honors'];
	$Courses=$row['courses'];
	if(strcmp($Name,"")==0)
		$Name="---";
	if(strcmp($Branch,'')==0)
		$Branch="---";
	if(strcmp($PassingYear,'')==0)
		$PassingYear="---";
	if(strcmp($EduDetails,'')==0)
		$EduDetails="---";
	if(strcmp($EmailID,'')==0)
		$EmailID="---";
	if(strcmp($ContactNumber,'')==0)
		$ContactNumber="---";
	if(strcmp($PresentAddress,'')==0)
		$PresentAddress="---";
	if(strcmp($PermanantAddress,'')==0)
		$PermanantAddress="---";
	if(strcmp($DOB,'')==0)
		$DOB="---";
	if(strcmp($NameOfOrganization,'')==0)
		$NameOfOrganization="---";
	if(strcmp($PostInCompany,'')==0)
		$PostInCompany="---";
	if(strcmp($CompanyURL,'')==0)
		$CompanyURL="---";
	if(strcmp($CompanyAddress,'')==0)
		$CompanyAddress="---";
	if(strcmp($Hobbies,'')==0)
		$Hobbies="---";
	if(strcmp($AreaOfInterest,'')==0)
		$AreaOfInterest="---";
	if(strcmp($Thoughts,'')==0)
		$Thoughts="---";
	if(strcmp($State,'')==0)
		$State="---";
	if(strcmp($City,'')==0)
		$City="---";
	if(strcmp($SoftwareKnowledge,'')==0)
		$SoftwareKnowledge="---";
	if(strcmp($Languages,'')==0)
		$languages="---";
	if(strcmp($Computer_Languages,'')==0)
		$computer_languages="---";
	if(strcmp($Other,'')==0)
		$Other="---";
	if(strcmp($Companies,'')==0)
		$Companies="---";
	if(strcmp($Experience,'')==0)
		$Experience="---";
	if(strcmp($Honors,'')==0)
		$Honors="---";
	if(strcmp($Courses,'')==0)
		$Courses="---";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Alumni Profile</title>
	<link type="text/css" rel="stylesheet" href="css/green.css" />
	<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="js/cufon.yui.js"></script>
	<script type="text/javascript" src="js/scrollTo.js"></script>
	<script type="text/javascript" src="js/myriad.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript">
			Cufon.replace('h1,h2');
	</script>
<style>
img.portrait {
	background-image:url(images/frame.jpg);
	background-repeat: no-repeat;
	width:140px;
	height:175px;
	padding-top:20px;
	padding-left:11px;
	padding-right:11px;
	padding-bottom:36px;
	margin-left:50px;
	float:left;
	
}
</style>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <img class="portrait" src="<?php echo $row1['path'];?>" alt="Alumni" />
          <div class="self">
            <h1 class="name"><?php echo $Name;?><br>
			
              <br><span><?php echo $PostInCompany." at ".$NameOfOrganization;?></span></h1>
            <ul>
              <li class="ad" style="margin-bottom:20px"><?php echo $PresentAddress;?> </li>
              <li class="mail" style="margin-bottom:10px"><?php echo $EmailID;?></li>
              <li class="tel"><?php echo $ContactNumber;?></li>
            </ul>
          </div>
          <!-- Begin Social -->
          <div class="social">
            <ul>
             <!-- <li><a class='north' href="#" title="Download .pdf"><img src="images/icn-save.jpg" alt="Download the pdf version" /></a></li>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="images/icn-contact.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="Follow me on Twitter"><img src="images/icn-twitter.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="My Facebook Profile"><img src="images/icn-facebook.jpg" alt="" /></a></li>
            </ul>-->
          </div>
          <!-- End Social -->
        </div>
        
		<div class="entry">
          <h2>Date Of Birth</h2>
          <p><?php echo $DOB;?></p>
        </div>
        <div class="entry">
          <h2>Thoughts</h2>
          <p><?php echo $Thoughts;?></p>
        </div>
       
        <div class="entry">
          <h2>Academic</h2>
          <div class="content">
            <h3>College Name</h3>
            <p>Walchand College OF Engineering,Sangli <br />
              <em>Bachelor Of Technology</em></p>
          </div>
          <div class="content">
            <h3>Branch</h3>
            <p><?php echo $Branch;?><br /></p>
          </div>
		  <div class="content">
            <h3>Heighest Education Details</h3>
            <p><?php echo $EduDetails;?></p>
          </div>
        </div>
   
        <div class="entry">
          <h2>Present Status</h2>
          <div class="content">
            <h3>Company Name</h3>
            <p><?php echo $NameOfOrganization;?></p>
            
          </div>
          <div class="content">
            <h3>Working as a</h3>
            <p><?php echo $PostInCompany;?></p>
            
          </div>
		  <div class="content">
            <h3>Company Address</h3>
            <p><?php echo $CompanyAddress;?></p>
            
          </div>
		   
		   <div class="content">
            <h3>State</h3>
            <p><?php echo $State;?></p>
            
          </div>
		   <div class="content">
            <h3>City</h3>
            <p><?php echo $City;?></p>
            
          </div>
		  <div class="content">
            <h3>Company Website</h3>
            <p><a href="<?php echo $CompanyURL?>" ><?php echo $CompanyURL;?></a></p>
            
          </div>
        </div>
		
		
		<div class="entry">
          <h2>Past Status</h2>
          <div class="content">
            <h3>Companies or organizations</h3>
            <p><?php echo $Companies;?></p>
            
          </div>
          <div class="content">
            <h3>Experience</h3>
            <p><?php echo $Experience;?></p>
            
          </div>
		 
		   
		   
        </div>
		
		
		 <div class="entry">
          <h2>Honors/Awards</h2>
          <p><?php echo $Honors;?></p>
        </div>
		
		<div class="entry">
          <h2>Courses</h2>
            <p><?php echo $Courses;?></p>
          
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Software Knowledge</h3>
            <p><?php echo $SoftwareKnowledge;?></p>
          </div>
          <div class="content">
            <h3>Languages Known</h3>
            <p><?php echo $Languages;?></p>

          </div>
           <div class="content">
            <h3>Computer Languages Known</h3>
            <p><?php echo $Computer_Languages;?></p>

          </div>
		  <div class="content">
            <h3>Other</h3>
            <p><?php echo $Other;?></p>

          </div>
        </div>
       
        <div class="entry">
        <h2>Hobbies</h2>
         
            <p><?php echo $Hobbies;?></p>
          </div>
		  <div class="entry">
        <h2>Area Of Interest</h2>
         
            <p><?php echo $AreaOfInterest;?></p>
          </div>
        </div>
        
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
 
  </div>
 <!-- <div class="wrapper-bottom"></div>-->
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
<!-- End Wrapper -->
</body>
</html>
