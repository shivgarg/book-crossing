<htnl>
<body>
<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header("location:main_login.php");
}
echo ("Hi <b>".$_SESSION['userid']."!</b>, successful login");
?>

<a href="Logout.php">Logout</a>
</body>