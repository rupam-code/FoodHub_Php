<?php
if(isset($_POST['sign_up'])){
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['pass'];
    $role = $_POST['role'];

    $con = mysqli_connect("localhost","root","","php_project");
    $ins = "INSERT INTO user SET role='$role', name='$n', email='$e', password='$p'";
    if($con->query($ins)){
        header("location:sign_up.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - FoodHub</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?vegetables,food') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }

        .custom-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h3 {
            color: #ff5722;
            font-weight: bold;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff5722, #ff9800);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #ff9800, #ff5722);
        }

        .form-outline input {
            border: 2px solid #ff5722;
            border-radius: 5px;
        }

        .form-outline input:focus {
            box-shadow: 0 0 8px #ff5722;
        }

        .form-select {
            border-radius: 5px;
            padding: 0.5rem;
        }

        .form-check-label {
            color: #333;
        }

        .alert {
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include("./fontend/navbar.php"); ?>

    <section class="custom-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card p-5">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body text-center">
                                <h3 class="mb-4">Sign Up</h3>

                                <!-- Display error message if signup fails -->
                                <?php if (!empty($err)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $err; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-outline mb-4">
                                    <select name="role" class="form-select">
                                        <option value="Customer">Customer</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typeName" name="name" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typeName">Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmail" name="email" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typeEmail">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePassword" name="pass" class="form-control form-control-lg" required />
                                    <label class="form-label" for="typePassword">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                </div>

                                <button type="submit" name="sign_up" class="btn btn-primary btn-lg w-100">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
