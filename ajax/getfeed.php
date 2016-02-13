<?php
include('../session.php');
$sql=mysqli_query($con,"select * from newsfeed");
while($row=mysqli_fetch_array($sql))
{
	$nId=$row['nId'];
	echo "<textarea class='editfeed' id='editfeed-$nId' data-id='$nId' >".$row['content']."</textarea>";
	echo "<div   class='updatefeed'  id='updatefeed-$nId' data-id='$nId' >Update</div>";
	echo "<div   class='deletefeed'  id='deletefeed-$nId' data-id='$nId' >Delete</div>";
}
?>