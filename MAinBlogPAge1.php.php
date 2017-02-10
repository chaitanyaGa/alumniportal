<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.jpg">
	<!--nav bar file is included-->
	<?php include 'header.php';?>
    <title>WLUG BLOG</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Orbitron" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bangers|Fjalla+One|Orbitron" rel="stylesheet">

<style>
	.button1 {
    background-color: #009688; /* Green */
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

.button1 {
    background-color:orange;
    color:white;
	width:130px;
	height:60px;
    border: 2px solid #009688;
	border-radius: 25px;

}

.button1:hover {
    background-color:#009688;
    color: white;
}
.logo img{
background-color:hsla(50,100%,75%,0.3);
}
.logo img{
opacity:0.8;
	font-size: .8em;
	text-align: center;
	padding: 10px;
	background-color: #111;
	color: #fff;
	box-shadow:	0px 1px 3px 0px rgba(0, 0, 0, .3);
	text-transform: uppercase;
	position: relative;
	font-weight: bold;
	
	-webkit-animation: bounce 800ms ease-out;
	-moz-animation: bounce 800ms ease-out;
	-o-animation: bounce 800ms ease-out;
	animation: bounce 800ms ease-out;
}

/* Webkit, Chrome and Safari */

@-webkit-keyframes bounce {
  0% {
	-webkit-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-webkit-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateY(-50%);
  }
  40% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateY(-30%);
  }
  70% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateY(-15%);
  }
  90% {
  	-webkit-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-webkit-transform:translateY(-10%);
  }
  97% {
  	-webkit-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-webkit-transform:translateY(-5%);
  }
  100% {
  	-webkit-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* Mozilla Firefox 15 below */
@-moz-keyframes bounce {
  0% {
	-moz-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-moz-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateY(-50%);
  }
  40% {
  	-moz-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateY(-30%);
  }
  70% {
  	-moz-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateY(-15%);
  }
  90% {
  	-moz-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-moz-transform:translateY(-10%);
  }
  97% {
  	-moz-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-moz-transform:translateY(-5%);
  }
  100% {
  	-moz-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* Opera 12.0 */
@-o-keyframes bounce {
  0% {
	-o-transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	-o-transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	-o-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-o-transform:translateY(-50%);
  }
  40% {
  	-o-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-o-transform:translateY(-30%);
  }
  70% {
  	-o-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-o-transform:translateY(-15%);
  }
  90% {
  	-o-transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	-o-transform:translateY(-10%);
  }
  97% {
  	-o-transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	-o-transform:translateY(-5%);
  }
  100% {
  	-o-transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}

/* W3, Opera 12+, Firefox 16+ */
@keyframes bounce {
  0% {
	transform:translateY(-100%);
    opacity: 0;
  }
  5% {
  	transform:translateY(-100%);
    opacity: 0;
  }
  15% {
  	transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	transform:translateY(-50%);
  }
  40% {
  	transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	transform:translateY(-30%);
  }
  70% {
  	transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	transform:translateY(-15%);
  }
  90% {
  	transform:translateY(0%);
  	padding-bottom: 8px;
  }
  95% {
  	transform:translateY(-7%);
  }
  97% {
  	transform:translateY(0%);
  	padding-bottom: 9px;
  }
  99% {
  	transform:translateY(-3%);
  }
  100% {
  	transform:translateY(0);
  	padding-bottom: 9px;
    opacity: 1;
  }
}
body {
  background-color: #f2f2f2;
    font-family: 'EB Garamond', serif;
    font-weight: 300;
    font-size: 16px;
    color: #555;

    -webkit-font-smoothing: antialiased;
    -webkit-overflow-scrolling: touch;
}
#headerwrap {
	background: url(blog1.jpg) no-repeat center top;
	margin-top: -10px;
	padding-top:20px;
	text-align:center;
	background-attachment: relative;
	background-position: center center;
	min-height: 700px;
	width: 100%;
	
    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

#headerwrap h3 {
	color: black;

text-shadow: #fff 0 -1px 4px, #ff0 0 -2px 10px, #ff8000 0 -10px 20px, red 0 -18px 40px;
	}
.typewriter h3 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .100em  orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .100em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
	-webkit-animation-iteration-count: 100;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: orange; }
}
</style>
</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
	<section id="home" name="home"></section>
	<div id="headerwrap">
	<div class="background-image"></div>
		<div class="container-fluid">
			<div class="logo">
				<img src="images/logo.png" width="200px" height="100px">
			</div>
			<div class="typewriter">

				<h1 style="text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,
				0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);">THE ALUMNI BLOGS</h1>
			</div>
			<br>
			<div class="typewriter">  
				<h3 >Read Alumnies Blogs here</h3>
			</div>
			<br>
			<br>
			<center><button class="button1" style="font-size:20px;font-family:bold;" onclick="window.location.href='BlogPage.php'" ><center><img src="go2.gif" width="150" height="60"></img></center></button>&nbsp&nbsp&nbsp&nbsp
			
		</div>
	</div>
</body>
</html>
