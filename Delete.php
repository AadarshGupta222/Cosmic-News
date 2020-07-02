<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='Category';
include('include\Admin_Header.php');

  $con=mysqli_connect("localhost:3307","root","","newsportal");
  $query="delete from category where cat_id=$_GET[id]";
  $data=mysqli_query($con,$query);
  if($data)
  {
    echo "<script>alert('Record Deleted')</script>";
    ?>  
  <!--  <meta http-equiv="refresh" content="0; URL=http://localhost/News Portal/Category.php">   -->
  <script>window.location="http://localhost/News Portal/Category.php";</script>
<?php
  }
  else
    echo "<script>alert('Unable To Delete, Try Again')</script>"; 
  ?>
  <meta http-equiv="refresh" content="0; URL=http://localhost/News Portal/News.php">
  <?php
 ?>








 <?php
include('Include\Footer.php');
?>