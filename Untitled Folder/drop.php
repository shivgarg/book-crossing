<!DOCTYPE html>
<html>
<body>

<form name="search" action="res.php" method="post">
	<label for="genre">Genre:</label>
	<select name="genre" id='genre'>
		<option value="None">None of these</option>
		<option value="Volvo">Volvo</option>
		<option value="Audi">Audi</option>
		<option value="Saab">Saab</option>
		<option value="Opel">Opel</option>
	</select><br>
	
	<label for="isbn">ISBN:</label>
	<input type="text" name="isbn" id="isbn"><br>
	
	<label for="title">Title:</label>
	<input type="text" name="title" id="title"><br>
	
	<label for="author">Author:</label>
	<input type="text" name="author" id="author"><br>

	<label for="year">Year:</label>
	<input type="text" name="year" id="year"><br>
	
	<button type="submit" value="submit">SUBMIT!!</button>
</form>
<?php

?>
</body>