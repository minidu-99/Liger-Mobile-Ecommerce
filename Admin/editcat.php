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

                <h2>EDIT CATEGORY</h2>
                <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $category = getbyID('categories', $id);

                    if(mysqli_num_rows($category)>0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                    <div>
                                <form action="code.php" method="POST" enctype="multipart/form-data">

                                <div class="row">

                                <div class="col-md-6 form-group py-1">
                                        <input type="hidden" name="category_id" value="<?=$data['id']?>">
                                        <label for="inputFirstName" class="pb-1">Name</label>
                                        <input type="text" value="<?=$data['name']?>" name="name" class="form-control" id="inputName"
                                            placeholder="Enter your first name" require>
                                    </div>

                                    <div class="col-md-6 form-group py-1">
                                        <label for="inputFirstName" class="pb-1">Slug</label>
                                        <input type="text" value="<?=$data['slug']?>" name="slug" class="form-control" id="inputslug"
                                            placeholder="Enter your first name" require>
                                    </div>
                                </div>
                                    

                                    <div class="form-group py-1">
                                        <label for="inputLname" class="pb-1">Description</label>
                                        <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3" require><?=$data['description']?></textarea>
                                    </div>

                                    <div class="form-group py-1">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Image </label>
                                        <input class="form-control" name="image" type="file" id="formFile" require>
                                        <label for="formFile" class="form-label">Current Image </label>
                                        
                                        <input type="hidden" name="old_image" value="<?=$data['image']?>">
                                        <img src="uploads/category_images/<?=$data['image']?>" height="50px" width="50px" alt="">
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6 form-group py-1">
                                        <div class="form-check">
                                            <input class="form-check-input" <?=$data['status'] ? "checked":""?> name="status" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Hide
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group py-1">
                                        <div class="form-check">
                                            <input class="form-check-input" name="popular" <?=$data['popular'] ? "checked":""?> type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label"  for="flexCheckDefault">
                                                Popular
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    
                                        <div class="fluid text-center pt-3">
                                            <button type="submit" name="update-cat-btn"
                                                class="btn btn-primary register-btn-custom">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    <?php
                    }else
                    {
                        echo "Category not found";
                    }

                    
                }
                else
                {
                    echo "ID is missing from the URL !";
                }
                 ?>
                


                <!-- <form action="code.php" method="POST" enctype="multipart/form-data">

                <div class="row">

                <div class="col-md-6 form-group py-1">
                        <label for="inputFirstName" class="pb-1">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName"
                            placeholder="Enter your first name" require>
                    </div>

                    <div class="col-md-6 form-group py-1">
                        <label for="inputFirstName" class="pb-1">Slug</label>
                        <input type="text" name="slug" class="form-control" id="inputslug"
                            placeholder="Enter your first name" require>
                    </div>
                </div>
                    

                    <div class="form-group py-1">
                        <label for="inputLname" class="pb-1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" require></textarea>
                    </div>

                    <div class="form-group py-1">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image 1</label>
                        <input class="form-control" name="image" type="file" id="formFile" require>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6 form-group py-1">
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Status
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6 form-group py-1">
                        <div class="form-check">
                            <input class="form-check-input" name="popular" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Popular
                            </label>
                        </div>
                    </div>
                    </div>
                    
                        <div class="fluid text-center pt-3">
                            <button type="submit" name="add-cat-btn"
                                class="btn btn-primary register-btn-custom">ADD CATEGORY</button>
                        </div>
                    </div>
                </form> -->
    </div>
    </div>

        
      </main>
      <!-- End Main -->

<?php include("includes/footer.php"); ?>