<?php
session_start();
$db = pg_connect("host=localhost dbname=books user=postgres password=123")or die ("Cannot connect to server -------!\n");
$id=$_GET['id'];
$_SESSION['booktrans']=$id;
$query="select * from books where bookid=".$id.";";
$res=pg_query($db,$query);
$ans=pg_fetch_assoc($res);
echo "<table><tr><td>";
echo "<img src =\"".$ans['imagel']."\">";
echo "</td><td><table>";
echo "<tr><td>ISBN</td><td>".$ans['isbn']."</td></tr>\n";
echo "<tr><td>Title</td><td>".$ans['title']."</td></tr>\n";
echo "<tr><td>Author</td><td>".$ans['author']."</td></tr>\n";
echo "<tr><td>Year</td><td>".$ans['year']."</td></tr>\n";
echo "<tr><td>Publisher</td><td>".$ans['publisher']."</td></tr>\n";
echo "<tr><td>Genre</td><td>".$ans['genre']."</td></tr>\n";
echo "</table></td></table><br><br>";
if(isset($_SESSION['rate'])){
		if($_SESSION['rate']==2){echo "Rating saved<br>";}
		else{echo "Please Login<br>";}
		unset($_SESSION['rate']);
	}

echo "
<form name=\"insert\" action=\"rating.php?bid=".$id."\" method=\"POST\" >
Rate<input type=\"number\" name=\"rate\" min=\"0\" max=\"10\"/><input type=\"submit\" />
</form> <br><br>";

$query="select users.userid,firstname,secondname,price,hard,available from users,booksandusers where bookid=".$id."and users.userid=booksandusers.userid;";
$_SESSION['uid']=0;
$userlist=pg_query($db,$query);
echo "<table><tr><td>Provider</td><td>Price</td><td>Hard/Soft</td></tr>";
$t = pg_num_rows($userlist);
$e=pg_fetch_assoc($userlist);

for($r=0;$r<$t;$r++)
{
	if($e['available']!=0){
	echo "<tr>";
		echo "<td>".$e['firstname']." ".$e['secondname']."</td><td>".$e['price']."</td>";
		if($e['hard']==1)
			echo "<td>Hard Copy</td>";
		else
			echo "<td>Soft Copy</td>";
		echo "<td><a href=buy.php?uid=".$e['userid'].">Buy</a></td>";
	echo "</tr>";}
	$e=pg_fetch_assoc($userlist);

}
echo "</table>";

?>