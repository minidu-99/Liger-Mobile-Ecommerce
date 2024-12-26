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

                <h2>ADD PRODUCT</h2>
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
                                            <option value="<?=$item['id']?>"><?=$item['name']?></option>
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
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Brand</label>
                                <input type="text" name="brand" class="form-control" id="inputName"
                                    placeholder="EX : Apple" required>
                            </div>

                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Model</label>
                                <input type="text" name="model" class="form-control" id="inputslug"
                                    placeholder="EX : Iphone 15" required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Display Name</label>
                                <input type="text" name="display_name" class="form-control" id="inputslug"
                                    placeholder="EX : Apple Iphone 15 pro 256GB" required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="inputslug"
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
                                <input type="text" name="color" class="form-control" id="inputName"
                                    placeholder="EX : Purple" required>
                            </div>
                            
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">RAM Capacity</label>
                                <input type="text" name="ram" class="form-control" id="inputName"
                                    placeholder="EX : 8GB" required>
                            </div>

                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Storage</label>
                                <input type="text" name="rom" class="form-control" id="inputslug"
                                    placeholder="EX : 256GB" required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Display</label>
                                <input type="text" name="display" class="form-control" id="inputslug"
                                    placeholder="EX : 6.1 inch Super retina " required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Main camera</label>
                                <input type="text" name="main_camera" class="form-control" id="inputslug"
                                    placeholder="EX : 12mp dual" required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Selfie camera</label>
                                <input type="text" name="secondary_camera" class="form-control" id="inputslug"
                                    placeholder="EX : 12mp " required>
                            </div>
                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Battery Capacity</label>
                                <input type="text" name="battery" class="form-control" id="inputslug"
                                    placeholder="EX : 5000mAh" required>
                            </div>

                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Operating System</label>
                                <input type="text" name="os" class="form-control" id="inputslug"
                                    placeholder="EX : iOS 15.5 " required>
                            </div>

                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">Chipset</label>
                                <input type="text" name="chipset" class="form-control" id="inputslug"
                                    placeholder="EX : Apple A13 bionic " required>
                            </div>

                            <div class="col-md-3 form-group py-1">
                                <label for="inputFirstName" class="pb-1">GPU</label>
                                <input type="text" name="gpu" class="form-control" id="inputslug"
                                    placeholder="EX : Apple GPU" required>
                            </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                    <h5 class="mb-3">DESCRIPTIONS</h5>
                        <div class="col-md-6 form-group py-1">
                        
                            <label for="" class="pb-1">Small Description</label>
                            <p>(*input a <span style="color:red;">short</span> and summerized description here.)</p>
                            <textarea class="form-control" name="small_description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>

                        <div class="col-md-6 form-group py-1">
                            <label for="" class="pb-1">Description</label>
                            <p>(*input a <span style="color:red;">longer</span> descriptive description here.)</p>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>
                    </div>
                    <hr>


                    <div class="row mt-3">
                    <h5 class="mb-3">PRODUCT IMAGES</h5>
                    <p>*image 1 is the main image that <span style="color:red;">will be shown</span> to the customer</p>
                    <div class="col-md-3 form-group py-1">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image 1</label>
                        <input class="form-control" name="image1" type="file" id="formFile" required>
                    </div>
                    </div>

                    <div class="col-md-3 form-group py-1">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image 2</label>
                        <input class="form-control" name="image2" type="file" id="formFile" required>
                    </div>
                    </div>

                    <div class="col-md-3 form-group py-1">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image 3</label>
                        <input class="form-control" name="image3" type="file" id="formFile" required>
                    </div>
                    </div>

                    <div class="col-md-3 form-group py-1">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image 4</label>
                        <input class="form-control" name="image4" type="file" id="formFile" required>
                    </div>
                    </div>
                    </div>

                    <hr>

                    <div class="row">
                        <h5 class="mb-3">PRODUCT PRICING</h5>
                        <div class="col-md-4 form-group py-1">
                            <label for="inputPhone" class="pb-1">Original Price</label>
                            <input type="" name="orginal_price" class="form-control" id="inputPhone"
                                placeholder="Enter Your Phone Number" required>
                        </div>

                        <div class="col-md-4 form-group py-1">
                            <label for="inputPhone" class="pb-1">Selling Price</label>
                            <input type="" name="selling_price" class="form-control" id="inputPhone"
                                placeholder="Enter Your Phone Number" required>
                        </div>
                    
                        <div class="col-md-4 form-group py-1">
                            <label for="" class="pb-1">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="inputPhone"
                                placeholder="Enter Your Phone Number" required>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="row">
                    <h5 class="mb-3">VISIBILITY AND FEATURING</h5>
                    <p style="margin:0;">*tick the Hide checkbox to <span style="color:red;">Hide</span> the product to the users.</p>
                    <p>*tick the Feature checkbox to <span style="color:red;">feature</span>  the product to in the homepage.</p>
                                    <div class="col-md-4 form-group py-1">
                                        <div class="form-check">
                                        
                                            <input class="form-check-input"  name="status" type="checkbox" value="" id="flexCheckDefault" >
                                            <label class="form-check-label"  for="flexCheckDefault">
                                                Hide
                                            </label>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group py-1">
                                        <div class="form-check">
                                            <input class="form-check-input" name="feature" type="checkbox" value="" id="flexCheckDefault" >
                                            <label class="form-check-label"  for="flexCheckDefault">
                                                Feature
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    


                    </div>
                    
                        <div class="fluid text-center pt-3">
                            <button type="submit" name="add-product-btn"
                                class="btn btn-primary register-btn-custom">ADD PRODUCT</button>
                        </div>
                    </div>
                </form>
    </div>
    </div>

        
      </main>
      <!-- End Main -->

<?php include("includes/footer.php"); ?>


