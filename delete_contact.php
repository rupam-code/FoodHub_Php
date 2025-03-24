<?php 
include("database/db.php");
$did = $_GET['id'];
$sel = "SELECT * FROM contact_us WHERE contact_id ='$did' ";
$rs = $con->query($sel);
$row=$rs->fetch_assoc();
$d = "DELETE FROM contact_us WHERE contact_id='$did'";
if($con->query($d)){
header("location:admin_dashboard.php");
}

?>