<?php
session_start();
if(isset($_SESSION['userid']))
{	
	$u2id=$_SESSION['u2id'];
	$u1id=$_SESSION['u1id'];
	if(isset($_POST['mode']))
	{
		$mode =$_POST['mode'];
	}
	else
	{
		$mode=$_SESSION['mode'];
	}
	$bid=$_SESSION['booktrans'];
$db = pg_connect("host=localhost dbname=books user=postgres password=123")or die ("Cannot connect to server -------!\n");	
$query="begin ; Insert into transactions values(".$u1id.",".$u2id.",".$bid.",'".$mode."');";

$check=pg_query($db,$query) or die("Cannot execute query insert\n");
$query="select * from booksandusers where bookid=".$bid." and userid = ".$u1id.";";
$check=pg_query($db,$query);
$ans=pg_fetch_assoc($check);
if($ans['available']<0)
{
	pg_query($db,"abort");
	$_SESSION['trans']=0;
	header('Location:a.php');

}
else
{
	$er=pg_query($db,"commit");
	if(!$er)
	{
		echo "PROBLEM \n";
	}
	$_SESSION['trans']=1;
	echo "transaction commited\n";
	header('Location:a.php');
}


 
	

	unset($_SESSION['redirect']);
	




}
else
{
	$_SESSION['mode']=$_POST['mode'];
	echo "Login Please";
	$_SESSION['redirect']=1;
	header('Location:login.php');
}

?>
