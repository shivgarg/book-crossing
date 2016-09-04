<?php
session_start();
$bid=$_GET['bid'];
$uid=$_SESSION['u2id'];
$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
		or die ("Cannot********* connect to server!\n");

$query="update booksandusers set available=0 where bookid=".$bid." and userid=".$uid.";";
echo $query;
$check=pg_query($db,$query) or die("Could not remove\n");
header('Location:cur.php');

?>