<?php
session_start();
$host = "localhost"; 
$user = "postgres"; 
$pass = "123"; 
$db = "books"; 

$con=pg_connect("host=$host user=$user dbname=$db password=$pass")
	or die ("Cannot connect to server!\n");

$query="INSERT into users(firstname,secondname,gender,emailaddress,username,password,streetaddress,city,state,country) values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10)";
pg_prepare($con,"prepare1",$query) or die("Cannot prepare statement.\n");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$newuser=$_POST['newuser'];
$newpass=$_POST['newpass'];
$email=$_POST['email'];
$add=$_POST['add'];
$city=$_POST['city'];
$state=$_POST['state'];
$coun=$_POST['coun'];
$checkdup="select * from users where username='".$newuser."';";

$dup=pg_query($con,$checkdup);
if(pg_num_rows($dup)>0)
{	
	$_SESSION['dup']=1;
	
	header('Location:main_login.php');
}
else{

if(strlen($fname)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($lname)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($gender)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($newuser)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($newpass)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($email)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($add)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($city)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($state)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
if(strlen($coun)==0)
{
	$_SESSION['dup1']=1;
	header('Location:main_login.php');
}
else{

pg_execute($con,"prepare1",array($fname,$lname,$gender,$email,$newuser,$newpass,$add,$city,$state,$coun)) or die("Could not create new user!\n");

echo("New account created!!\n");}}
header('Location:a.php');
?>
