<form method="post" enctype="multipart/form-data">

<input type="file" name="thum">
<input type="submit" name="submit" value="upload">

</form>

<?php
error_reporting(0);
if($_POST['submit'])
{
	$name=$_FILES['thum']['name'];
	$tmpname=$_FILES['thum']['tmp_name'];
	$folder="Images/".$name;
	move_uploaded_file($tmpname, $folder);
	echo "<img src='$folder'>";
}
?>
