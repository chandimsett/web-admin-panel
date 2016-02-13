<?php
include('../session.php');
$content=mysqli_escape_string($con,$_POST['content']);
if(!empty($_POST['content'])){
	$sql=mysqli_query($con,"INSERT INTO newsfeed(content) VALUES('$content')");
	echo "Successfuly Added!";
}
else{
	echo "Error!";
}
?>