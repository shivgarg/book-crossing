<html>
<body>
<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header("location:Logout.php");
}

echo ("Hi <b>".$_SESSION['userid']."!</b>, successful login. <br> ");



if(isset($_SESSION['userid'])) {
	$id = $_SESSION['userid'];

	$db = pg_connect("host=localhost dbname=books user=postgres password=123")
		or die ("Cannot********* connect to server!\n");

	$sql = "SELECT * FROM users WHERE username = '$id'";
	$result = pg_query($db,$sql);

	if(!$result){
		echo "na error occured.\n";
		exit();
	}else {
		$row= pg_fetch_row($result);
	}
	echo "<fieldset>
	<legend>Member Profile</legend>
	<p>
		<b>Name</b> :  $row[0] $row[1]
	</p>
	<p>
		<b>Email</b> :  $row[3] 
	</p>
	<p>
		<b>Address </b> $row[6], $row[7] ,$row[8] ,$row[9]
	</p>
	</fieldset>";
}

echo ("<br><a href='addBook.php'> <b>Want to share some books.<b> </a>  <br>");

?>


</body>
</html>