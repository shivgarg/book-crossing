<html>
<head>
<title>
Book Stop
</title></head>
<body>
<form name="genre" method="post" action="output.php" target = "content">
<?php
session_start();
$_SESSION['page']=0;
?>
<input name = "type" type = "radio" id = "Action & Adventure" value="Action & Adventure"><label for="Action & Adventure">Action & Adventure</label> <br>
<input name = "type" type = "radio" id = "Arts, Film & Photography " value="Arts, Film & Photography"><label for="Arts, Film & Photography ">Arts, Film & Photography </label> <br>
<input name = "type" type = "radio" id = "Biographies, Diaries & True Accounts " value="Biographies, Diaries & True Accounts"><label for="Biographies, Diaries & True Accounts ">Biographies, Diaries & True Accounts </label> <br>
<input name = "type" type = "radio" id = "Business & Economics" value="Business & Economics"><label for="Business & Economics">Business & Economics</label> <br>
<input name = "type" type = "radio" id = "Childrens & Young Adult" value="Childrens & Young Adult"><label for="Childrens & Young Adult">Childrens & Young Adult</label> <br>
<input name = "type" type = "radio" id = "Comics & Mangas" value="Comics & Mangas"><label for="Comics & Mangas">Comics & Mangas</label> <br>
<input name = "type" type = "radio" id = "Computing, Internet & Digital Media" value="Computing, Internet & Digital Media"><label for="Computing, Internet & Digital Media">Computing, Internet & Digital Media</label> <br>
<input name = "type" type = "radio" id = "Crafts, Home & Lifestyle" value="Crafts, Home & Lifestyle"><label for="Crafts, Home & Lifestyle">Crafts, Home & Lifestyle</label> <br>
<input name = "type" type = "radio" id = "Crime, Thriller & Mystery " value="Crime, Thriller & Mystery"><label for="Crime, Thriller & Mystery ">Crime, Thriller & Mystery </label> <br>
<input name = "type" type = "radio" id = "Fantasy, Horror & Science Fiction" value="Fantasy, Horror & Science Fiction"><label for="Fantasy, Horror & Science Fiction">Fantasy, Horror & Science Fiction</label> <br>
<input name = "type" type = "radio" id = "Health, Family & Personal Development" value="Health, Family & Personal Development"><label for="Health, Family & Personal Development">Health, Family & Personal Development</label> <br>
<input name = "type" type = "radio" id = "Historical Fiction" value="Historical Fiction"><label for="Historical Fiction">Historical Fiction</label> <br>
<input name = "type" type = "radio" id = "History " value="History"><label for="History ">History </label> <br>
<input name = "type" type = "radio" id = "Humour" value="Humour"><label for="Humour">Humour</label> <br>
<input name = "type" type = "radio" id = "Language, Linguistics & Writing" value="Language, Linguistics & Writing"><label for="Language, Linguistics & Writing">Language, Linguistics & Writing</label> <br>
<input name = "type" type = "radio" id = "Law " value="Law"><label for="Law ">Law </label> <br>
<input name = "type" type = "radio" id = "Literature & Fiction" value="Literature & Fiction"><label for="Literature & Fiction">Literature & Fiction</label> <br>
<input name = "type" type = "radio" id = "Politics" value="Politics"><label for="Politics">Politics</label> <br>
<input name = "type" type = "radio" id = "Reference" value="Reference"><label for="Reference">Reference</label> <br>
<input name = "type" type = "radio" id = "Religion " value="Religion"><label for="Religion">Religion </label> <br>
<input name = "type" type = "radio" id = "Romance" value="Romance"><label for="Romance">Romance</label> <br>
<input name = "type" type = "radio" id = "Sciences, Technology & Medicine " value="Sciences, Technology & Medicine"><label for="Sciences, Technology & Medicine ">Sciences, Technology & Medicine </label> <br>
<input name = "type" type = "radio" id = "Society & Social Sciences " value="Society & Social Sciences"><label for="Society & Social Sciences ">Society & Social Sciences </label> <br>
<input name = "type" type = "radio" id = "Sports " value="Sports"><label for="Sports ">Sports </label> <br>
<input name = "type" type = "radio" id = "Study Aids & Exam Preparations" value="Study Aids & Exam Preparations"><label for="Study Aids & Exam Preparations">Study Aids & Exam Preparations</label> <br>
<input name = "type" type = "radio" id = "Textbooks " value="Textbooks"><label for="Textbooks ">Textbooks </label> <br>
<input name = "type" type = "radio" id = "Travel" value="Travel"><label for="Travel">Travel</label> <br>
<input type ="submit" name="submit" value = "submit">
</form>
</body></html>
