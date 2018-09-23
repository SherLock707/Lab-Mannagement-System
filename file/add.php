<?php
include("../connection/connect.php");
if($_POST['type']=='Consumable' || $_POST['type']=='Non_Consumable') {
$name = stripslashes($_POST['name']);
$indent_no = stripslashes($_POST['indent_no']);
$book_no = stripslashes($_POST['book_no']);
$quantity = stripslashes($_POST['quantity']);
$supplier_name = stripslashes($_POST['supplier_name']);
$store_indent_no = stripslashes($_POST['store_indent_no']);
$bill_no = stripslashes($_POST['bill_no']);
$bill_no_date = stripslashes($_POST['bill_no_date']);
$price = stripslashes($_POST['price']);
$balance = stripslashes($_POST['balance']);
$signed_by = stripslashes($_POST['signed_by']);
$remark = stripslashes($_POST['remark']);
$type = stripslashes($_POST['type']);
$labid = stripslashes($_POST['labid']);
//$sql  = "INSERT INTO `experiment` (`Expno`, `Title`, `Subid`, `Tid`, `Start_date`, `End_date`) VALUES ({$Expno},'{$Title})',
$sql  = "INSERT INTO `".$type."` (`labid`, `name`, `indent_no`, `book_no`, `quantity`, `supplier_name`, `store_indent_no`, `bill_no`, `bill_no_date`, `price`, `balance`, `signed_by`, `remark`) VALUES ('{$labid}','{$name}','{$indent_no}','{$book_no}','{$quantity}','{$supplier_name}','{$store_indent_no}','{$bill_no}','{$bill_no_date}','{$price}','{$balance}','{$signed_by}','{$remark}')";
} else {
$name = stripslashes($_POST['name']);
$quantity = stripslashes($_POST['quantity']);
$colour = stripslashes($_POST['colour']);
$type = stripslashes($_POST['type']);
$labid = stripslashes($_POST['labid']);
$sql  = "INSERT INTO `furniture` (`labid`, `name`, `quantity`, `colour`, `type`) VALUES ('{$labid}','{$name}','{$quantity}','{$colour}','{$type}')";
}
//echo $bill_no_date;
//echo $sql;
mysqli_query($conn,$sql) or die("could not execute insert");
include("../connection/close.php");
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>