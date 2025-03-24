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
    $_SESSION['aid'] = $row['aid'];
    $_SESSION['username'] = $row['name'];
    header("location:admin_dashboard.php");
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
  <title>Admin Login - Vegetable Hub</title>
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
      color: #ee9113;
      font-weight: bold;
    }

    .btn-primary {
      background: linear-gradient(45deg, #ee9113, #90ee90);
      border: none;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: linear-gradient(45deg, #ee9113, #38b000);
    }

    .form-outline input {
      border: 2px solid #ee9113;
      border-radius: 5px;
    }

    .form-outline input:focus {
      box-shadow: 0 0 8px #ee9113;
    }

    .form-check-label {
      color: #ee9113;
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
                <h3 class="mb-4">Admin Login</h3>

                <!-- Display error message if login fails -->
                <?php if (!empty($err)): ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $err; ?>
                  </div>
                <?php endif; ?>

                <div class="form-outline mb-4">
                  <select name="role" class="form-select">
                    <option value="Admin">Admin</option>
                  </select>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="typeEmailX-2" class="form-control" placeholder="Email" />
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass" id="typePasswordX-2" class="form-control" placeholder="Password" />
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" id="form1Example3" />
                  <label class="form-check-label" for="form1Example3"> Remember password </label>
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
