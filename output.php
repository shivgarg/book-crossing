<?php
echo("asasasas");
session_start();
$page=$_SESSION['page'];
	$start_ind=$page*20;
	
	$ans=$_SESSION['res'];
	echo ("<table><tr><td>ISBN</td><td>Year</td><td>Author</td><td>Title</td><td>Publisher</td><td>Rating</td></tr>");
	$count=$_SESSION['cnt'];
	
	for($i=$start_ind;$i<min($start_ind+20,$count);$i++)
	{	$arr=$ans[$i];
		echo("<tr>");
			echo ("<td>".$arr['isbn']."</td>"	);
			echo ("<td>".$arr['year']."</td>"	);
			echo ("<td>".$arr['author']."</td>"	);
			echo ("<td>"."<a href=books.php?id=".$arr['bookid'].">".$arr['title']."</a></td>"	);
			echo ("<td>".$arr['publisher']."</td>"	);
			echo ("<td>".round($arr['avgrating'],1)."</td>"	);
		echo("</tr>");
		
	}
	echo ("</table>");
	if(($page+1)*20>$count && $page!=0)
	{
		echo "<a href= \"back.php\">Back Page</a>";
	}
	else if($page==0 &&  $count>20)
	{
		echo "<a href= \"next.php\">Next Page</a>";	
	}
	else
	{
		echo "<a href= \"back.php\">Back Page</a>";
		echo "<a href= \"next.php\">Next Page</a>";
	}





?>
