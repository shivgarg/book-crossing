<?php
session_start();
$_SESSION['rate']=1;
if(isset($_SESSION['u2id']))
{$_SESSION['rate']=2;
		echo "ssasassa";
	$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
		or die ("Cannot********* connect to server!\n");

	$er=$_GET['bid'];
	$rate=$_POST['rate'];
	$id=$_SESSION['u2id'];
	$query="select * from ratings where userid=".$id." and bookid=".$er.";";
	echo $query;
	$t=pg_query($db,$query);
	$cou =pg_num_rows($t);
	if($cou>0)
	{
	
		$query="update ratings set rating = ".$rate."where userid=".$id." and bookid=".$er.";";
	}
	else
	{
		$query="Insert into ratings values (".$er.",".$id.",".$rate.",0);";
	}
	//echo $query;
	$re=pg_query($db,$query) or die("rating not updated\n");
	header("Location:books.php?id=$er");

}
else
{
		header("Location:books.php?id=$er");
}


?>
