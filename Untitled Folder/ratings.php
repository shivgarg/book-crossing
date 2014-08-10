<html>
<body>
<?php
	if(!isset($_GET['id']))
	{
		echo "HEY!!\n";
		$_GET['id']=1;
	}
	$host="localhost";
	$username="postgres";
	$password="qwerty";
	$db_name="books";	
	$id=$_GET['id'];
	
	$con=pg_connect("host=$host user=$username dbname=$db_name password=$password") or die("Could not connect to DB!\n");
	
	$sql="SELECT * FROM books WHERE bookid=$id";
	$result=pg_query($sql);
	$ans=pg_fetch_all($result);
	print_r($ans);
	echo("yo!<br><br>");

	$sql="SELECT AVG(rating) FROM ratings WHERE bookid=$id";
	$result=pg_query($sql);

	$ans=pg_fetch_all($result);
	print_r($ans);
	
?>
</body>