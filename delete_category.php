<?php 
include("database/db.php");
$did = $_GET['id'];
$sel = "SELECT * FROM category WHERE cat_id ='$did' ";
$rs = $con->query($sel);
$row=$rs->fetch_assoc();
$d = "DELETE FROM category WHERE cat_id='$did'";
if($con->query($d)){
header("location:admin_dashboard.php");
}

?>