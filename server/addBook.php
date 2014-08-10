
<?php

session_start();
if(!isset($_SESSION['userid']))
{
	echo "Please Login first";
}

session_start();


if(strlen($_POST['isbn'])>0 && strlen($_POST['title'])>0 && strlen($_POST['year'])>0   ){
	
	
	$db = pg_connect("host=localhost dbname=books user=postgres password=123")
	or die ("Cannot connect to server -------!\n");
	$dupcheck="begin;select * from books where isbn='".$_POST['isbn']."';";
	$op=pg_query($db,$dupcheck);
	if(pg_num_rows($op)==1)
	{
		$er=pg_fetch_assoc($op);
		$id=$er['bookid'];
		$que="SELECT * FROM booksandusers WHERE userid=".$_SESSION['u2id']." and bookid=$id;";
		$getAns=pg_query($db,$que) or die("Could not fetch books and users data");
		if(pg_num_rows($getAns)==1)
		{
			$que="update booksandusers set available=available+".$_POST['copies']." where bookid=$id";
			pg_query($db,$que) or die ("Could not update BooksAndUsers table\n");
		}
		else
		{
			$que="insert into booksandusers values($id,'".$_SESSION['u2id']."','".$_POST['price']."','".$_POST['copies']."','".$_POST['hard']."');";
			
			pg_query($db,$que) or die ("Could not insert in BooksAndUsers table\n");	
		}
	}
	else
	{
		$que="insert into books (isbn,title,year,publisher,genre,imagel,avgrating) 
			values('".$_POST['isbn']."','".$_POST['title']."','".$_POST['year']."','".$_POST['publisher']."','".$_POST['genre']."','".$_POST['link']."','0');
			select * from books where isbn='".$_POST['isbn']."';";
		$sd=pg_query($db,$que);
		$ans=pg_fetch_assoc($sd);
		$id=$ans['bookid'];
		$que="insert into booksandusers values($id,'".$_SESSION['u2id']."','".$_POST['price']."','".$_POST['copies']."','".$_POST['hard']."');";
	
		pg_query($que) or die ("Could not insert in BooksAndUsers12 table\n");
	}

	$que="commit;";
	pg_query($db,$que);


	unset($_POST['isbn']);
	unset($_POST['title']);
	unset($_POST['author']);
	unset($_POST['publisher']);
	unset($_POST['year']);
	unset($_POST['genre']);
	unset($_POST['link']);
}
else{
	$result = strlen($_POST['isbn'])==0 ? 'Book Id is required. <br>' : ''  ;
	$result = strlen($_POST['title'])==0? $result. 'title is required. <br>' : $result ;
	$result = strlen($_POST['author'])==0? $result. 'author is required. <br>' : $result ;
	$result =strlen($_POST['publisher'])==0? $result. 'publisher is required. <br>' : $result ;
	$result =strlen($_POST['year'])==0? $result. 'year is required. <br>' : $result ;
	$result =strlen($_POST['genre'])==0? $result. 'genre is required. <br>' : $result ;
	$result =strlen($_POST['link'])==0? $result. 'link is required. <br>' : $result ;
		
	// echo "<font color='red'>" .$result."</font>";
}


?>

</head>
<body>
<h2>upload new book</h2>
<ul>
<fieldset>
<form name="insert" action="addBook.php" method="POST" >
Book ISBN *:<input type="text" name="isbn" /> <br>
Book title *:<input type="text" name="title" /> <br>
Author *:<input type="text" name="author" /> <br>
Publisher *:<input type="text" name="publisher" /> <br>
Year *:<input type="text" name="year" /> <br>
Price (USD) *:<input type="text" name="price" /> <br>
Copies *:<input type="number" name="copies" min="1" max="20"/> <br>
Genre *:<input type="text" name="genre" /> <br>
Link *:<input type="text" name="link" /> <br>
Type *:<select name="hard">
	<option value="1">hard</option>
	<option value="2">soft</option>
</select>
<input type="submit" />
</form>
</fieldset>
</ul>
</body>
</html>

<?php
echo ("<br><a href='hi.php'> Back to profile </a>  <br>");

?>
