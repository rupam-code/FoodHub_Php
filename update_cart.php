<?php
include("database/db.php");

$id = $_GET['id']; // Cart ID
$newQty = $_POST['qty']; // New quantity from the form

// Check if the cart item exists
$sel = "SELECT * FROM cart WHERE cart_id = '$id'";
$rs = $con->query($sel);

if ($rs->num_rows > 0) {
    // Update quantity with the provided value
    $upd = "UPDATE cart SET qty = '$newQty' WHERE cart_id = '$id'";
    if ($con->query($upd)) {
        echo "Quantity updated successfully.";
        header("Location: cart.php"); // Redirect back to the cart page
        exit();
    } else {
        echo "Error updating quantity: " . $con->error;
    }
} else {
    echo "Item not found in the cart.";
}
?>
