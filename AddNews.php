<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='News';
include('include\Admin_Header.php');
  ?>
  <div style="margin-left: 17%;margin-right:5px; margin-top: 4%; width: 100%;">      
  <ul class="breadcrumb">
    <li class="breadcrumb-item active"><a href="AdminPanel.php">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="News.php">News</a></li>
    <li class="breadcrumb-item active"><a href="AddNews.php">Add News</a></li>
</ul>
</div>
 <div style=" margin-left: 25%; width: 50%;">
 	<h3>Write All The Details About The News</h3><hr><br>
 
 	<form method="post" name="newsform" enctype="multipart/form-data" onsubmit="return validateform()">
    <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="category">Category:</label>
    <select class="form-control" name="category">
      <?php 
        $con=mysqli_connect("localhost:3307","root","","newsportal");
        $data=mysqli_query($con,"select category from category");
        while($result=mysqli_fetch_assoc($data))
        {
      ?>
      <option><?php echo $result['category'] ?></option>
    <?php } ?>
    </select>
  </div>
  <div class="form-group">
  <label for="description">Description:</label>
  <textarea class="form-control" name="des" rows="5" id="comment"></textarea>
</div>
<div class="form-group">
    <label for="thumbnail">Thumbnail:</label>
    <input type="file" name="thumbnail" class="form-control img-thumbnail" id="email">
  </div>
<div class="form-group">
    <label for="date">Date :</label>
    <input type="date" name="date" class="form-control" id="email">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>
<script>
  function validateform()
  {
    var x= document.forms['newsform']['category'].value;
    var y= document.forms['newsform']['des'].value;
    var z= document.forms['newsform']['title'].value;
    var w= document.forms['newsform']['date'].value;
    if(x=="" || y=="" || z=="" || w=="")
    { alert('All The Fields Must Be Filled Out !');
      return false;
    }
  }
</script>
 </div>


 <?php

if (isset($_POST['submit'])) {

  $title=$_POST['title'];
  $category=$_POST['category'];
  $description=$_POST['des'];
  $date=$_POST['date'];
  $filename=$_FILES['thumbnail']['name'];
  $tmpname=$_FILES['thumbnail']['tmp_name'];
  $folder='Images/'.$filename;
  move_uploaded_file($tmpname,$folder);
  $con=mysqli_connect("localhost:3307","root","","newsportal");
  $data=mysqli_query($con,"insert into news (title,description,category,date,thumbnail) values ('$title','$description','$category','$date','$folder')");
  if($data)
  {
    echo "<script>alert('News Uploaded')</script>";
  }
  else
  {
    echo "<script>alert('Unable To Upload,Try Again')</script>";
  }
}
 ?>








 <?php
include('Include\Footer.php');
?>