<?php
include('database-connect.php');
$error="";
session_start();
if (isset($_POST['login-submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is empty";
}
else{
$uid=0;
$result = mysqli_query($con,"SELECT * FROM admin WHERE username='".mysqli_real_escape_string($con,$_POST['username'])."' AND pass='".mysqli_real_escape_string($con,$_POST['password'])."'");
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

  if($rows== 1){//authentication validated
  $uid=$row['userId'];
  //setcookie("userId",$uid,'/');
  $_SESSION['loginUser_id']=$uid;
  header("location: admin.php");
  }
  else
  {
    $error="Username or Password is invalid";
  }
mysqli_close($con);
}//end of else
}//end of if (isset($_POST['submit']))


?>

<body>
<h1>Login</h1>
<form name="login" action="" method="post" >
<input type="text" name="username"></input><br>
<input type="password" name="password"></input><br>
<input type="submit" name="login-submit" ></input>
<span><?php echo $error; ?></span>
</form>
</body>
