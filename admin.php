<!DOCTYPE html>
<html lang="en">
<head>
<script src="code/jquery.min.js"></script>
<script src="code/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="adminpage.css">
<style>

</style>
<script>
$(document).ready(function(){
    $(".updatefeed").click(function(){
       	var id = $(this).attr("data-id");		
		var content=$("textarea#editfeed-"+id).val();
		var info = 'id=' + id+"&content="+content;
		$.ajax({
		type: "POST",
		url: "ajax/updatenewsfeed.php",
		data: info,
		success: function(response){
		 alert(response);
		}
		});	
    });
     $(".deletefeed").click(function(){
       	var id = $(this).attr("data-id");		
		var info = 'id=' + id;
		$.ajax({
		type: "POST",
		url: "ajax/deletefeed.php",
		data: info,
		success: function(response){
		 alert(response);
		 $("#feed-"+id).hide();
		}
		});	
    });
     $(".addfeed").click(function(){
       	var content="content="+$("textarea#newaddfeed").val();
		$.ajax({
		type: "POST",
		url: "ajax/addfeed.php",
		data: content,
		success: function(response){
		 alert(response);
		 location.reload(true);
		}
		});	
    });
});
/*function updatenewsfeed() {
  $.get("ajax/getfeed.php", function(data) {
    $("#editor").html(data);
  }); 
  window.setTimeout(updatenewsfeed, 5000);
}
//updatenewsfeed();*/
</script>
</head>
<title>ADMIN PANEL</tiTle>
<body>
<?php
include('session.php');
echo "<h1 style='text-align:center'>Welcome ".$loggedin_name."</h1>";
echo "<div style='text-align: right'><a href='logout.php' '>Logout</a></div>";
echo "<table border='0' style='width:100%'><tr><th style='width:50%'><h3 style='text-align:center'>Feedback</h3></th><th style='width:50%'><h3 style='text-align:center'>NewsFeed</h3></th></tr>";
echo "<td style='width:50%' valign='top'>";
echo "<div id='feedback'>";
$sql=mysqli_query($con,"select * from feedback");
while($row=mysqli_fetch_array($sql))
{
	echo htmlspecialchars($row['name'])."<br>".htmlspecialchars($row['email'])."<br>".htmlspecialchars($row['content'])."<br>";
}
echo "</td>";

echo "<td style='width:50%' >";
echo "</div><div id='editor' style='padding:10px'>";
$sql=mysqli_query($con,"select * from newsfeed");
while($row=mysqli_fetch_array($sql))
{
	$nId=$row['nId'];
	echo "<div class='feed'  id='feed-$nId'>";
	echo "<br><textarea class='editfeed' id='editfeed-$nId' data-id='$nId' >".$row['content']."</textarea><br>";
	echo "<div   class='updatefeed'  id='updatefeed-$nId' data-id='$nId' >Update</div>";
	echo "<div   class='deletefeed'  id='deletefeed-$nId' data-id='$nId' >Delete</div>";
	echo "</div>";
}
echo "</td></tr></table>";
echo "</div><div class='newfeed' style='margin-left:51%;'><h3>Add a new feed</h3>";
echo "<textarea id='newaddfeed'></textarea>";
echo "<div  class='addfeed' >Add a feed</div></div>";

?>
</body>




