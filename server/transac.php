<?php
session_start();
if(isset($_SESSION['userid']))
{

}
else
{
	echo "Login Please";
	$_SESSION['redriect']=1;
	header('Location:login.php');
}

?>
