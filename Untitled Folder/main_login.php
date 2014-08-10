<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<form name="form2" method="post" action="signup.php">
<fieldset>
<legend>Sign Up</legend>
<label for="fname">First Name </label>		: 		<input name="fname" type="text" id="fname"><br>
<label for="lname">Last Name </label>		: 		<input name="lname" type="text" id="lname"><br>
Gender :
<label for="male">male</label>						<input name="gender" type="radio" id="male" value="male"> 		
<label for="female">female</label>					<input name="gender" type="radio" id="female" value="female"><br>
<label for="newuser">Username </label>		: 		<input name="newuser" type="text" id="newuser"><br>
<label for="newpass">Password </label>		: 		<input name="newpass" type="password" id="newpass"><br>
<label for="email">Email</label>		: 		<input name="email" type="text" id="email"><br>
<label for="add">Address</label>		: 		<input name="add" type="text" id="add"><br>
<label for="cntry">Country</label>		: 		<input name="cntry" type="text" id="cntry"><br>
<input type="submit" name="newsubmit" value="Sign Up">
</fieldset>
</form>