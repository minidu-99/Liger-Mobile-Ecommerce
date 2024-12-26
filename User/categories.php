<?php
session_start();
include("functions/user_functions.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include("assets/includes/header.php"); ?>
<div class="bg-dark mb-4">
    <div class="container py-4">
      <h3 class="text-white mt-2">Categories</h3>
      <!-- Breadcrumb -->
      <nav class="d-flex mb-2">
        <h6 class="mb-0">
          <a href="home.php" class="text-white-50">Home</a>
          <span class="text-white-50 mx-2"> > </span>
          <a href="categories.php" class="text-white-50">Categories</a>
          <!-- <span class="text-white-50 mx-2"> > </span>
          <a href="" class="text-white"><u>Data</u></a> -->
        </h6>
      </nav>
      <!-- Breadcrumb -->
    </div>
  </div>
</div>
<div class="container">
  <div class="row">



  

<?php
                  $categories = getAllActive("categories");

                      if(mysqli_num_rows($categories) > 0){

                          foreach($categories as $item){
                            ?>
                            <div class="col-md-3 mb-3">
                              <a href="products_by_cat.php?category=<?=$item['slug'];?>">
                              <div class="card shadow">
                                <div class="card-body">
                                  <img src="../Admin/uploads/category_images/<?=$item['image'];?>" alt="category-image" width="271.81px" height="271.81px"class="" >
                                <h4 class="text-center"><?=$item['name'];?></h4>
                                </div>
                                
                              </div>
                              </a>
                            </div>
                            



                        <?php

                          }
                          

                      }else{
                        echo "No category Available !";
                    }

?>
</div>







</div>





<?php include("assets/includes/footer.php"); ?>