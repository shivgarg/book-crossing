<?php
session_start();
if(isset($_GET['cat'])){$_SESSION['cat']=$_GET['cat'];
}
else{
	$_SESSION['cat']=0;
}
?>
<a href="abc.php?cat=1">Set cat to 1</a>
<a href="abc.php?cat=2">Set cat to 2</a>
Cat is : <?php echo $_SESSION['cat'] ?>