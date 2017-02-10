<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--nav bar file is included-->
	<?php include 'header.php';?>
    <title>AboutUs</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin|Rubik" rel="stylesheet">
</head>
<style>
body {
  animation: pulse 10s infinite;
  max-height:520px;
  }

@keyframes pulse {
  0% {
    background-color: #82b1ff;
  }
  20%
  {
	  background-color:#8bc34a;
  }
   40%
  {
	  background-color: #ffc107;
  }
   60%
  {
	  background-color:#ff5722;
  }
   80%
  {
	  background-color:white;
  }
  100% {
    background-color: #FF4136;
  }
}
#img1{
	animation:zoomInDown 3s;
}
@keyframes zoomInDown {
  from {
    opacity: 0;
    -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
    transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
    transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
  }
}
#text{
	min-height:210px;
	width:1100px;
	border: 1px solid gray;
 box-shadow: 10px 10px 5px #424242;
background-color:#5c6bc0;

}
.container{
	box-sizing: border-box;
  justify-content: center;
  display: flex;
flex-wrap: wrap;
}
#text p{
	margin:10px;
font-family: 'Libre Franklin', sans-serif;
font-family: 'Rubik', sans-serif;
	font-size:20px;
	color:white;
	text-align: justify;
    text-justify: inter-word;
}
span{
	Sizes:
      tiny: 1rem
      small: 2rem
      medium: 4rem
      large: 6rem
}
</style>
</head>
<body style="background-color:#E3F2FD;">
	<br>
	<center><img id="img1" src="images/clublogo.png" width="350px" height="200px"/></center>
	<br>
	<div class="container">
	<div id="text">
	<br>
	<p>Walchand Linux Users' Group(WLUG) is an active technical club of Walchand College of Engineering, Sangli which is spreading awareness of Linux and open source technology in walchand college. We contribute our knowledge for student of other colleges by organizing different workshops in each semester. This Club got in action from October 2003. The topics which we are choosing those which are very useful for the technical perspective. The tag line of our group is "Community Knowledge Share". We are gathered together in order to spread the importance of the open source platform in order to making the use of the open source tools available for us. This Group has members from Final , Third and Second year B.Tech students.the student who really has interest in learning in open source stuff they are joined in order to make awareness about the Linux. There are nearly 80 members are in this group. The approaches which this group is doing by the means of conducting club services weekly at one day on a particular topic.<br><br></p>						  
	</div>
	</div>
	<br><br>
</body>
</html>