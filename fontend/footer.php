<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
        .bgt {
            background: linear-gradient(135deg, #ee9113, #d43f00);
            color: white;
            font-family: Arial, sans-serif;
        }
        
        footer {
            padding: 20px 0;
        }
        
        .footer-links {
            margin-bottom: 10px;
        }

        .footer-links .nav-item {
            display: inline-block;
            margin: 0 10px;
        }

        .footer-links .nav-link {
            color: white;
            font-weight: 600;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .footer-links .nav-link:hover {
            background-color: rgb(213, 190, 36);
            color: white;
            transform: scale(1.1);
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Footer -->
    <footer class="bgt text-center">
        <div class="footer-links">
            <li class="nav-item">
                <a class="nav-link" href="admin_login.php">Admin</a>
            </li>
        </div>
        <p>&copy; 2024 FoodHub. All Rights Reserved.</p>
    </footer>
</body>
</html>
