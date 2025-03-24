<?php
include("database/db.php");
$did = $_GET['did'];
$sel = "SELECT * FROM menu WHERE mid ='$did' ";
$rs = $con->query($sel);
$row=$rs->fetch_assoc();
unlink("menuImage/".$row['menuImage']);
$d = "DELETE FROM menu WHERE mid ='$did'";
if($con->query($d)){
    header("location:show_menu.php");
}


?>