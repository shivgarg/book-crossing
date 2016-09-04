<html>
<body>
Login Successful<br>
<?php
session_start();

echo($_SESSION['userid']);
if(!isset($_SESSION['userid'])){
	header("location:main_login.html");
}
else{
	header("location:login.php");
}
?>
<br>
<hr>
<p align="right"><a href="Logout.php">Logout</a>
</p>
</body>
</html>