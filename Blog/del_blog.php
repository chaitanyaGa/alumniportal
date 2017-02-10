<!--php script to delete filf efrom the folder -->
<?php
require ('../connection.php');
error_reporting(0);
session_start();
	$username=$_SESSION['user'];


if($_POST['delete1'])
{
	
	$val=$_POST['text1'];
	
		mysql_select_db($dbname,$connection);
		
		
		$qur2="select * from newblogtable1 where BINARY title='$val' and username='$username'";
		$res2=mysql_query($qur2);
		$row=mysql_fetch_array($res2);
		$qur1="delete from newblogtable1 where BINARY title='$val' and username='$username'";
		$res1=mysql_query($qur1);
		
		if($res1)
		{
		$file_del=$row['blogcover'];
		unlink($file_del);
		}
		echo '<script language="javascript">';
		echo 'alert("File deleted.");';
		echo 'window.location.href="DeleteBlog.php";';
		echo '</script>';
		
	
	
}

?>