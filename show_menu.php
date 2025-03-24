<?php
include("database/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menu - Admin Panel</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table-dark th {
            text-align: center;
        }
        .table td, .table th {
            vertical-align: middle;
            text-align: center;
        }
        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: white;
            transition: 0.3s ease;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            transition: 0.3s ease;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .header-btns {
            text-align: right;
        }
        .header-btns button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
   

    <!-- Page Content -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Menu</h2>
            <div class="header-btns">
                <a href="add_menu.php" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add New Dish</a>
            </div>
        </div>
        <table class="table table-hover shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Dish Name</th>
                    <th>Dish Price</th>
                    <th>Dish Description</th>
                    <th>Category</th>
                    <th>Dish Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $sel = "SELECT menu.*, category.cat_name FROM menu JOIN category ON menu.cat_id = category.cat_id";
                    $rs = $con->query($sel);
                    $count = 1;
                    while($row = $rs->fetch_assoc()) {
               ?>
               <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['menuName']; ?></td>
                <td><?php echo $row['menuPrice']; ?></td>
                <td><?php echo $row['menuDescription']; ?></td>
                <td><?php echo $row['cat_name']; ?></td>
                <td><img width="250px" src="menuImage/<?php echo $row['menuImage']; ?>" alt="Images"></td>
                <td>
                        <a href="edit_menu.php?eid=<?php echo $row['mid']; ?>" class="btn btn-sm btn-edit"><i class="fa-solid fa-pen"></i> Edit</a>
                        <a href="delete_menu.php?did=<?php echo $row['mid']; ?>" class="btn btn-sm btn-delete"><i class="fa-solid fa-trash"></i> Delete</a>
                    </td>
               </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>