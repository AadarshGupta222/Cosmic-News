<?php
session_start();

if(!$_SESSION['email'])
  header('location:Admin_Login.php');
$page='Category';
include('include\Admin_Header.php');
  ?>
 <div style=" margin-left: 25%; margin-top: 10%; width: 50%;">
 	<div  class="text-right">
 		<a href="AddCategory.php"><button class="btn btn-outline-dark">Add Category</button></a><br>

 
 </div>
<?php
$con=mysqli_connect("localhost:3307","root","","newsportal");
$data=mysqli_query($con,"select * from category");
if(mysqli_num_rows($data))
{
	?>
<table class="table table-dark table-hover" style="margin: 10px; padding: 20px;">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th colspan="2">Operations</th>
      </tr>
    </thead>
    <tbody>
<?php
	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
			  <td>$result[cat_id]</td>
			  <td>$result[category]</td>
			  <td>".substr($result[description],0,100)."..."."</td>
			  <td><a href='Update.php?id=$result[cat_id]&category=$result[category]&description=$result[description]'><button class='btn btn-info'>Edit</button></a></td>
			  <td><a href='Delete.php?id=$result[cat_id]' onclick='return confirmd()'><button class='btn btn-danger'>Delete</button></td>
			  </tr>";
	}
	?></tbody>
	</tbody>
	</table><?php
}
?>
<script>
	function confirmd()
	{
		return confirm('Are you sure about deleting the record');
	}
</script>



 <?php
include('Include\Footer.php');
?>