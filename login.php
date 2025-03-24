<?php
session_start();
include("database/db.php");
if (isset($_POST['login'])) {
  $e = $_POST['email'];
  $p = $_POST['pass'];
  $role = $_POST['role'];
  $check_login = "SELECT * FROM user WHERE role='$role' AND email='$e' AND password='$p'";
  $rs = $con->query($check_login);
  if ($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();
    $_SESSION['userid'] = $row['uid'];
    $_SESSION['username'] = $row['name'];
    header("location:index.php");
  } else {
    $err = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - FoodHub</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      background: url('https://source.unsplash.com/1600x900/?food,vegetables') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Poppins', sans-serif;
    }

    .custom-section {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
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
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card p-5">
              <div class="card-body text-center">
                <h3 class="mb-4">Login</h3>

                <!-- Display error message if login fails -->
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
                  <input type="email" name="email" class="form-control" placeholder="Email" />
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass" class="form-control" placeholder="Password" />
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe"> Remember password </label>
                </div>

                <button type="submit" name="login" class="btn btn-primary btn-lg w-100">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
