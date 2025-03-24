<?php 
session_start(); 
include("database/db.php"); 

if (isset($_GET['type']) && $_GET['type'] == 'status' && isset($_GET['operation']) && isset($_GET['cat_id'])) {
    $operation = $_GET['operation'];
    $cat_id = (int)$_GET['cat_id'];

    if ($operation == 'deactivate') {
        $update_status = "UPDATE category SET cat_status = 0 WHERE cat_id = $cat_id";
    } elseif ($operation == 'activate') {
        $update_status = "UPDATE category SET cat_status = 1 WHERE cat_id = $cat_id";
    }

    if (isset($update_status)) {
        $con->query($update_status);
    }

    // Redirect to avoid repeated execution on refresh
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Food HuB</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
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
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card .card-icon {
            font-size: 50px;
            color: #007bff;
        }
        .card h5 {
            font-weight: bold;
            margin-top: 15px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn {
            border-radius: 20px;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
   <?php include("./fontend/adminnavbar.php"); ?>

   <div class="content">
       <h1 id="dashboard" class="text-primary">Dashboard</h1>
    
       <h2 id="manage-users" class="mt-5 text-primary">User List</h2>
       <table class="table table-hover shadow-sm bg-white">
           <thead class="table-dark">
               <tr>
                    <th>User Role</th>
                   <th>User Name</th>
                   <th>User Email</th>
                   <th>User Password</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               <?php
               $sel = "SELECT * FROM user";
               $rs = $con->query($sel);
               if($rs->num_rows>0){
               while ($row = $rs->fetch_assoc()) {
                   ?>
                   <tr>
                       <td><?php echo $row['role']; ?></td>
                       <td><?php echo $row['name']; ?></td>
                       <td><?php echo $row['email']; ?></td>
                       <td><?php echo $row['password']; ?></td>
                       <td>
                           <a href="delete_user.php?id=<?php echo $row['uid'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                       </td>
                   </tr>
                   <?php
               }
            } else {
               ?>
                <tr>
                <td colspan="5" class="text-center text-muted">No records found</td>
            </tr>
            <?php
        }
        ?>
           </tbody>
       </table>

       <h2 id="manage-users" class="mt-5 text-primary">Manage Category</h2>
       <table class="table table-hover shadow-sm bg-white">
           <thead class="table-dark">
               <tr>
                   <th>Category Name</th>
                   <th>Category Status</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               <?php
               $sel = "SELECT * FROM category";
               $rs = $con->query($sel);
               if($rs->num_rows>0){

              
               while ($row = $rs->fetch_assoc()) {
                   ?>
                   <tr>
                       <td><?php echo $row['cat_name']; ?></td>
                       <td>
                           <?php
                           if ($row['cat_status'] == 1) {
                               echo "<a href='?type=status&operation=deactivate&cat_id=" . $row['cat_id'] . "' class='btn btn-sm btn-success'>Active</a>";
                           } else {
                               echo "<a href='?type=status&operation=activate&cat_id=" . $row['cat_id'] . "' class='btn btn-sm btn-secondary'>Deactive</a>";
                           }
                           ?>
                       </td>
                       <td>
                           <a href="edit_category.php?id=<?php echo $row['cat_id'] ?>"  class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                           <a href="delete_category.php?id=<?php echo $row['cat_id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                       </td>
                   </tr>
                   <?php
               }
            } else {
               ?>
                <tr>
                <td colspan="5" class="text-center text-muted">No records found</td>
            </tr>
            <?php
        }
        ?>
               

               
           </tbody>
       </table>

       <h2 id="manage-users" class="mt-5 text-primary">Contact Us</h2>
<table class="table table-hover shadow-sm bg-white">
    <thead class="table-dark">
        <tr>
            <th>Contact Name</th>
            <th>Contact Email</th>
            <th>Contact Phone</th>
            <th>Contact Message</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sel = "SELECT * FROM contact_us";
        $rs = $con->query($sel);

        // Check if any records exist
        if ($rs->num_rows > 0) {
            while ($row = $rs->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['contact_name']; ?></td>
                    <td><?php echo $row['contact_email']; ?></td>
                    <td><?php echo $row['contact_phone']; ?></td>
                    <td><?php echo $row['contact_messege']; ?></td>
                    <td>
                        <a href="delete_contact.php?id=<?php echo $row['contact_id'] ?>" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            // Display message if no records found
            ?>
            <tr>
                <td colspan="5" class="text-center text-muted">No records found</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


       <!-- Other sections for managing users and orders remain the same -->
   </div>
</body>
</html>
