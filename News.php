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
    <li class="breadcrumb-item"><a href="News.php">News</a></li>
</ul>
</div>

 <div style=" margin-left: 25%; width: 50%;">
 	<div  class="text-right">
 		<a href="AddNews.php"><button class="btn btn-outline-dark">Add News</button></a><br>
 </div>
<?php
$con=mysqli_connect("localhost:3307","root","","newsportal");
$page=isset($_GET['page']) ? $_GET['page']:'';
if($page=='' || $page=='1')
{
	$page1=0;
}
else
{
	$page1=($page*3)-3;
}
$data=mysqli_query($con,"select * from news limit $page1,3");
if(mysqli_num_rows($data))
{
	?>
<table class="table table-dark table-hover" style="margin: 10px; padding: 20px;">
    <thead>
      <tr>
        <th>News Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Date</th>
        <th>Thumbnail</th>
        <th colspan="2">Operations</th>
      </tr>
    </thead>
    <tbody>
<?php
	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
			  <td>$result[news_id]</td>
			  <td>$result[title]</td>
			  <td>".substr($result[description],0,100)."..."."</td>
			  <td>$result[category]</td>
			  <td>".date("F jS ,y",strtotime($result['date']))."</td>
			<td><img src='$result[thumbnail]' height=100px width=100px></td>
			  <td><a href='NewsUpdate.php?id=$result[news_id]&title=$result[title]&description=$result[description]&date=$result[date]&thumbnail=$result[thumbnail]'><button class='btn btn-info'>Edit</button></a></td>
			  <td><a href='NewsDelete.php?id=$result[news_id]' onclick='return confirmd()'><button class='btn btn-danger'>Delete</button></td>
			  </tr>";
	}
	$sql=mysqli_query($con,"select * from news");
	$count=mysqli_num_rows($sql);
	$a=ceil($count/3);
	for ($b=1; $b<=$a ; $b++) { 
		?>
	</tbody>
	</table>
	<ul class="pagination">
		<li class="page-item"><a class="page-link" href="News.php?page=<?php echo $b ?>"><?php echo $b ?></a></li>
	<?php	
	}
	?> 	
	</ul>
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