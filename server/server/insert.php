<!DOCTYPE html>
<head>
<title>Insert data to PostgreSQL with php - creating a simple web application</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
             li {listt-style: none;}
</style>

<?php 

session_start();
if(!isset($_SESSION['userid']))
{
	header("location:Logout.php");
}

$BackUpId=$_SESSION['userid'];
session_destroy();
session_start();
$_SESSION['userid']=$BackUpId;
?>


</head>
<body>
<p align='right'><a href='Logout.php'>Logout</a>
	</p>
	<hr>
	<br>
<h2>upload new book</h2>
<ul>
<fieldset>
<form name="insert" action="addBook.php" method="POST" >
<table>
<tr><td>Book ID *</td><td><input type="text" name="id" /></td></tr>
<tr><td>Book Name *</td><td><input type="text" name="name" /></td></tr>
<tr><td>Author *</td><td><input type="text" name="author" /></td></tr>
<tr><td>Publisher *</td><td><input type="text" name="publisher" /></td></tr>
<tr><td>Price (USD) *</td><td><input type="text" name="price" /></td></tr>
</table>
<input type="submit" />
</form>
</fieldset>
</ul>

<?php
echo ("<br><a href='hi.php'> Back to profile </a>  <br>");

?>

</body>
</html>


