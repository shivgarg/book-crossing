<html><body>	

<?php

session_start();
if(isset($_SESSION['dup']))
{
	echo "Username already exists<br>";
	unset($_SESSION['dup']);
}

if(isset($_SESSION['dup1']))
{
	echo "NULL Entries are not allowed<br>";
	unset($_SESSION['dup1']);
}
?>

<form name="form2" method="post" action="signup.php">
<fieldset>
<legend>Sign Up</legend>
<table><tr><td>
<label for="fname">First Name </label></td>	<td>		<input name="fname" type="text" id="fname"></td></tr>
<tr><td><label for="lname">Last Name </label>	</td><td> 		<input name="lname" type="text" id="lname"></td></tr>
<tr><td>Gender</td><td
<label for="male">male</label>						<input name="gender" type="radio" id="male" value="male"> 		
<label for="female">female</label>					<input name="gender" type="radio" id="female" value="female"></td></tr><tr><td>
<label for="newuser">Username </label></td><td> 		<input name="newuser" type="text" id="newuser"></td></tr><tr><td>
<label for="newpass">Password </label>	</td>	<td>	<input name="newpass" type="password" id="newpass"></td></tr>
<tr><td>
<label for="email">Email</label>		</td> <td>		<input name="email" type="text" id="email"></td></tr>
<tr><td><label for="add">Address</label>		</td><td> 		<input name="add" type="text" id="add"></td></tr>
<tr><td><label for="city">City</label>		</td><td> 		<input name="city" type="text" id="city"></td></tr>
<tr><td><label for="state">State</label>		</td><td> 		<input name="state" type="text" id="state"></td></tr>
<tr><td><label for="coun">Country</label>		</td><td> 		<input name="coun" type="text" id="coun"></td></tr>
</table>
<input type="submit" name="newsubmit" value="Sign Up">
</fieldset>
</form>
</body>
</html>