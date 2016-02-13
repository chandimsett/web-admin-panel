<?php
include('../session.php');
$id=mysqli_escape_string($con,$_POST['id']);
$content=mysqli_escape_string($con,$_POST['content']);
if(!empty($_POST['id'])&&!empty($_POST['content'])){
	$sql=mysqli_query($con,"UPDATE newsfeed SET content='$content' WHERE nId='$id'");
	echo "Successfuly Updated!";
}
else{
	echo "Error!";
}
?>