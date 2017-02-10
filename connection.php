<!--------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------->
<!-- php code for the connection with the database-->
<?php

$hostname="localhost";
$dbname="alumniportal";
$username="root";
$password="";
$connection=@mysql_connect($hostname,$username,$password)or trigger_error(mysql_error(),E_USER_ERROR);

?>