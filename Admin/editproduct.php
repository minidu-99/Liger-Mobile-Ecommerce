<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>


<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <!-- <p class="font-weight-bold">ADD CATEGORY</p> -->
        </div>

        <!-- ADD CATEGORY FORM -->
<div class="row">
        <div class="col p-5">

                <h2>EDIT PRODUCT</h2>
                
                <?php

                if(isset($_GET['id']))
                {
                    
                
                        $id = $_GET['id'];
                        $products = getbyID("products", $id);

                         if(mysqli_num_rows($products) > 0)
                         {
                            $data = mysqli_fetch_array($products)

                         
                            
                            
                            
                        ?>
                                <div>
                                    <form action="code.php" method="POST" enctype="multipart/form-data">

                                    <div class="row">

                                    <div class="col form-group py-1">
                                            <label for="" class="pb-1">Category</label>
                                            <select name="category_id"class="form-select" >
                                                <option selected>Select Category</option>
                                                <?php
                                                    $categories = getAll("categories");

                                                    if(mysqli_num_rows($categories)>0)
                                                    {
                                                        foreach ($categories as $item) {
                                                        
                                                            ?> 
                                                                <option value="<?=$item['id']?>" <?= $data['category_id'] == $item['id']? 'selected':''?> ><?=$item['name']?></option>
                                                            <?php
                                                        }

                                                    }else
                                                    {
                                                        echo "No categories Available";
                                                    }
                    
                                                ?>

                                                
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                                <input type="hidden" name="product_id" value="<?=$data['id']?>">
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Brand</label>
                                                    <input type="text" name="brand" value="<?=$data['brand']?>" class="form-control" id="inputName"
                                                        placeholder="EX : Apple" required>
                                                </div>

                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Model</label>
                                                    <input type="text" name="model" value="<?=$data['model']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : Iphone 15" required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Display Name</label>
                                                    <input type="text" name="display_name" value="<?=$data['display_name']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : Apple Iphone 15 pro 256GB" required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Slug</label>
                                                    <input type="text" name="slug" value="<?=$data['slug']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : IPHONE15" required>
                                                </div>
                                        </div>
                                        <hr>

                                        <div class="row mt-3" style=";">
                                        <h5 class="mb-3">HARDWARE INFORMATION</h5>
                                        <p style ="margin:0; color:red;">*All fields must be filled</p>
                                        <p style ="color:blue;">*You can input N/A for non aplicable input fields</p>
                                                
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="" class="pb-1">Color</label>
                                                    <input type="text" name="color" value="<?=$data['color']?>" class="form-control" id="inputName"
                                                        placeholder="EX : Purple" required>
                                                </div>
                                                
                                                
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">RAM Capacity</label>
                                                    <input type="text" name="ram" value="<?=$data['ram']?>" class="form-control" id="inputName"
                                                        placeholder="EX : 8GB" required>
                                                </div>

                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Storage</label>
                                                    <input type="text" name="rom" value="<?=$data['rom']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : 256GB" required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Display</label>
                                                    <input type="text" name="display" value="<?=$data['display']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : 6.1 inch Super retina " required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Main camera</label>
                                                    <input type="text" name="main_camera" value="<?=$data['main_camera']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : 12mp dual" required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Selfie camera</label>
                                                    <input type="text" name="secondary_camera" value="<?=$data['secondary_camera']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : 12mp " required>
                                                </div>
                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Battery Capacity</label>
                                                    <input type="text" name="battery" value="<?=$data['battery']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : 5000mAh" required>
                                                </div>

                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Operating System</label>
                                                    <input type="text" name="os" value="<?=$data['os']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : iOS 15.5 " required>
                                                </div>

                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">Chipset</label>
                                                    <input type="text" name="chipset" value="<?=$data['chipset']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : Apple A13 bionic " required>
                                                </div>

                                                <div class="col-md-3 form-group py-1">
                                                    <label for="inputFirstName" class="pb-1">GPU</label>
                                                    <input type="text" name="gpu" value="<?=$data['gpu']?>" class="form-control" id="inputslug"
                                                        placeholder="EX : Apple GPU" required>
                                                </div>
                                        </div>

                                        <hr>
                                        
                                        <div class="row">
                                        <h5 class="mb-3">DESCRIPTIONS</h5>
                                            <div class="col-md-6 form-group py-1">
                                            
                                                <label for="inputLname" class="pb-1">Small Description</label>
                                                <p>(*input a <span style="color:red;">short</span> and summerized description here.)</p>
                                                <textarea class="form-control" name="small_description" id="exampleFormControlTextarea1" rows="3" required><?=$data['small_description']?> 
                                                </textarea>
                                            </div>

                                            <div class="col-md-6 form-group py-1">
                                                <label for="inputLname" class="pb-1">Description</label>
                                                <p>(*input a <span style="color:red;">longer</span> descriptive description here.)</p>
                                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required><?=$data['description']?></textarea>
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="row mt-3">
                                        <h5 class="mb-3">PRODUCT IMAGES</h5>
                                        <p>*image 1 is the main image that <span style="color:red;">will be shown</span> to the customer</p>
                                        <div class="col-md-3 form-group py-1">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image 1</label>
                                            <input class="form-control" name="image1" type="file" id="formFile" >

                                            <label for="formFile" class="form-label">Current Image </label>
                                                            
                                            <input type="hidden" name="old_image_1" value="<?=$data['img_1']?>">
                                            <img src="uploads/product_images/<?=$data['img_1']?>" height="50px" width="50px" alt="">
                                        </div>
                                        </div>

                                        <div class="col-md-3 form-group py-1">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image 2</label>
                                            <input class="form-control" name="image2" type="file" id="formFile" >
                                            <label for="formFile" class="form-label">Current Image </label>
                                                            
                                            <input type="hidden" name="old_image_2" value="<?=$data['img_2']?>">
                                            <img src="uploads/product_images/<?=$data['img_2']?>" height="50px" width="50px" alt="">
                                        </div>
                                        </div>

                                        <div class="col-md-3 form-group py-1">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image 3</label>
                                            <input class="form-control" name="image3" type="file" id="formFile" >
                                            <label for="formFile" class="form-label">Current Image </label>
                                                            
                                            <input type="hidden" name="old_image_3" value="<?=$data['img_3']?>">
                                            <img src="uploads/product_images/<?=$data['img_3']?>" height="50px" width="50px" alt="">
                                        </div>
                                        </div>

                                        <div class="col-md-3 form-group py-1">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image 4</label>
                                            <input class="form-control" name="image4" type="file" id="formFile" >
                                            <label for="formFile" class="form-label">Current Image </label>
                                                            
                                            <input type="hidden" name="old_image_4" value="<?=$data['img_4']?>">
                                            <img src="uploads/product_images/<?=$data['img_4']?>" height="50px" width="50px" alt="">
                                        </div>
                                        </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <h5 class="mb-3">PRODUCT PRICING</h5>
                                            <div class="col-md-4 form-group py-1">
                                                <label for="inputPhone" class="pb-1">Original Price</label>
                                                <input type="" name="orginal_price" value="<?=$data['original_price']?>" class="form-control" id="inputPhone"
                                                    placeholder="Enter Your Phone Number" required>
                                            </div>

                                            <div class="col-md-4 form-group py-1">
                                                <label for="inputPhone" class="pb-1">Selling Price</label>
                                                <input type="" name="selling_price" value="<?=$data['selling_price']?>" class="form-control" id="inputPhone"
                                                    placeholder="Enter Your Phone Number" required>
                                            </div>
                                        
                                            <div class="col-md-4 form-group py-1">
                                                <label for="" class="pb-1">Quantity</label>
                                                <input type="number" name="quantity" value="<?=$data['qty']?>" class="form-control" id="inputPhone"
                                                    placeholder="Enter Your Phone Number" required>
                                            </div>
                                        </div>

                                        <hr>
                                        
                                        <div class="row">
                                        <h5 class="mb-3">VISIBILITY AND FEATURING</h5>
                                        <p style="margin:0;">*tick the Status checkbox to <span style="color:red;">show</span> the product to the users.</p>
                                        <p>*tick the Feature checkbox to <span style="color:red;">feature</span>  the product to in the homepage.</p>
                                                        <div class="col-md-4 form-group py-1">
                                                            <div class="form-check">
                                                            
                                                                <input class="form-check-input" <?=$data['status'] == '0'?'':'checked' ?>  name="status" type="checkbox"  id="flexCheckDefault" >
                                                                <label class="form-check-label"  for="flexCheckDefault">
                                                                    Hide
                                                                </label>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 form-group py-1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="feature" <?=$data['featured'] == '0'?'':'checked' ?> type="checkbox"  id="flexCheckDefault" >
                                                                <label class="form-check-label"  for="flexCheckDefault">
                                                                    Feature
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        


                                        </div>
                                        
                                            <div class="fluid text-center pt-3">
                                                <button type="submit" name="update-product-btn"
                                                    class="btn btn-primary register-btn-custom">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        

                        <?php 
                        }else
                        {
                            echo "Product not found for given ID ! ";
                        }
                }
                else
                {
                    echo "ID is missing from the URL ! ";
                }
                ?>
    </div>
    </div>

        
      </main>
      <!-- End Main -->

<?php include("includes/footer.php"); ?>