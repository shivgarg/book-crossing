<?php
session_start();
$_SESSION['page']=0;

$isbn=$_POST['isbn'];
	
	if(isset($_POST['genre'])){
	$_SESSION['genre']=$_POST['genre'];}

	if(isset($_POST['title']) && strlen($_POST['title'])>0){
	$_SESSION['intitle']=$_POST['title'];}

	if(isset($_POST['year']) && strlen($_POST['year'])>0){
	$_SESSION['inyear']=$_POST['year'];}

	if(isset($_POST['author']) && strlen($_POST['author'])>0){
	$_SESSION['inauthor']=$_POST['author'];}

	if(isset($_POST['isbn']) && strlen($_POST['isbn'])>0){
	$_SESSION['inisbn']=$_POST['isbn'];}

	if(isset($_POST['yearC']) && strlen($_POST['yearC'])>0){
	$_SESSION['equality']=$_POST['yearC'];}

	$title=isset($_POST['title'])?$_POST['title']:$_SESSION['intitle'];

	$author=isset($_POST['author'])?$_POST['author']:$_SESSION['inauthor'];
	
	$year=isset($_POST['year'])?$_POST['year']:$_SESSION['inyear'];
	
	$yearCond=isset($_POST['='])?isset($_POST['=']):$_SESSION['equality']

	$isbn=isset($_POST['isbn'])?$_POST['isbn']:$_SESSION['inisbn'];
	$asd="books";
	// $yearCond="=";

if(isset($_SESSION['genre']))
{
	$type=$_SESSION['genre'];
	
	switch($type){
				case "Action & Adventure" :
					$asd="action";
					break;
				case "Arts, Film & Photography":
					{	echo("HIHIHI\n");
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

if(isset($_POST['='])){
	$yearCond=$_POST['='];
}

if(isset($_SESSION['='])){
	$yearCond=$_SESSION['='];
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
			$query=$query." WHERE YEAR ". $yearCond." ". $year;
		else
			$query=$query." AND YEAR ". $yearCond." ". $year;
		$prev=true;
	}
	$temp=false;
	if(isset($_GET['sort']))
	{
		switch ($_GET['sort']) {
			case 'isbn':
				$_SESSION['sortisbn']=!$_SESSION['sortisbn'];
				$temp=$_SESSION['sortisbn'];
				break;
			case 'year':
				$_SESSION['sortyear']=!$_SESSION['sortyear'];
				$temp=$_SESSION['sortyear'];
				break;
			case 'author':
				$_SESSION['sortauthor']=!$_SESSION['sortauthor'];
				$temp=$_SESSION['sortauthor'];
				break;
			case 'title':
				$_SESSION['sorttitle']=!$_SESSION['sorttitle'];
				$temp=$_SESSION['sorttitle'];
				break;
			case 'publisher':
				$_SESSION['sortpublisher']=!$_SESSION['sortpublisher'];
				$temp=$_SESSION['sortpublisher'];
				break;
			case 'avgrating':
				$_SESSION['sortrating']=!$_SESSION['sortrating'];
				$temp=$_SESSION['sortrating'];
				break;
			
			default:
				break;
		}
		$query=$query." order by ".$_GET['sort'].($temp?" asc;":" desc;");
	}
	else
	{
		$query=$query." order by avgrating desc;";
	}
	echo $query;

	$db = pg_connect("host=localhost dbname=books user=postgres password=dalal")or die ("Cannot connect to server -------!\n");
	
	$result=pg_query($db,$query) or die ("Cannot process query ---------!\n");
	$_SESSION['cnt']=pg_num_rows($result);
	$ans=array();
	for($i=0;$i<pg_num_rows($result);$i++)
	{
		$row=pg_fetch_assoc($result);
		array_push($ans,$row);
	}
	echo $query;
	$_SESSION['res']=$ans;
	
	header('Location:output.php');
	exit;




?>
