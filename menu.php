<?php
include("database/db.php");
session_start();
// Fetch all categories
$category_query = "SELECT * FROM category";
$category_result = $con->query($category_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - FoodHuB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .menu-item {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
        }
        .menu-item:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .menu-header {
            background-color: #ff9800;
            color: white;
            padding: 50px 0;
        }
        .menu-header h1 {
            font-size: 3rem;
        }
        .category-header {
            position: relative;
            margin: 30px 0 15px;
            font-size: 1.8rem;
            color: #ff5722;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }
        .category-header::before, .category-header::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 3px;
            background: #ff9800;
            top: 50%;
            transform: translateY(-50%);
        }
        .category-header::before {
            left: 0;
        }
        .category-header::after {
            right: 0;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ff9800;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .btn-primary {
            background-color: #ff5722;
            border: none;
        }
        .btn-primary:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include("./fontend/navbar.php"); ?>

<!-- Menu Header -->
<section class="menu-header text-center">
    <div class="container">
        <h1>Our Delicious Menu</h1>
        <p>Discover our wide variety of dishes made fresh for you!</p>
    </div>
</section>

<!-- Menu Section -->
<div class="container my-5">
    <?php while ($category = $category_result->fetch_assoc()) { 
        $cat_id = $category['cat_id'];
        $menu_query = "SELECT * FROM menu WHERE cat_id = '$cat_id'";
        $menu_result = $con->query($menu_query);

        if ($menu_result->num_rows > 0) {
    ?>
        <!-- Category Header -->
        <h2 class="category-header"><?php echo $category['cat_name']; ?></h2>
        <div class="row g-4">
            <?php while ($menu = $menu_result->fetch_assoc()) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card menu-item">
                        <form action="add_cart.php" method="post">
                            <input type="hidden" name="menuId" value="<?php echo $menu['mid']; ?>">
                            <input type="hidden" name="menuName" value="<?php echo $menu['menuName']; ?>">
                            <input type="hidden" name="menuPrice" value="<?php echo $menu['menuPrice']; ?>">
                            <input type="hidden" name="menuqty" value="1">
                            <img src="menuImage/<?php echo $menu['menuImage']; ?>" class="card-img-top" alt="Dish Image">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $menu['menuName']; ?></h5> 
                                <p class="card-text"><?php echo $menu['menuDescription']; ?></p>
                                <p class="fw-bold">₹<?php echo number_format($menu['menuPrice'], 2); ?></p>
                                <button type="submit" class="btn btn-primary" name="add_to_cart">Add To Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php 
        } 
    } ?>
</div>

<!-- Footer -->
<?php include("./fontend/footer.php"); ?>

</body>
</html>
