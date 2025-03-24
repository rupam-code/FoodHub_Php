<?php 
include("database/db.php");
$did = $_GET['id'];
$sel = "SELECT * FROM cart WHERE cart_id ='$did' ";
$rs = $con->query($sel);
$row=$rs->fetch_assoc();
$d = "DELETE FROM cart WHERE cart_id='$did'";
if($con->query($d)){
header("location:cart.php");
}

?>