<?php
session_start();
$id=$_SESSION['u2id'];
$query="Select books.bookid,title,author,isbn,price,available,hard from booksandusers,books where booksandusers.userid=".$id."and booksandusers.bookid=books.bookid;";
$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
		or die ("Cannot********* connect to server!\n");
$check=pg_query($db,$query);
$num=pg_num_rows($check);
echo "<table><tr><td>Title</td><td>Author</td><td>ISBN</td><td>Price</td><td>Copies</td><td>Type</td></tr>";
for($i=0;$i<$num;$i++)
{
		$ans=pg_fetch_assoc($check);
		if($ans['available']>0)
		{
			echo "<tr><td>";
			echo ($ans['title']."</td><td>".$ans['author']."</td><td>".$ans['isbn']."</td><td>".$ans['price']."</td><td>".$ans['available']."</td><td>".$ans['hard']."</td><td>");
			echo ("<a href=\"delete.php?bid=".$ans['bookid']."\">Remove Book</a></td></tr>");
		}

}
echo "</table>";
?>