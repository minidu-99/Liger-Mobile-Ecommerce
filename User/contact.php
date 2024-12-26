<?php
session_start();
include("functions/user_functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
     <!-- ALERTYFY js CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<!-- ALERTYFY Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>
<?php include("assets/includes/header.php"); ?>

<div class="bg-dark mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">Contact Us</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="home.php" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="contact.php" class="text-white-50">Contact</a>
          <!-- <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>Data</u></a> -->
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
<!-- contact form -->
<?php if(isset($_SESSION['message'])) 
        { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
            unset($_SESSION['message']);
        }
        ?>
<div class="container text-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1537559042686!2d79.93857697404903!3d6.9911643175540545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f9131b9aad71%3A0xf6797381bdd1afbf!2sLiger%20Mobile!5e0!3m2!1sen!2slk!4v1708292034368!5m2!1sen!2slk" width="50%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
<div class="container" id="contact">

  
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-phone"> Phone</i>
                    <h6>+94-72 9610887</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-envelope"> Email</i>
                    <h6>liger_mobile@gmail.com</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-location-dot"> Address</i>
                    <h6>102, 1 Kandy Rd, Kadawatha</h6>
                </div>
            </div>
        </div>

        
       
       
        <form action="code.php" method="POST" >
        <div class="row" style="margin-top: 30px;"> 
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" name="customer_name" class="form-control form-control" placeholder="Name" required>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" name="customer_email" class="form-control form-control" placeholder="Email" required>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="number" name="customer_phone" class="form-control form-control" placeholder="Phone" required>
                </div>
                <div class="form-group" style="margin-top: 30px;">
                    <textarea class="form-control" name="message" id="" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="messagebtn text-center"><button type="submit" name = "message-btn" >Message</button></div>
            </div>
        </form>
    </div>
<?php include("assets/includes/footer.php"); ?>