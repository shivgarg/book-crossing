<?php

ob_start();
$host="localhost"; // Host name
$username="postgres"; // Mysql username
$password="qwerty"; // Mysql password
$db_name="testdb"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$con=pg_connect("host=$host user=$username dbname=$db_name password=$password")
	or die ("Cannot connect to server!\n");

// define(name, value)ine $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// // To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = pg_escape_string($myusername);
$mypassword = pg_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=pg_query($sql);

// Mysql_num_row is counting table row
$count=pg_numrows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
// session_register("myusername");
session_start();
$_SESSION['userid'] = "$myusername";
// echo $_SESSION['userid'];
// session_register("mypassword");
$_SESSION['passwd'] = "$mypassword";
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>


