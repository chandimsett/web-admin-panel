<?php
include('../session.php');
$id=mysqli_escape_string($con,$_POST['id']);
if(!empty($_POST['id'])){
	$sql=mysqli_query($con,"DELETE FROM newsfeed WHERE nId='$id'");
	echo "Successfuly Deleted!";
}
else{
	echo "Error!";
}
?>