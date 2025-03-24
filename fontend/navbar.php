<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodHub</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .newcolor {
            background-color: #ee9113;
        }

        .navbar-brand span {
            color:rgb(213, 190, 36);
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            padding: 10px 15px;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgb(213, 190, 36);;
            color: white;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .nav-item {
            margin-left: 15px;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #fff;
        }

        .fa-sign-out-alt, .fa-sign-in-alt, .fa-user-plus {
            font-size: 18px;
        }
    </style>
</head>

<body>

<?php
// Check if a session is not already started before starting one
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the username from the session, if available
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light newcolor">
    <div class="container">
        <a class="navbar-brand" href="index.php">Food<span class="text-primary">HuB</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="about_us.php">About <i class="fa-solid fa-address-card"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="contact_us.php"><i class="fa-solid fa-phone"></i> Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>

                <?php if ($username): ?>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa-solid fa-user"></i> Welcome, <?php echo htmlspecialchars($username); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="sign_up.php"><i class="fa-light fa-user-plus"></i> Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa-solid fa-sign-in-alt"></i> Login</a></li>
                <?php endif; ?>

               
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper (required for the navbar toggle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
