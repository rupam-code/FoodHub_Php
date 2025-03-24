<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("database/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
            .sidebar {
            height: 100vh;
            position: fixed;
            background-color: #1c2331;
            color: #fff;
            width: 250px;
            padding: 20px 15px;
            transition: all 0.3s ease;
        }
        .sidebar h3 {
            font-size: 1.5rem;
            text-align: center;
            color: #f8f9fa;
            margin-bottom: 1rem;
        }
        .sidebar a {
            color: #ced4da;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 10px 0;
            transition: all 0.3s ease;
        }
        .sidebar a i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <h3>Welcome Admin <?php $n = $_SESSION['username']; echo $n; ?></h3>
        <a href="admin_dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a href="add_category.php"><i class="fa-solid fa-plus"></i>Add Category</a>
        <a href="add_menu.php"><i class="fa-solid fa-tent-arrows-down"></i> Add Menu</a>
        <a href="show_menu.php"><i class="fa-solid fa-utensils"></i> Manage Menu</a>
       
        <a href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
    </div>
</body>
</html>