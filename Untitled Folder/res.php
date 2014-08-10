<!DOCTYPE html>
<html>
<body>

<?php
	echo "isbn".($_POST['isbn'])."<br>";
	echo "genre".($_POST['genre'])."<br>";
	echo "title".($_POST['title'])."<br>";
	echo "author".($_POST['author'])."<br>";
	echo "year".($_POST['year'])."<br>";

	$isbn=$_POST['isbn'];
	$genre=$_POST['genre'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$year=$_POST['year'];

	$prev=false;
	$query="SELECT * FROM ";

	/******************************************************/
	/******************************************************/
	/******************* ADD GENRE ************************/
	/******************************************************/
	/******************************************************/

	if(strlen($isbn)>0)
	{
		$query=$query." WHERE ISBN = ".$isbn;
		$prev=true;
	}
	
	if(strlen($author)>0)
	{
		if(!$prev)
			$query=$query." WHERE AUTHOR ilike '%".$author."%'";
		else
			$query=$query." AND AUTHOR ilike '%".$author."%'";
		$prev=true;
	}

	if(strlen($title)>0)
	{
		if(!$prev)
			$query=$query." WHERE TITLE ilike '%".$title."%'";
		else
			$query=$query." AND TITLE ilike '%".$title."%'";
		$prev=true;
	}

	if(strlen($year)>0)
	{
		if(!$prev)
			$query=$query." WHERE YEAR = ".$year;
		else
			$query=$query." AND YEAR = ".$year;
		$prev=true;
	}

	$query=$query.";";

	echo "<br>$query<br>";
?>
</body>