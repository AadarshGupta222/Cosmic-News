<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='Category';
include('include\Admin_Header.php');
  ?>
 <div style=" margin-left: 25%; margin-top: 10%; width: 50%;">
 	<h3>Write The Name And Description To Update The Existing Category</h3><hr><br>
 
 	<form method="post" name="categoryform" onsubmit="return validateform()">
  <div class="form-group" >
    <label for="email">Category:</label>
    <input type="text" name="category" class="form-control" id="email" value="<?php echo $_GET['category'] ?>">
  </div>
  <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" name="des" rows="5" id="comment"><?php echo $_GET['description'] ?></textarea>
</div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <input type="submit" name="update" class="btn btn-primary" value="Update">
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

if ($_POST['update']) {
  $con=mysqli_connect("localhost:3307","root","","newsportal");
  $category=$_POST['category'];
  $description=$_POST['des'];
  $query="update category set category='$_POST[category]',description='$_POST[des]' where cat_id=$_GET[id]";
  $data=mysqli_query($con,$query);
  if($data)
  { 
    echo "<script>alert('Record Updated')</script>";  ?>
   	<meta http-equiv="refresh" content="0; URL=http://localhost/News Portal/Category.php">
<?php  }
  else
    echo "<script>alert('Unable To Add, Try Again')</script>"; 
}
 ?>




<?php
include('Include\Footer.php');
?>