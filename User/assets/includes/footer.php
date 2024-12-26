<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">

          <img class="logo pt-2" src="assets/img/logo.JPG" alt="logo">
          <div class="mt-3">
            <p>
              <i class="fa-solid fa-location-dot" style="width: 15px; text-align: center; margin-right: 4px;"></i>NO :
              102,1 Kandy Road,Kadawatha.
            </p>
            <i class="fa-solid fa-phone" style="width: 15px; text-align: center; margin-right: 4px;"></i> +94-72 9610887
            <br>
            <i class="fa-regular fa-envelope" style="width: 15px; text-align: center; margin-right: 4px;"></i>
            liger_mobile@gmail.com <br>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Links</h4>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="contact.php">Contact US</a></li>
          </ul>
        </div>


<div class="col-lg-3 col-md-6 footer-links">
<h4>Collections </h4>
<?php
include("database/dbcon.php");

$collection_query = "SELECT * FROM categories WHERE status='0' LIMIT 3";
$collection_query_run = mysqli_query($con, $collection_query);

if(mysqli_num_rows($collection_query_run)>0)
{
  foreach ($collection_query_run as $item) {
    ?>
    



          

          <ul>
            <li><a href="products_by_cat.php?category=<?=$item['slug']?>"><?=$item['name']?></a></li>
            
    <?php
   
  }
}

?>
 <li><a href="categories.php">more</a></li>
    </ul>
    </div>

        

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Social Networks</h4>
          <p>Follow our socials.</p>

          <div class="socail-links mt-3">
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>

          </div>

        </div>

      </div>
    </div>
  </div>
  <hr>
  <div class="container py-4">
    <div class="copyright">
      &copy; Copyright <strong><span>LIGER MOBILES</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">ARUNA devs</a>
    </div>
  </div>
</footer>


<!-- Jquery -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


<script src="assets/js/script.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!-- ALERTYFY js JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
  alertify.set('notifier','position', 'top-right');
      <?php
      if(isset($_SESSION['message'])){ ?>
        
        alertify.success('<?=$_SESSION['message'] ?>');
        <?php
        unset($_SESSION['message']);
       } ?>
    </script>
</body>

</html>