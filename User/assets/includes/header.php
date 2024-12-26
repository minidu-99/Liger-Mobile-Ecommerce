    <!-- HEADER-->

   
    <div class="container-fluid">
      <div class="row nav-header">

        <div class="col-lg-2 col-8  p-3 flex-item">
          <img class="logo" src="assets/img/logo.JPG" alt="logo">
        </div>

        <div class="col-lg-5 p-4 flex-item d-none d-lg-block searchbar-container">
          <div class="">
          <form class="d-flex searchbar" role="search">
            <input class="form-control me-2" type="search" id="livesearch" placeholder="Search" >
            <!-- <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass search-icon"></i></button> -->
          </form>
          <div class="row z-2 position-absolute " style="width: 568px;" id="searchresult">
            
          <div class="row "  > </div>
          </a>
          </div>
          </div>

        </div>

        <div class="col-lg-2 p-3 d-none d-lg-block flex-item">
          <?php
          if(isset($_SESSION['auth'])){

            ?>
                    <div class="dropdown">
                    <a class="login-signin btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['auth_user']['username'];?> 
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="account.php">My Account</a></li>
                      <li><a class="dropdown-item" href="myorders.php">My Orders</a></li>
                      <li><a class="dropdown-item" href=" ./logout.php">Logout</a></li>
                    </ul>
          </div>

                    
                
             <?php
          }else
          {
            ?>
                <a class=" nav-link active p-2 login-signin" aria-current="page" href="login.php">LOGIN/REGISTER</a>
                
            <?php
          }
          ?>

</div>

        <div class="d-flex col-lg-3 col-4 p-3 justify-content-end flex-item">

          <!-- <li class="header-icons">
            <a class="icons d-none d-sm-block" href="#"><i class="fa-regular fa-heart"></i></a>
          </li>

          <li class="header-icons">
            <a class="icons d-none d-sm-block" href="#"><i class="fa-solid fa-code-compare"></i></a>
          </li> -->

          <li class="header-icons">
            <a class="icons d-none d-sm-block" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>

          <li class="header-icons">

            <!-- offcanvas -->
            
            <button class="btn btn-primary d-block d-sm-none " type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <i class="fa-solid fa-bars"></i>
            </button>

            <div class="offcanvas offcanvas-start offcanvas-custom" tabindex="-1" id="offcanvasExample"
              aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
              </div>
              <div class="offcanvas-body offcanvas-body-custom">
                <div>
                  <div class="container-fluid canvas-item">
                    <a class=" nav-link active p-2 login-signin-oc" aria-current="page" href="#"><i
                        class="fa-regular fa-user i-oc"></i>LOGIN/REGISTER</a>
                  </div>

                  <div class="container-fluid canvas-item">
                    <a class=" nav-link active p-2 login-signin-oc" aria-current="page" href="#"><i
                        class="fa-regular fa-heart i-oc"></i>WISHLIST</a>
                  </div>

                  <div class="container-fluid canvas-item">
                    <a class=" nav-link active p-2 login-signin-oc" aria-current="page" href="#"><i
                        class="fa-solid fa-code-compare i-oc"></i>COMPARE</a>
                  </div>

                  <div class="container-fluid canvas-item">
                    <a class=" nav-link active p-2 login-signin-oc" aria-current="page" href="#"><i
                        class="fa-solid fa-cart-shopping i-oc"></i>SHOPPING CART</a>
                  </div>
                  <div class="container-fluid canvas-item">
                  </div>

                  <!-- <div>
                  <li class="header-icons">
                    <a class="icons " href="#"><i class="fa-regular fa-heart"></i></a>
                  </li>
        
                  <li class="header-icons">
                    <a class="icons d-none d-sm-block" href="#"><i class="fa-solid fa-code-compare"></i></a>
                  </li>
        
                  <li class="header-icons">
                    <a class="icons d-none d-sm-block" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                  </li>
                </div> -->





                </div>

              </div>
            </div>
            <!-- offcanvas ends -->


          </li>
        </div>

      </div>
    </div>

    <div class="col-lg-5 d-lg-none d-xl-none hidden-searchbar-container">

      <form class="d-flex " role="search">
        <input class="form-control me-2 hidden-searchbar" type="search" placeholder="Search" aria-label="Search">
        <button class="btn hidden-searchbar-btn" type="submit"><i
            class="fa-solid fa-magnifying-glass search-icon"></i></button>
      </form>
    </div>


    <!--NAVBAR -->

    <nav class="navbar  navbar-expand bg-body-dark ">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <hr class="seperator">



    <!-- <div class="container-fluid">
    <div class="row">
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      <div class="col-2" style="border:2px solid;">Coloumn</div>
      
    </div>
    </div> -->
    