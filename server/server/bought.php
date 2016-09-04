<?php
session_start();
$id=$_SESSION['u2id'];
$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
		or die ("Cannot********* connect to server!\n");
$query="select tid,price,title,isbn,author,firstname,secondname,modeofpayment from users,books,transactions,booksandusers
 where id2=".$id." and id1=booksandusers.userid and id1=users.userid and transactions.bookid=books.bookid and transactions.bookid=booksandusers.bookid;";
echo $query;
$ans=pg_query($db,$query) or die("Falied query fetch\n");
$count=pg_num_rows($ans);
echo "<table><tr><td>Transaction Id</td><td>User Name</td><td>Book Title</td><td>Author</td><td>ISBN</td><td>Price</td><td>Mode</td></tr>";
for($i=0;$i<$count;$i++)
{	echo "<tr>";
	$row=pg_fetch_assoc($ans);
	echo "<td>".$row['tid']."</td>";
	echo "<td>".$row['firstname']." ".$row['secondname']."</td>";
	echo "<td>".$row['title']."</td>" ;
	echo "<td>".$row['author']."</td>";
	echo "<td>".$row['isbn']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['modeofpayment']."</td>";
	echo "</tr>";
	
}

?>