<?php
//if ( retun confirm("Condemn this asset?") == true) {
	session_start();
	if(!isset($_SESSION['name'])){
	header('Location: login.php', true);
	}
include("../connection/connect.php");
$id = $_GET['id'];
$type = $_GET['type'];
$sql = "Update ".$type." SET condemned='y' WHERE srno='".$id."'";
//echo $sql;
mysqli_query($conn,$sql) or die(mysqli_error());
include("../connection/close.php");
//}
//header("location:javascript://history.go(-1)");
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
//header("Location: batchlist.php?Class=".$Class."&Batch=".$Batch."&Subid=".$Subid);
?>