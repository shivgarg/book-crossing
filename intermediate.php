<?php
session_start();

$_SESSION['page']=0;

	$yearCond='=';
	$isbn=$_POST['isbn'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$year=$_POST['year'];
	$asd="books";
	if(isset($_POST['genre'])){
	$_SESSION['genre']=$_POST['genre'];}

if(isset($_SESSION['genre']))
{
	$type=$_SESSION['genre'];
	
	switch($type){
				case "Action & Adventure" :
					$asd="action";
					break;
				case "Arts, Film & Photography":
					{	
						$asd = "arts";
										break;}
				case "Biographies, Diaries & True Accounts":
					$asd="biographies";
					break;
				case "Business & Economics":
					$asd="business";
					break;
				case "Childrens & Young Adult":
					$asd="child";
					break;
				case "Comics & Mangas":
					$asd="comics";
					break;
				case "Computing, Internet & Digital Media":
					$asd="computing";
					break;
				case "Crafts, Home & Lifestyle":
					$asd="crafts";
					break;
				case "Crime, Thriller & Mystery":
					$asd="crime";
					break;
				case "Fantasy, Horror & Science Fiction":
					$asd="fantasy";
					break;
				case "Health, Family & Personal Development":
					$asd = "health";
					break;
				case "Historical Fiction":
					$asd="historical";
					break;
				case "History":
					$asd="history";
					break;
				case "Humour":
					$asd ="humour";
					break;
				case "Language, Linguistics & Writing":
					$asd="lang";
					break;
				case "Law":
					$asd="law";
					break;
				case "Literature & Fiction":
					$asd = "lit";
					break;
				case "Politics":
					$asd="politics";
					break;
				case "Reference":
					$asd="reference";
					break;
				case "Religion":
					$asd="religion";
					break;
				case "Romance":
					$asd="romance";
					break;
				case "Sciences, Technology & Medicine":
					$asd="science";
					break;
				case "Society & Social Sciences":
					$asd="society";
					break;
				case "Sports":
					$asd="sports";
					break;
				case "Study Aids & Exam Preparations":
					$asd="study";
					break;
				case "Textbooks":
					$asd="textbooks";
					break;
				case "Travel":
					$asd="travel";
					break;
				case "books":
					$asd="books";
					break;
				default:$asd="books";
					break;

	}
	

	
}
if(isset($_POST['=']))
{
	$yearCond=$_POST['='];
}

$prev=false;
	$query="SELECT * FROM ".$asd;

if(strlen($isbn)>0)
	{
		$query=$query." WHERE ISBN = ".$isbn;
		$prev=true;
	}
	
	if(strlen($author)>0)
	{
		// if(!$prev)
		// 	$query=$query." WHERE AUTHOR ilike '%".$author."%'";
		// else
		// 	$query=$query." AND AUTHOR ilike '%".$author."%'";
		// $prev=true;
		if(!$prev)
			{


				//$query=$query." WHERE TITLE ilike '%".$title."%'";
				$piece= explode(" ",$author);
				$query=$query." WHERE AUTHOR ilike '%".$piece[0]."%'";
				for($i=1;$i<count($piece);$i++)
				{
						$query=$query." AND AUTHOR ilike '%".$piece[$i]."%'";
				}



		}
		else
		{
			$piece= explode(" ",$author);
				$query=$query." AND AUTHOR ilike '%".$piece[0]."%'";
				for($i=1;$i<count($piece);$i++)
				{
						$query=$query." AND AUTHOR ilike '%".$piece[$i]."%'";
				}
		}
		$prev=true;
	}

	if(strlen($title)>0)
	{
		if(!$prev)
			{


				//$query=$query." WHERE TITLE ilike '%".$title."%'";
				$piece= explode(" ",$title);
				$query=$query." WHERE TITLE ilike '%".$piece[0]."%'";
				for($i=1;$i<count($piece);$i++)
				{
						$query=$query." AND TITLE ilike '%".$piece[$i]."%'";
				}



		}
		else
		{
			$piece= explode(" ",$title);
				$query=$query." AND TITLE ilike '%".$piece[0]."%'";
				for($i=1;$i<count($piece);$i++)
				{
						$query=$query." AND TITLE ilike '%".$piece[$i]."%'";
				}
		}
		$prev=true;
	}

	if(strlen($year)>0)
	{
		if(!$prev)
			$query=$query." WHERE YEAR".$yearCond." ".$year;
		else
			$query=$query." AND YEAR ".$yearCond." ".$year;
		$prev=true;
	}

	$query=$query." order by avgrating desc;";

if($query=='SELECT * FROM books order by avgrating desc;')
{
	echo "<center>Invalid Query</center>";
}
else
	{$db = pg_connect("host=localhost dbname=books user=postgres password=123")or die ("Cannot connect to server -------!\n");
		
		$result=pg_query($db,$query) or die ("Cannot process query ---------!\n");
		$_SESSION['cnt']=pg_num_rows($result);
		$ans=array();
		for($i=0;$i<pg_num_rows($result);$i++)
		{
			$row=pg_fetch_assoc($result);
			array_push($ans,$row);
		}
	
		$_SESSION['res']=$ans;
		
		header('Location:output.php');
		exit;
	
	}


?>
