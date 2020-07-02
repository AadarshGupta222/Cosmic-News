<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='Category';
include('include\Admin_Header.php');
  ?>
 <div style=" margin-left: 25%; margin-top: 10%; width: 50%;">
 	<h3>Write The Name And Description To Add A New Category</h3><hr><br>
 
 	<form method="post" name="categoryform" onsubmit="return validateform()">
  <div class="form-group">
    <label for="email">Category:</label>
    <input type="text" name="category" class="form-control" id="email">
  </div>
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" name="des" rows="5" id="comment"></textarea>
</div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>
<script>
  function validateform()
  {
    var x= document.forms['categoryform']['category'].value;
    if(x=="")
    { alert('Category Must Be Filled Out !');
      return false;
    }
  }
</script>
 </div>


 <?php

if ($_POST['submit']) {
  $con=mysqli_connect("localhost:3307","root","","newsportal");
  $category=$_POST['category'];
  $description=$_POST['des'];
  $check=mysqli_query($con,"select * from category where category='$_POST[category]'");
  if(mysqli_num_rows($check))
  {
        echo "<script>alert('This Category is Been Taken Already')</script>";
        exit();
  }
  $query="insert into category(category,description) values ('$category','$description')";
  $data=mysqli_query($con,$query);
  if($data)
  {
    echo "<script>alert('Category Added Successfully')</script>";
  }
  else
    echo "<script>alert('die(mysqli_error()')</script>"; 
}
 ?>








 <?php
include('Include\Footer.php');
?>