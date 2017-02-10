<?php
require ('connections/phpimage.php');
error_reporting(0);


if($_POST['delete1'])
{
	
	$val=$_POST['text1'];
	
		mysql_select_db($database,$phpimage);
		
		
		$qur1="delete from gallery where BINARY name='$val'";
		$res1=mysql_query($qur1);
		if($res1)
		{$file_del="upload/".$val;
		//echo $file_del;
		unlink($file_del);
		}
		echo '<script language="javascript">';
		echo 'alert("File deleted.");';
		echo 'window.location.href="../show_image_list.php";';
		echo '</script>';
		
	
	
}

?>