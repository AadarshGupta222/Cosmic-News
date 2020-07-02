<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='Category';
include('include\Admin_Header.php');

$con=mysqli_connect("localhost:3307","root","","newsportal");
$data=mysqli_query($con,"delete from news where news_id=$_GET[id]");
if($data)
{
	echo "<script>alert('News Deleted')</script>";
	?>
	<meta http-equiv="refresh" content="0; URL=http://localhost/News Portal/News.php">
	<?php
}
else
{
	echo "<script>alert('Unable To Deleted,Try Again')</script>";
	?>
	<meta http-equiv="refresh" content="0; URL=http://localhost/News Portal/News.php">
	<?php
}
?>