<?php

include 'connection.php';
session_start();


$username=$_SESSION['user'];
mysql_select_db($dbname,$connection);
$qur="select * from registration where BINARY username='".$username."'";
$res=mysql_query($qur,$connection);
$row=mysql_fetch_array($res);

$qur_profile="";
		$name=basename($_FILES['update_profile_pic']['name']);
	echo "$$$$$$$".$name.":::::::::";
	$qur1="select profile_name from profiles where BINARY username='".$username."'";
		$res1=mysql_query($qur1,$connection);
		$row1=mysql_fetch_array($res1);
		$check=0;
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
			echo ":::::::::::::".$name.":::::::::::::";
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
				header('Location:EditProfile1.php');

				echo '</script>';	
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("There is a problem while uploading your file please upload again...");';
				header('Location:EditProfile1.php');

				echo '</script>';					
			}
				
				
				
			
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("only images are allowed to upload.");';
					//header('Location:EditProfile1.php');

			echo '</script>';
		}
		
?>