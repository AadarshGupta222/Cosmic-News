<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Style\LoginStyle.css">
</head>
<body class="b" align="center">
	<div class="contnt">
	<h2 style="color: white">LOGIN AND START EXPLORING<br><br>THE WORLD<br>
		
	</h2>
<form method="post" >
	<input class="inp" type="email" name="email" placeholder="Email Id" required><br>
	<input class="inp" type="password" name="pwd" placeholder="Password" required><br>
	<input class="inp" id="btn" type="submit" name="submit" value="LOG IN">
</form>
If You Are New Then <a href="" style="color: white">Sign In</a>
	</div>
</body>
</html>

<?php
if($_POST['submit'])
{
	$pwd=$_POST['pwd'];
	if($pwd == '1')
		echo "<script>alert('You Have Entered Correct Values')</script>";
	else
		echo "<script>alert('Enter Correct Values')</script>";

}
?>