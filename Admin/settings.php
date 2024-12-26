<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">ACCOUNTS</p>
        </div>

        <!-- REGISTER -->

        <?php if(isset($_SESSION['message'])) 
        { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong></strong> <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            unset($_SESSION['message']);
        }
        ?>

        <div class="col-lg-6 p-5">

                <h2>REGISTER</h2>
                <form action="functions/authcode.php" method="POST">

                    <div class="form-group py-1">
                        <label for="inputFirstName" class="pb-1">First Name</label>
                        <input type="text" name="f_name" class="form-control" id="inputFirstName"
                            placeholder="Enter your first name">
                    </div>

                    <div class="form-group py-1">
                        <label for="inputLname" class="pb-1">Last Name</label>
                        <input type="text" name="l_name" class="form-control" id="inputLname"
                            placeholder="Enter your last name">
                    </div>

                    <div class="form-group py-1">
                        <label for="inputLname" class="pb-1">Username</label>
                        <input type="text" name="user_name" class="form-control" id="inputLname"
                            placeholder="Enter your user name">
                    </div>


                    <div class="form-group py-1">
                        <label for="inputPhone" class="pb-1">Phone Number</label>
                        <input type="number" name="phone_number" class="form-control" id="inputPhone"
                            placeholder="Enter Your Phone Number">
                    </div>

                    <div class="form-group py-1">
                        <label for="inputEmail" class="pb-1">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="form-group py-1">
                        <label for="inputPassword1" class="pb-1">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword1"
                            placeholder="Password">
                    </div>

                    <div class="form-group py-1">
                        <label for="inputPassword2" class="pb-1">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="inputPassword2"
                            placeholder="Re-Enter Password">
                    </div>
                    
                        <div class="fluid text-center pt-3">
                            <button type="submit" name="registerbtn"
                                class="btn btn-primary register-btn-custom">REGISTER</button>
                        </div>
                    </div>
                </form>
    </div>
      </main>
      <!-- End Main -->


<?php include("includes/footer.php"); ?>