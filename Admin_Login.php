<html>
<head>
<title>Admin Login</title>
<!-- Include CSS File Here -->
<link rel="stylesheet" href="Style\AdminLoginStyle.css"/>
<script>
	var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
function validate(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "Formget" && password == "formget#123"){
alert ("Login successfully");
window.location = "success.html"; // Redirecting to other page.
return false;
}
else{
attempt --;// Decrementing by one.
alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
if( attempt == 0){
document.getElementById("username").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("submit").disabled = true;
return false;
}
}
}
</script>
</head>
<body  align="center">
<div class="container">
<div class="main">
<img src="Images\AdminLogo.jpg" style="padding: 5px;">

<form id="form_id" method="post" name="myform">
<label>User Name :</label>
<input type="text" name="email" class="inp">
<label>Password :</label>
<input type="password" name="password" class="inp">
<input type="submit" name="login" value="Login" class="submit" onclick="validate()"/>
</form>

</div>
</div>
</body>
</html>

<?php
error_reporting(0);
if($_POST['login'])
{
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['password']=$_POST['password'];
	$con=mysqli_connect("localhost:3307","root","","newsportal");
	$query="select  * from admin where email='$_POST[email]' and password='$_POST[password]'";
	$data=mysqli_query($con,$query);
	$count=mysqli_num_rows($data);
	if ($count) {
		header('location:AdminPanel.php');
		# code...
	}
	else
		echo "<script> alert('user not found') </script>";

}
?>