<?php
	$_SESSION['sortisbn']=false;
	$_SESSION['sorttitle']=false;
	$_SESSION['sortauthor']=false;
	$_SESSION['sortpublisher']=false;
	$_SESSION['sortyear']=false;
	$_SESSION['sortrating']=true;
?>
<html>
<head>
<title>
Book Stop
</title></head>
<body>
<form name="genre" method="post" action="intermediate.php" target = "content">
<select name="genre" id='genre'>
<option value="books">Select Genre</option> <br>
<option value="Action & Adventure">Action & Adventure</option> <br>
<option value="Arts, Film & Photography">Arts, Film & Photography </option> <br>
<option value="Biographies, Diaries & True Accounts">Biographies, Diaries & True Accounts </option> <br>
<option value="Business & Economics">Business & Economics</option> <br>
<option value="Childrens & Young Adult">Childrens & Young Adult</option> <br>
<option value="Comics & Mangas">Comics & Mangas</option> <br>
<option value="Computing, Internet & Digital Media">Computing, Internet & Digital Media</option> <br>
<option value="Crafts, Home & Lifestyle">Crafts, Home & Lifestyle</option> <br>
<option value="Crime, Thriller & Mystery">Crime, Thriller & Mystery </option> <br>
<option value="Fantasy, Horror & Science Fiction">Fantasy, Horror & Science Fiction</option> <br>
<option value="Health, Family & Personal Development">Health, Family & Personal Development</option> <br>
<option value="Historical Fiction">Historical Fiction</option> <br>
<option value="History">History </option> <br>
<option value="Humour">Humour</option> <br>
<option value="Language, Linguistics & Writing">Language, Linguistics & Writing</option> <br>
<option value="Law">Law </option> <br>
<option value="Literature & Fiction">Literature & Fiction</option> <br>
<option value="Politics">Politics</option> <br>
<option value="Reference">Reference</option> <br>
<option value="Religion">Religion </option> <br>
<option value="Romance">Romance</option> <br>
<option value="Sciences, Technology & Medicine">Sciences, Technology & Medicine </option> <br>
<option value="Society & Social Sciences">Society & Social Sciences </option> <br>
<option value="Sports">Sports </option> <br>
<option value="Study Aids & Exam Preparations">Study Aids & Exam Preparations</option> <br>
<option value="Textbooks">Textbooks </option> <br>
<option value="Travel">Travel</option> <br>
</select>
<br><b><table><tr><td>
	<label for="isbn">ISBN:</label></td><td>
	<input type="text" name="isbn" id="isbn"></td></tr><tr><td>
	<label for="title">Title:</label></td><td>
	<input type="text" name="title" id="title"></td></tr><tr><td>
	
	<label for="author">Author:</label></td><td>
	<input type="text" name="author" id="author"></td></tr><tr><td>

	<label for="year">Year:</label></td><td>
	<input type="text" name="year" id="year">

	<select name="=" id='yearC'>
		<option value="=">=</option> <br>
		<option value="<"><</option> <br>
		<option value=">">></option> <br>
	</select> </td></tr></table>

<input type ="submit" name="submit" value = "submit">
</form>
</body></html>
