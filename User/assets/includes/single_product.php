

<?php











?>
<!-- single product view -->
<div classa="container">

      <div class = "product-card m-5 p-5 product_data">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase img-container">
              <img  class="img-custom" src = "../Admin/uploads/product_images/<?=$product['img_1']?>" class="" alt = "shoe image">
              <img  class="img-custom" src = "../Admin/uploads/product_images/<?=$product['img_2']?>" alt = "shoe image">
              <img  class="img-custom" src = "../Admin/uploads/product_images/<?=$product['img_3']?>" alt = "shoe image">
              <img  class="img-custom" src = "../Admin/uploads/product_images/<?=$product['img_4']?>" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "../Admin/uploads/product_images/<?=$product['img_1']?>" width="178px" height="178px" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "../Admin/uploads/product_images/<?=$product['img_2']?>" width="178px" height="178px" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "../Admin/uploads/product_images/<?=$product['img_3']?>" width="178px" height="178px" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "../Admin/uploads/product_images/<?=$product['img_4']?>" width="178px" height="178px" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?=$product['display_name']?></h2>
          <!-- <a href = "#" class = "product-link">visit nike store</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div> -->

          <div class = "product-price">
            <p class = "last-price"> <span>Rs.<?=number_format($product['original_price'])?></span></p>
            <p class = "new-price"><span>Rs.<?=number_format($product['selling_price'])?></span></p>
          </div>

          <div class = "product-detail">
            <!-- <h2>Discription</h2> -->
            <p><?=$product['small_description']?></p>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p> -->
            <ul style="padding-left: 0px;">
              <li>Color: <span><?=$product['color']?></span></li>
              <li>Storage: <span><?=$product['rom']?></span></li>
              <li>Battery: <span><?=$product['battery']?></span></li>
              <li>Front Camera: <span><?=$product['main_camera']?></span></li>
              <li>Selfie Camera: <span><?=$product['secondary_camera']?></span></li>
            </ul>
          </div>

          <div class = "row purchase-info">
            <div class="col-md-3">
              <div class="input-group mb-3 ">
                <button class="input-group-text decrement-btn">-</button>
                <input type="text" class="form-control input-qty" value="1" disabled >
                <button class="input-group-text increment-btn">+</button>
              </div>
            </div>
         
            <!-- <input type = "number" min = "1" value = "1"> -->
            <button type = "button" class ="btn btn-success col addtoCart-btn" value="<?=$product['id']?>">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
            </button>
            <!-- <button type = "button" class = "btn col-md-3">Compare <i class="fa-solid fa-code-compare"></i></button> -->
          </div>
        </div>
      </div>

</div>
<?php




?>