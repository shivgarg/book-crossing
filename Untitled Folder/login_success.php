<html>
<body>
Login Successful<br>
<?php
session_start();
echo($_SESSION['userid']);
if(!isset($_SESSION['userid'])){
header("location:main_login.php");
}
header("location:hi.php");
?>
<a href="Logout.php">Logout</a>

</body>
</html>