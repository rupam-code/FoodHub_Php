<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Food HuB</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/bsb-btn-size/bsb-btn-size.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/margin/margin.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/utilities/padding/padding.css">
    <style>
      .text-primaryyy{
        color: #ee9113 ;
      }
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
<?php
  include("./fontend/navbar.php");
?>
<!-- About Section -->
<section class="py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">About Food HuB</h2>
        <p class="text-secondary mb-5 text-center lead fs-4">At Food HuB, we are passionate about bringing delicious meals right to your doorstep. We connect you with the best local restaurants to satisfy your cravings, anytime and anywhere.</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6">
        <img class="img-fluid rounded border border-dark" loading="lazy" src="./fontend//banner//about.avif" alt="About Food HuB">
      </div>
      <div class="col-12 col-lg-6 col-xxl-6">
        <div class="row justify-content-lg-end">
          <div class="col-12 col-lg-11">
            <div class="about-wrapper">
              <p class="lead mb-4 mb-md-5">Food HuB is more than just a food delivery service. We aim to enhance your dining experience by providing fast, reliable, and convenient access to a wide variety of cuisines from trusted local eateries. Whether it’s breakfast, lunch, dinner, or a late-night snack, we’ve got you covered.</p>
              <div class="row gy-4 mb-4 mb-md-5">
                <div class="col-12 col-md-6">
                  <div class="card border border-dark">
                    <div class="card-body p-4">
                      <h3 class="display-5 fw-bold text-primaryyy text-center mb-2">500+</h3>
                      <p class="fw-bold text-center m-0">Partner Restaurants</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="card border border-dark">
                    <div class="card-body p-4">
                      <h3 class="display-5 fw-bold text-primaryyy text-center mb-2">50k+</h3>
                      <p class="fw-bold text-center m-0">Happy Customers</p>
                    </div>
                  </div>
                </div>
              </div>
            
                
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  include("./fontend/footer.php");
  ?>
</body>
</html>
