<?php
$host = "localhost"; 
$user = "postgres"; 
$pass = "qwerty"; 
$db = "testdb"; 

$con=pg_connect("host=$host user=$user dbname=$db password=$pass")
	or die ("Cannot connect to server!\n");

$query="INSERT into members(username,password) values($1,$2)";
pg_prepare($con,"prepare1",$query) or die("Cannot prepare statement.\n");

$newusername=$_POST['newuser'];
$newpassword=$_POST['newpass'];

pg_execute($con,"prepare1",array($newusername,$newpassword)) or die("Could not create new user!\n");

echo("New user created!!\n");
?>
<a href="main_login.php">Log In</a>