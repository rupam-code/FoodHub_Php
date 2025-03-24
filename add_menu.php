<?php
include("database/db.php");

// Fetch categories for the dropdown
$categoryQuery = "SELECT * FROM category WHERE cat_status = 1";
$categories = $con->query($categoryQuery);

if (isset($_POST['addMenu'])) {
    $n = $_POST['menuName'];
    $p = $_POST['menuPrice'];
    $d = $_POST['menuDescription'];
    $cat_id = $_POST['menuCategory'];

    $img = $_FILES['menuImage']['tmp_name'];
    $imgFn = time() . $_FILES['menuImage']['name'];
    move_uploaded_file($img, "menuImage/" . $imgFn);

    $ins = "INSERT INTO menu SET menuName='$n', menuPrice='$p', menuDescription='$d', menuImage='$imgFn', cat_id='$cat_id'";
    if ($con->query($ins)) {
        header("location:show_menu.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu - Admin Panel</title>
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
        <h3>Add New Menu Item</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="menuName">Menu Item Name</label>
                <input type="text" name="menuName" id="menuName" class="form-control" placeholder="Enter menu item name" required>
            </div>
            <div class="form-group mb-3">
                <label for="menuPrice">Price</label>
                <input type="number" name="menuPrice" id="menuPrice" class="form-control" placeholder="Enter price" required>
            </div>
            <div class="form-group mb-3">
                <label for="menuDescription">Description</label>
                <textarea name="menuDescription" id="menuDescription" class="form-control" rows="4" placeholder="Enter a brief description" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="menuCategory">Category</label>
                <select name="menuCategory" id="menuCategory" class="form-control" required>
                    <option value="">Select Category</option>
                    <?php while ($category = $categories->fetch_assoc()) { ?>
                        <option value="<?php echo $category['cat_id']; ?>">
                            <?php echo $category['cat_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="menuImage">Upload Image</label>
                <input type="file" name="menuImage" id="menuImage" class="form-control" accept="image/*" required>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="addMenu" value="Add Menu" class="btn btn-primary w-50">
             
            </div>
        </form>
    </div>
</body>
</html>
