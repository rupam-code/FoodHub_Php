<?php
include("database/db.php");
if(isset($_POST['save'])){
    $n = $_POST['fullname'];
    $e = $_POST['email'];
    $p = $_POST['phone'];
    $m = $_POST['message'];
    
    $ins = "INSERT INTO contact_us SET contact_name='$n', contact_email='$e', contact_phone='$p', contact_messege='$m'";
    if($con->query($ins)){
        header("location:contact_us.php");
    }
}

?>