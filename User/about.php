<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <?php include("assets/includes/header.php"); ?>
  <div class="bg-dark mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">About us</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="home.php" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="about.php" class="text-white-50">About Us</a>
          <!-- <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>Data</u></a> -->
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
  </div>


  <div class="container">
    <div class="row mt-4">
      <div class="col-md-6">
        <img src="assets/img/lmlogo.png" alt="About Us Image" class="about-image img-fluid shadow-lg mt-5"
          style="width: 100%; max-width: 1000px;">
      </div>
      <div class="col-md-6 mt-5">
        <h3 class="about-header">About Liger Mobile</h3>
        <hr>
        <p class="about-text mt-3">
          Established in 2011, Liger Mobile is one of the very first brands to start selling Apple products in Sri
          Lanka. And since then, we have grown to be one of the leading stores selling smartphones and accessories in
          Sri Lanka.
          <br><br>
          From iPhones, MacBooks, iPads, Apple Watches to other Apple Accessories, we provide 100% genuine, original
          products with international warranties included. Apart from that, we also have a wide variety of brands for
          customers to choose from, including Samsung, Nokia, MI, Google Pixel and many more!
          <br><br>
          Liger Mobile is TRCSL Approved, as we do not compromise on quality and we always ensure to provide original
          products for the best prices in the market.
          <br><br>
          You can either purchase your new gadgets online or visit our store to make the purchase. Delivery will be
          conducted within 7 days, islandwide!
        </p>
      </div>
      
    </div>

    <hr>
  </div>

  <div class="container" id="about">

    <div class="row mt-4">
      <div class="col-md-6 mt-5">
        <h3 class="about-header">Additional services that we provide</h3>
        <hr>
        <p class="about-text mt-5">
          We prioritize providing our customers with the best services, whether it's before or after purchasing our
          products. Rest assured, your phone is in safe hands throughout your journey with Liger Mobile!
          <br><br>
          We can help you set up your new mobile phone by transferring your data from your old phone to the new one,
          while also giving you tips of the trade to help you use your smartphone better!
          <br><br>
          We are also committed to attending to any damages caused under the warranty within 14 days.
        </p>
      </div>
      <div class="col-md-6">
        <img src="assets/img/blackiphone.jpeg" alt="About Us Image" class="about-image img-fluid shadow-lg mt-5"
          style="width: 100%; max-width: 1000px;">
      </div>
    </div>
    <hr>
    <div class="row mt-5">
      <div class="col-md-6">
        <h3 class="vision-header">Our Vision:</h3>
        <p class="vision-text">To become the most trusted and customer-centric mobile technology provider in Sri Lanka.
        </p>
      </div>
      <div class="col-md-6">
        <h3 class="mission-header">Our Mission:</h3>
        <p class="mission-text">To provide high-quality mobile products and services, ensuring customer satisfaction and
          fostering long-term relationships.</p>
      </div>
    </div>

    
  </div>
  </div>




  <?php include("assets/includes/footer.php"); ?>