<?php
$complete_orders=mysqli_num_rows(CompleteOrders());
$pending_orders=mysqli_num_rows(pendingOrders());

$visible_products=mysqli_num_rows(getAllActive("products"));
$hidden_products=mysqli_num_rows(getAllHide("products"));

$pending_inqs = mysqli_num_rows(getPendinginq());
$responded_inq = mysqli_num_rows(getCompleteinq());

$today_received = todayOrders();
$seven_day = pastSevenDays();
$thirty_day = pastThityDays();

?>



<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>
       
        <div class="main-cards">
        
       

          <div class="card">
            <div class="card-inner">
              <p class="primary-text">TODAY</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold">Rs.<?=number_format($today_received)?>/=</span>
          </div>

          
          <div class="card">
            <div class="card-inner">
              <p class="primary-text">LAST 7 DAYS</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold">Rs.<?=number_format($seven_day)?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="primary-text">LAST 30 DAYS</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold">Rs.<?=number_format($thirty_day)?>/=</span>
          </div>

          

          

        </div>

        <div class="main-cards">
        

          <div class="card">
            <div class="card-inner">
              <p class="primary-text">PRODUCTS</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold"><?=mysqli_num_rows(getAll("products"))?></span>
          </div>


          <div class="card">
            <div class="card-inner">
              <p class="primary-text">VISIBLE PRODUCTS</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold"><?=$visible_products?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="primary-text">HIDDEN PRODUCTS</p>
              <!-- <span class="material-icons-outlined text-blue">inventory_2</span> -->
            </div>
            <span class="primary-text font-weight-bold"><?=$hidden_products?></span>
          </div>

          

          

        </div>

        <div class="main-cards">
              <div class="card">
                  <div class="card-inner">
                    <p class="primary-text">COMPLETE ORDERS</p>
                    <!-- <span class="material-icons-outlined text-orange">add_shopping_cart</span> -->
                  </div>
                  <span class="primary-text font-weight-bold"><?=$complete_orders;?></span>
                </div>

                <div class="card">
                  <div class="card-inner">
                    <p class="primary-text">PENDING ORDERS</p>
                    <!-- <span class="material-icons-outlined text-green">shopping_cart</span> -->
                  </div>
                  <span class="primary-text font-weight-bold"><?=$pending_orders?></span>
                </div>
        </div>

        <div class="main-cards">
        
            

              <div class="card">
                <div class="card-inner">
                  <p class="primary-text">PENDING INQUIRIES</p>
                  <!-- <span class="material-icons-outlined text-red">notification_important</span> -->
                </div>
                <span class="primary-text font-weight-bold"><?=$pending_inqs?></span>
              </div>

              <div class="card">
                <div class="card-inner">
                  <p class="primary-text">REPLIED INQUIRIES</p>
                  <!-- <span class="material-icons-outlined text-red">notification_important</span> -->
                </div>
                <span class="primary-text font-weight-bold"><?=$responded_inq?></span>
              </div>
        
        </div>



      </main>
      <!-- End Main -->