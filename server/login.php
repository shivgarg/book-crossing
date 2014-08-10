<html><body>

<?php 
session_start();

if(isset($_GET['msg']))
{
	echo "Invalid Username and Password\n";
	unset($_GET['msg']);
}
if(!isset($_SESSION['userid']))
{
	echo "<form action=\"checklogin.php\" method=post>
		  <table>
		  <tr>
		  	<td>UserName</td>	
		  	<td>Password</td>
		  </tr>
		  <tr>
		  	<td><input name=\"myusername\" type=\"text\" id=\"myusername\"></td>
		  	<td><input name=\"mypassword\" type=\"password\" id=\"mypassword\"></td>
		  	<td><input type=\"submit\" value=\"Log in\"></td>
		  </tr>
		  <tr>
		  <td> Don't have an Account?</td>
		  <td> <a href='main_login.php' target=content>Sign Up</a></td></tr>

		  </table>
		  </form>";
		 
}
else
{
	$id = $_SESSION['userid'];

	$db = pg_connect("host=localhost dbname=books user=postgres password=123")
		or die ("Cannot********* connect to server!\n");

	$sql = "SELECT * FROM users WHERE username = '$id'";
	$result = pg_query($db,$sql);

	if(!$result){
		echo "na error occured.\n";
		exit();
	}
	else {
		$row= pg_fetch_assoc($result);
	}
	echo "<a href=\"hi.php\" target=\"content\">".$row['firstname']." ".$row['secondname']."</a>";
	echo "<span style=\"float:right\"><a href='Logout.php'><u>Logout</u></span><br>";
	echo ("<a href='addBook.php' target='content'> <b>Add books<b> </a>&nbsp;&nbsp;&nbsp;&nbsp; ");
	echo ("<a href='bought.php' target='content'><b>Bought Books</b></a>&nbsp;&nbsp;&nbsp;&nbsp;");
	echo ("<a href='sold.php' target='content' > <b> Sold Books</b></a>&nbsp;&nbsp;&nbsp;&nbsp;");
	echo ("<a href ='cur.php' target='content'><b>Current Books</b></a>&nbsp;&nbsp;&nbsp;&nbsp;");
	echo ("<a href ='deleteacc.php' target='re'><b>Delete account</b></a>");
	
}
?>
</body>
</html>