<?php
session_start();
echo "<center>We are sorry to see you go<center><br>";
$query = "begin;delete from users where userid=".$_SESSION['u2id'].";commit;";
$db = pg_connect("host=localhost dbname=books user=postgres password=123")or die ("Cannot connect to server -------!\n");

$exe=pg_query($db,$query) or die("sasasasasasasasasasasasasasasa");

session_destroy();
header('Location:../main.html')


?>