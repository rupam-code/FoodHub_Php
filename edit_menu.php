<?php
include("database/db.php");
$eid = $_GET['eid'];
$sel = "SELECT menu.*, category.cat_name, category.cat_id FROM menu JOIN category ON menu.cat_id = category.cat_id WHERE mid ='$eid'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();

// Fetch all categories for dropdown
$cat_query = "SELECT * FROM category";
$cat_result = $con->query($cat_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Admin Panel</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h3 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Edit Menu Item</h3>
        <form action="update_menu.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['mid']; ?>">
            <div class="form-group mb-3">
                <label for="menuName">Menu Item Name</label>
                <input type="text" value="<?php echo $row['menuName']; ?>" name="menuName" id="menuName" class="form-control" placeholder="Enter menu item name" required>
            </div>
            <div class="form-group mb-3">
                <label for="menuPrice">Price</label>
                <input type="number" value="<?php echo $row['menuPrice']; ?>" name="menuPrice" id="menuPrice" class="form-control" placeholder="Enter price" required>
            </div>
            <div class="form-group mb-3">
                <label for="menuDescription">Description</label>
                <textarea name="menuDescription" id="menuDescription" class="form-control" rows="4" placeholder="Enter a brief description" required><?php echo $row['menuDescription']; ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="cat_id" id="category" class="form-control" required>
                    <?php while($cat = $cat_result->fetch_assoc()) { ?>
                        <option value="<?php echo $cat['cat_id']; ?>" <?php echo ($cat['cat_id'] == $row['cat_id']) ? 'selected' : ''; ?>>
                            <?php echo $cat['cat_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="menuImage">Upload Image</label>
                <input type="file" name="menuImage" id="menuImage" class="form-control" accept="image/*">
                <img width="250px" src="menuImage/<?php echo $row['menuImage']; ?>" alt="Image">
            </div>
            <div class="form-group text-center">
                <input type="submit" name="editMenu" value="Update Menu" class="btn btn-primary w-50">
            </div>
        </form>
    </div>
</body>
</html>
