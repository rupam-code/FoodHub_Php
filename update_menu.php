<?php
include("database/db.php");
if (isset($_POST['editMenu'])) {
    $n = $_POST['menuName'];
    $p = $_POST['menuPrice'];
    $d = $_POST['menuDescription'];
    $cat_id = $_POST['cat_id'];
    $id = $_POST['id'];

    if ($_FILES['menuImage']['tmp_name'] != "") {
        $img = $_FILES['menuImage']['tmp_name'];
        $imgFn = time() . '' . $_FILES['menuImage']['name'];
        move_uploaded_file($img, "menuImage/" . $imgFn);

        // Remove old image
        $sel = "SELECT * FROM menu WHERE mid ='$id'";
        $rs = $con->query($sel);
        $row = $rs->fetch_assoc();
        if (file_exists("menuImage/" . $row['menuImage'])) {
            unlink("menuImage/" . $row['menuImage']);
        }

        $upd = "UPDATE menu SET menuName='$n', menuPrice='$p', menuDescription='$d', menuImage='$imgFn', cat_id='$cat_id' WHERE mid ='$id'";
    } else {
        $upd = "UPDATE menu SET menuName='$n', menuPrice='$p', menuDescription='$d', cat_id='$cat_id' WHERE mid ='$id'";
    }

    if ($con->query($upd)) {
        header("location:show_menu.php");
    } else {
        echo "Error updating menu: " . $con->error;
    }
}
?>
