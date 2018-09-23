<?php
session_start();
include("../connection/connect.php");
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
//$password = password_hash($password,PASSWORD_BCRYPT);
if($username && $password)
{
//$add="SELECT * From user WHERE Username='".$username."' AND Password='".$password."'";
$add="SELECT name,password FROM user WHERE name='".$username."' AND password='".$password."'";
$query=mysqli_query($conn,$add);
$numrow = mysqli_num_rows($query);
	if ($numrow!=0)
	{
		$rows=mysqli_fetch_assoc($query);
		$Name = $rows['name'];
		$_SESSION['name'] = $Name;
		include("../connection/close.php");
		header('Location: timetable.php');
	}
	else{
	include("../connection/close.php");
	header('Location: login.php?error=1');
	//echo $add;
	}
	}
else{
   die("Please enter your username and Password!");
}
?>
