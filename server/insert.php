<!DOCTYPE html>
<head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
             li {listt-style: none;}
</style>

</head>
<body>
<h2>upload new book</h2>
<ul>
<form name="insert" action="insert.php" method="POST" >
<li>Book ID:</li><li><input type="text" name="id" /></li>
<li>Book Name:</li><li><input type="text" name="name" /></li>
<li>Author:</li><li><input type="text" name="author" /></li>
<li>Publisher:</li><li><input type="text" name="publisher" /></li>
<li>Price (USD):</li><li><input type="text" name="price" /></li>
<li><input type="submit" /></li>
</form>
</ul>
</body>
</html>
<?php

$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
	or die ("Cannot connect to server -------!\n");
$query = "INSERT INTO book VALUES ('$_POST[id]','$_POST[name]',
'$_POST[author]','$_POST[publisher]','$_POST[price]')";

echo ("is ".$_POST['id']."<hr>");

if(isset($_POST['id'])){
	echo "going in if";
	$result = pg_query($query);
}
else{
	// $result =(!isset($_POST['id'])? "Book Id is required. <br>" : "" ;
	// $result =(!isset($_POST['name'])? $result."name is required. <br>" : $result ;
	// $result =(!isset($_POST['author'])? $result."author is required. <br>" : $result ;
	// $result =(!isset($_POST['publisher'])? $result."author is required. <br>" : $result ;
	// $result =(!isset($_POST['price'])? $result."price is required. <br>" : $result ;
	echo $result;
}

echo $result; //"\t".$query."\t".$hhh;

?>
