<?php
include("database/db.php");
if (isset($_POST['editMenu'])) {
    $n = $_POST['Category_Name'];
    $s = $_POST['Category_Status'];

    $id = $_POST['id'];



    $sel = "SELECT * FROM category WHERE cat_id ='$id' ";
    $rs = $con->query($sel);
    $row = $rs->fetch_assoc();


    $upd = "UPDATE category SET cat_name='$n', cat_status='$p' WHERE cat_id='$id'";

    if ($con->query($upd)) {
        header("location:admin_dashboard.php");
    }
}
