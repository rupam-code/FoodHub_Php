<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food HuB</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="./fontend//style.css">
  <style>
    .btn {
  background-color: #ee9113 !important;
  border-color: #ee9113 !important;
}

.btn:hover {
  background-color: #d57f0f !important; /* Slightly darker shade for hover effect */
  border-color: #d57f0f !important;
}
.bi {
  color: #ee9113 !important;
}

  </style>
</head>
<body>
  <!-- Navbar -->
  <?php
  include("./fontend/navbar.php");
  ?>

  

  <section id="hero" class="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" style="height: 600px;">
                <img src="./fontend/banner/banner 1.jpg" class="d-block w-100" alt="Delicious Food">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                   
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" style="height: 600px;">
                <img src="./fontend/banner/banner 2.jpg" class="d-block w-100" alt="Fresh Ingredients">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item" style="height: 600px;">
                <img src="./fontend/banner/Banner 3.png" class="d-block w-100" alt="Fast Delivery">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div>
                        <h1 class="fw-bold text-white">Fast Delivery to Your Doorstep</h1>
                        <p class="lead">Hot, fresh, and on time — delivered straight to you!</p>
                        <a href="#" class="btn btn-danger btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

  <!-- Hero Section -->
  <section class="bg-light text-center py-5">
    <div class="container">
      <h1 class="display-4">Delicious Food Delivered to Your Doorstep</h1>
      <p class="lead">Fast, fresh, and affordable. Order your favorite meals today!</p>
      <a href="#menu" class="btn btn-lg">Explore Menu</a>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="py-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <i class="bi bi-truck display-4 text-primary"></i>
          <h4 class="mt-3">Fast Delivery</h4>
          <p>Quick and reliable delivery to your location.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-basket display-4 text-primary"></i>
          <h4 class="mt-3">Fresh Ingredients</h4>
          <p>Only the freshest and finest quality food items.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-currency-rupee display-4 text-primary"></i>
          <h4 class="mt-3">Affordable Prices</h4>
          <p>Delicious meals at a price that won't break the bank.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Image Section -->
   <div class="container">
  <div class="grid">
    <div class="item1">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image1.png" alt="image 1" />
        </a>
    </div>
    <div class="item2">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image2.png" alt="image 2" />
        </a>
    </div>
    <div class="item3">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image3.png" alt="image 3" />
        </a>
    </div>
    <div class="item4">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image4.png" alt="image 4" />
        </a>
    </div>
    <div class="item5">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image5.png" alt="image 5" />
        </a>
    </div>
    <div class="item6">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image6.png" alt="image 6" />
        </a>
    </div>
    <div class="item7">
        <a href="menu.php">
            <img class="grid-image" src="./fontend/menu/grid_image7.png" alt="image 7" />
        </a>
    </div>
</div>
</div>

<?php
  include("./fontend/footer.php");
  ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>