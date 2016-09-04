<?php

// ob_start();
$host="localhost"; // Host name
$username="postgres"; // Mysql username
$password="dalal"; // Mysql password
$db_name="books"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
$con=pg_connect("host=$host user=$username dbname=$db_name password=$password")
	or die ("Cannot connect to server!\n");

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// // To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = pg_escape_string($myusername);
$mypassword = pg_escape_string($mypassword);

$sql=" SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=pg_query($sql);

// Mysql_num_row is counting table row
$count=pg_numrows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	// session_register("myusername");
	session_start();
	$_SESSION['userid'] = "$myusername";
	$op=pg_fetch_assoc($result);
	$_SESSION['u2id']=$op['userid'];
	// echo $_SESSION['userid'];
	// session_register("mypassword");
	$_SESSION['passwd'] = "$mypassword";
	if(isset($_SESSION['redirect']))
{	
	unset($_SESSION['redirect']);
	header('Location:transac.php');
	
}else{
	header("location:login_success.php");}

}else {

	header('Location:login.php?msg=wrg');

	
}

// ob_end_flush();
?>


