<?php
include('database-connect.php');

if(!isset($_SESSION['loginUser_id']))session_start();// Start Session
// Storing Session
$user_check=$_SESSION['loginUser_id'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"select * from admin where userId='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$loggedin_id=$row['userId'];
$loggedin_name =$row['name'];
$loggedin_username =$row['username'];
if(!isset($loggedin_name)){//if the user is not logged in send to index.php
mysqli_close($con); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>