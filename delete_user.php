<?php
include("database/db.php");
$did = $_GET['id'];
$sel = "SELECT * FROM user WHERE uid ='$did' ";
$rs = $con->query($sel);
$row=$rs->fetch_assoc();
$d = "DELETE FROM user WHERE uid ='$did'";
if($con->query($d)){
    header("location:admin_dashboard.php");
}


?>