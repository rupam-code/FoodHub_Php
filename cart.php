<?php
session_start();
include("database/db.php");
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Food Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .h-custom {
            min-height: 100vh;
        }

        .summary {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-dark {
            background-color: #ff5722;
            border-color: #ff5722;
        }

        .btn-dark:hover {
            background-color: #e64a19;
            border-color: #e64a19;
        }

        /* Modal Customization */
        .modal-content {
            border-radius: 15px;
            background: linear-gradient(135deg, #ff5722, #e64a19);
            color: white;
            text-align: center;
        }

        .modal-body h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .modal-body p {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <?php include("./fontend/navbar.php"); ?>

    <section class="h-100 h-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="p-4">
                                        <h1 class="fw-bold mb-4" style="color: #ff5722;">Shopping Cart</h1>
                                        <hr>

                                        <!-- Display cart items -->
                                        <?php
                                        $sel = "SELECT cart.*, menu.menuImage, menu.menuPrice, category.cat_name 
                                            FROM cart 
                                            INNER JOIN menu ON cart.mid = menu.mid 
                                            INNER JOIN category ON menu.cat_id = category.cat_id";
                                        $rs = $con->query($sel);

                                        $total = 0;

                                        if ($rs->num_rows > 0) {
                                            while ($row = $rs->fetch_assoc()) {
                                                $subtotal = $row['price'] * $row['qty'];
                                                $total += $subtotal;
                                        ?>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-2">
                                                        <img src="menuImage/<?php echo $row['menuImage']; ?>" class="img-fluid rounded-3" alt="Menu Item">
                                                    </div>
                                                    <div class="col-4">
                                                        <h6 class="text-muted"><?php echo $row['cat_name']; ?></h6>
                                                        <h6 class="mb-0"><?php echo $row['name']; ?></h6>
                                                    </div>
                                                    <div class="col-2 d-flex">
                                                        <form action="update_cart.php?id=<?php echo $row['cart_id']; ?>" method="POST">
                                                            <input type="number" name="qty" value="<?php echo $row['qty']; ?>" min="1" class="form-control form-control-sm">
                                                            <button type="submit" class="btn btn-warning btn-sm mt-2">Update</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-2">
                                                        <h6 class="mb-0">₹<?php echo $subtotal; ?></h6>
                                                    </div>
                                                    <div class="col-1 text-end">
                                                        <a href="delete_cart.php?id=<?php echo $row['cart_id']; ?>" class="text-muted"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <div class="text-center">
                                                <p class="text-muted">Your cart is empty!</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- Summary Section -->
                                <div class="col-lg-4">
                                    <div class="summary">
                                        <h3 class="fw-bold">Summary</h3>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <h5>Items</h5>
                                            <h5>₹<?php echo $total; ?></h5>
                                        </div>
                                        <h5 class="mt-3">Shipping</h5>
                                        <select class="form-select mb-4">
                                            <option value="100">Express Delivery - ₹100.00</option>
                                        </select>
                                        <hr>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5>Total Price</h5>
                                            <h5>₹<?php echo $total + 100; ?></h5>
                                        </div>
                                        <button class="btn btn-dark btn-lg w-100" data-bs-toggle="modal" data-bs-target="#thankYouModal">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Thank You Modal -->
    <div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Thank You!</h1>
                    <p>Your order has been placed successfully.</p>
                    <p>We look forward to serving you again 😊</p>
                    <button type="button" class="btn btn-light mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include("./fontend/footer.php"); ?>
</body>

</html>
