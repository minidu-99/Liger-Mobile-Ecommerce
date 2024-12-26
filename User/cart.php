<?php
session_start();
include("functions/user_functions.php");
include('authenticate.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- ALERTYFY js CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<!-- ALERTYFY Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


<style>
    

    .container-no-items {
      display: flex;
      align-items: center;
      justify-content: center;
      
    }

    .message-container-no-items {
      text-align: center;
    }

    .message-no-item {
      font-size: 24px;
      font-weight: bold;
      color: #555;
      margin-bottom: 20px;
    }

    .cart-icon {
      font-size: 48px;
      color: #007bff;
    }
  </style>
</head>
<body>
<?php include("assets/includes/header.php"); ?>
<div class="bg-dark mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">Shopping Cart</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white-50">Shopping Cart</a>
          <!-- <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>Data</u></a> -->
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
</div>

<div class="py-5"></div>
    <div class="container">
        <div class="">
            <div class="row">
            <div class="col-md-12">

                    

                    <div id="myCart">
                            <?php $items = getCartItems();
  
                            
                            if(mysqli_num_rows($items) > 0){

                                ?>
                                <div class="row align-items-center">
                                                                
                                <div class="col-md-5">
                                    <h5>Product</h6>
                                </div>
                                
                                <div class="col-md-3">
                                    <h5>Price</h6>
                                </div>
                                
                                <div class="col-md-2">
                                    <h5>Quantity</h6>
                                </div>
                                
                                <div class="col-md-2">
                                    <h5>Remove</h6>
                                </div>
                                </div>
                                <?php

                                
                            foreach ($items as $citem) {
                                
                                ?>
                                <div class="card shadow-sm mb-3 product_data">
                                    <div class="row align-items-center">

                                    
                                        <div class="col-md-2">
                                            <img src="../Admin/uploads/product_images/<?=$citem['img_1'];?>" alt="image" class="w-50" >
                                        </div>
                                    


                                        <div class="col-md-3">
                                            <h5><?=$citem['display_name'];?></h5>
                                        </div>

                                        <div class="col-md-3">
                                            <h5>Rs.<?=number_format($citem['selling_price']);?></h5>
                                        </div>


                                        <div class="col-md-2">
                                            <div class="input-group mb-3 ">
                                                <input type="hidden" name="" class="prodId" value="<?=$citem['product_id'];?>">
                                                <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control input-qty" value="<?=$citem['product_qty'];?>" disabled >
                                                <button class="input-group-text increment-btn updateQty">+</button>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <button class="btn btn-danger btn-sm deleteItem" value="<?=$citem['cid'];?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                        </div>

                                    

                                    </div>

                                </div>

                                <?php
                            }

?>

                                <div class="float-end">
                        <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                    </div>
                    <?php



                                

                        }else{
                            ?>
                                <div class="container-no-items">
                                    <div class="message-container-no-items">
                                        <div class="message-no-item">No Items in the Cart</div>
                                        <i class="fas fa-shopping-cart cart-icon"></i>
                                    </div>
                                </div>
                            <?php
                        }
                            
                            
                            ?>
                    </div>

                    



            </div>
         </div>
         </div>
    </div>
</div>




<?php include("assets/includes/footer.php"); ?>