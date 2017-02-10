<?php 
include '../connection.php';
session_start();
$username=$_SESSION['user'];
mysql_select_db($dbname,$connection);
$cover=$_SESSION['cover'];
$_SESSION['cover']=$cover;
$_SESSION['user']=$username;

$qur="select * from blogs where blogcover='".$cover."'";

$res=mysql_query($qur,$connection);
$row=mysql_fetch_array($res);
$old_likes=$row['likes'];
$new_likes=$old_likes+1;
$qur_update="update blogs SET likes='".$new_likes."' where blogcover='".$cover."'";
$res_update=mysql_query($qur_update,$connection);
header('Location:ReadMore.php');

?>