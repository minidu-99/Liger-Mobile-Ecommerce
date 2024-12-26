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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- ALERTYFY js CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- ALERTYFY Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body>
    <?php include("assets/includes/header.php"); ?>
    <div class="bg-dark mb-4">
        <div class="container py-4">
            <h3 class="text-white mt-2">Checkout</h3>
            <!-- Breadcrumb -->
            <nav class="d-flex mb-2">
                <h6 class="mb-0">
                    <a href="" class="text-white-50">Home</a>
                    <span class="text-white-50 mx-2"> > </span>
                    <a href="checkout.php" class="text-white-50">Checkout</a>
                    <!-- <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>Data</u></a> -->
                </h6>
            </nav>
            <!-- Breadcrumb -->
        </div>
    </div>
    </div>


    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <div class="row">
                    <div class="col-md-7">
                    <form action="functions/place_order.php" method="POST">
                        <div class="row p-1">
                            


                            <?php 
                    
                    $user = $_SESSION['auth_user']['user_id'];
                    
                    $user_deta = getUserInfo($user);
                    $user_details = mysqli_fetch_array($user_deta);


                    if($user_details)
                    {
                        ?>
                            <h5>Billing Information</h5>
                            <hr>
                            <div class="col-md-6">
                                <label for="inputFirstName" class="pb-1">First Name</label>
                                <input type="text" value="<?=$user_details['f_name'];?>" name="f_name"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputLname" class="pb-1">Last Name</label>
                                <input type="text" value="<?=$user_details['l_name'];?>" name="l_name"
                                    class="form-control" id="inputLname" placeholder="Enter your last name" required>
                            </div>


                            <div class="col-md-6">
                                <label for="inputPhone" class="pb-1">Phone Number</label>
                                <input type="text" value="<?=$user_details['phone'];?>" name="phone_number"
                                    class="form-control" id="inputPhone" placeholder="Enter Your Phone Number"
                                    required>
                            </div>




                            <div class="col-md-6">
                                <label for="inputEmail" class="pb-1">Email</label>
                                <input type="email" value="<?=$user_details['email'];?>" name="email"
                                    class="form-control" id="inputEmail" placeholder="Email" required>
                            </div>

                            
                            


                            <div class="col-md-12">
                                <label for="inputAddress" class="pb-1">Address</label>
                                <textarea class="form-control" required name="address" value="<?=$user_details['address'];?>"
                                    id="exampleFormControlTextarea1" rows="8" ><?=$user_details['address'];?></textarea>
                            </div>


                            <div class="col-md-6">
                                
                                <input type="hidden"  name="postal_code"
                                    class="form-control" id="inputEmail" value='<?=$user_details['postal_code'];?>' required>
                            </div>

                        </div>



                        <?php
                    }else
                    {
                            echo "Something went wrong !";
                    }

                    ?>


                    </div>
                    <div class="col-md-5">
                        <div class="row p-1">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $items = getCartItems();
                            $totalPrice = 0;

                                    if(mysqli_num_rows($items) > 0){

                                    foreach ($items as $citem) {
                                        
                                        ?>
                            <div class="mb-1 border">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="../Admin/uploads/product_images/<?=$citem['img_1'];?>" alt="image"
                                            class="w-100">
                                    </div>

                                    <div class="col-md-3">
                                        <lable><?=$citem['display_name'];?></lable>
                                    </div>

                                    <div class="col-md-3">
                                        <lable>Rs. <?=number_format($citem['selling_price']);?></lable>
                                    </div>

                                    <div class="col-md-3">
                                        <lable>X <?=$citem['product_qty'];?></lable>
                                    </div>
                                </div>

                            </div>

                            <?php
                            $totalPrice +=  $citem['selling_price']* $citem['product_qty'];
                           
                        } 
                    }  
                            ?>
                                <hr>
                            <h5>Total price : <span class="float-end fw-bold">Rs. <?=number_format($totalPrice)?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100" >Confirm and place order | COD</button>
                            </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include("assets/includes/footer.php"); ?>