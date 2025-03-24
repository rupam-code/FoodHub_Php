<?php
session_start();
include("database/db.php");

// Check if user is logged in
$id = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
if (!$id) {
    header("location: login.php");
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $m = $_POST['menuId'];
    $n = $_POST['menuName'];
    $p = $_POST['menuPrice'];
    $q = $_POST['menuqty'];

    // Check if the item already exists in the cart
    $check_query = "SELECT * FROM cart WHERE uid='$id' AND mid='$m'";
    $check_result = $con->query($check_query);

    if ($check_result->num_rows > 0) {
        // Item exists in the cart, update the quantity
        $update_query = "UPDATE cart SET qty = qty + $q WHERE uid='$id' AND mid='$m'";
        if ($con->query($update_query)) {
            header("location:menu.php");
            exit();
        } else {
            echo "Error updating cart: " . $con->error;
        }
    } else {
        // Item does not exist, insert a new entry
        $ins = "INSERT INTO cart (uid, mid, name, price, qty) VALUES ('$id', '$m', '$n', '$p', '$q')";
        if ($con->query($ins)) {
            header("location:menu.php");
            exit();
        } else {
            echo "Error adding to cart: " . $con->error;
        }
    }
}
?>
