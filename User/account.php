<?php
session_start();
include("functions/user_functions.php");
include('authenticate.php');

$user = $_SESSION['auth_user']['user_id'];
                    
$user_deta = getUserInfo($user);
$user_details = mysqli_fetch_array($user_deta);

if(!isset($user)){
    $_SESSION['message']="log in to continue !";
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">

    
</head>
<body>

<?php include("assets/includes/header.php"); ?>

<div class="bg-dark mb-4">
    <div class="container py-4">
        <h3 class="text-white mt-2">My Account</h3>
        <!-- Breadcrumb -->
        <nav class="d-flex mb-2">
            <h6 class="mb-0">
                <a href="" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> > </span>
                <a href="" class="text-white-50">My Account</a>
            </h6>
        </nav>
        <!-- Breadcrumb -->
    </div>
</div>
<?php if(isset($_SESSION['message'])) 
        { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey !</strong> <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            unset($_SESSION['message']);
        }
        ?>

<div class="container">
    <div class="row">
    <div class="col-md-2">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="account.php">
                <h5>My Account</h5>
            </a>
            <hr class="m-0">
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="changepassword.php">
                <h5>Change Password</h5>
            </a>
            <hr class="m-0">
        </li>

        <li class="nav-item">
            <a class="nav-link" href="myorders.php">
                <h5>Orders</h5>
            </a>
            <hr class="m-0">
        </li>

        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <h5>Logout</h5>
            </a>
        </li>
    </ul>
</div>

<?php
        if($user_details)
                    {

        ?>
     
        <div class="col-md-10 border-start card">

                        
                        <form action="functions/authcode.php" method="POST">

                        <div class="row">
                        <h2 class="p-3">Update Your Basic Information</h2>
                        <hr>
                            
                            <div class="col-md-6">

                                <label for="inputFirstName" class="pb-1">First Name</label>
                                <input type="hidden" value="<?=$user_details['id'];?>" name="id"
                                    class="form-inputs form-control" id="inputFirstName" required>
                                <input type="text" value="<?=$user_details['f_name'];?>" name="f_name"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputLname" class="pb-1">Last Name</label>
                                <input type="text" value="<?=$user_details['l_name'];?>" name="l_name"
                                    class="form-control" id="inputLname" placeholder="Enter your last name" required>
                            </div>
                        </div>

                        <hr>


                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="pb-1">User name</label>
                                <input type="text" value="<?=$user_details['username'];?>" name="user_name"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputLname" class="pb-1">Phone Number</label>
                                <input type="text" value="<?=$user_details['phone'];?>" name="phone_number"
                                    class="form-control" id="inputLname" placeholder="Enter your last name" required>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="pb-1">Email</label>
                                <input type="text" value="<?=$user_details['email'];?>" name="email"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            
                            <div class="col-md-12">
                                <label for="inputFirstName" class="pb-1">Address Line 01</label>
                                <input type="text" value="<?=$user_details['address_one'];?>" name="address1"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            
                            <div class="col-md-12">
                                <label for="inputFirstName" class="pb-1">Address Line 02</label>
                                <input type="text" value="<?=$user_details['address_two'];?>" name="address2"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="pb-1">City</label>
                                <input type="text" value="<?=$user_details['city'];?>" name="address3"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>
                            

                            <div class="col-md-6">
                                <label for="inputFirstName" class="pb-1">Postal Code</label>
                                <input type="text" value="<?=$user_details['postal_code'];?>" name="address4"
                                    class="form-inputs form-control" id="inputFirstName" required>
                                    <input type="hidden" value="<?=$user_details['id'];?>" name="id"
                                    class="form-inputs form-control" id="inputFirstName" required>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="p-3 w-100 d-flex justify-content-center">
                        <button type="submit" name="update_info"
                                class="btn btn-primary ">Update Info</button>
                        </div>

                    </form>

                        

        </div>

        <?php
    }else{
        echo "Something went Wrong";

    }
?>

    </div>

</div>

<?php include("assets/includes/footer.php"); ?>

