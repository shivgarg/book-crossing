<?php
session_start();
$a=$_SESSION['page'];
$_SESSION['page']=$a+1;
header('Location:output.php');
exit;
?>