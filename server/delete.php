<?php
session_start();
$bid=$_GET['bid'];
$uid=$_SESSION['u2id'];
$db = pg_connect("host=localhost dbname=books user=postgres password=123")
		or die ("Cannot********* connect to server!\n");

$query="update booksandusers set available=0 where bookid=".$bid." and userid=".$uid.";";

$check=pg_query($db,$query) or die("Could not remove\n");
header('Location:cur.php');

?>