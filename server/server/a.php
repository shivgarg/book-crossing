<?php

session_start();
if(isset($_SESSION['trans']))
{
		if($_SESSION['trans']==1)
		{
			echo ("<center>Transaction Successful</center><br>\n");
			echo("<a href='../intermediate.php'>Shop More</a>\n");

		}
		else
		{
			echo ("Transaction Unsuccessful\n");
		}

	unset($_SESSION['trans']);
}
else
{
	echo "Homepage";
	echo "<center>Top Books</center>";
	$query="Select * from books order by avgrating asc limit 30;";
	$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")
		or die ("Cannot********* connect to server!\n");
	$ans=pg_query($db,$query);
	echo "<table>";
	for($q=0;$q<5;$q++)
	{
			echo "<tr>";
			for($w=0;$w<6;$w++)
			{
				$row=pg_fetch_assoc($ans);
				echo "<td><a href=../books.php?id=".$row['bookid']."><img src=".$row['imagem']."></a></td>";
			}
			echo "</tr>";
	}
	echo "</table>";


}

?>