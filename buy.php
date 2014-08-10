<?php
session_start();
$y=$_SESSION['userid'];
if(isset($_GET['uid']))

{
	$i=$_GET['uid'];
	$_SESSION['u1id']=$i;
	$bid=$_SESSION['booktrans'];
	$query="select * from books where bookid=".$bid.";";
	
	$db = pg_connect("host=localhost dbname=books user=postgres password=123")or die ("Cannot connect to server -------!\n");
	$trans=pg_query($db,$query);
	echo "Transaction Details<br>";
	echo "Book Details<br>";
	$row=pg_fetch_assoc($trans);
	echo "<table cellpadding=\"10\"><tr><td>Title</td><td>Author</td><td>Publisher</td><td>ISBN</td><td>Price</td><td>Hard/Soft</td></tr>";

	echo "<tr><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['publisher']."</td><td>".$row['isbn']."</td>";
	$t="select  price,hard from booksandusers where userid=".$i."and bookid=".$bid.";";
	$r=pg_query($db,$t);
	$f=pg_fetch_assoc($r);
	echo "<td>".$f['price']."</td><td>";
	if($f['hard']==1)
		echo "Hard</td>";
	else
		echo "Soft</td>";
	echo "</tr></table><br>";
	echo "Mode of Payment<br>";
	echo "
	<form name='asasa' action='server/transac.php' method='post'>
	<select name=\"mode\" id='genre'>
	<option value='mobile-banking'>Mobile-Banking</option>
	<option value ='bitcoins'>Bitcoins</option>
	<option value ='net-banking'>Net-Banking</option>
	<option value ='paypal'>PayPal</option>
	<option value='credit-card'>Credit-Card</option>
	</select><br><input type =\"submit\" name=\"submit\" value = \"submit\"></form>";
	



	
}











else
{
	echo "not set";
}


?>