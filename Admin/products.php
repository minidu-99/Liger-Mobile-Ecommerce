<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">PRODUCTS</p>
        </div>

        <!-- ADD category button -->
        <div class="addcategory p-2">
          <a class="btn btn-success" href="addproduct.php" role="button">ADD PRODUCT</a>
        </div>
        <div class="table" id="product-table">
        <table class="table table-striped mt-4">
           <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $products = getAll('products');

                if(mysqli_num_rows($products)>0)
                {
                  foreach($products as $item)
                  {
                    ?>
                      <tr>
                        <td scope="row"><?= $item['id']; ?></th>
                        <td><?= $item['display_name']; ?></td>
                        <td><?= $item['qty']; ?></td>
                        <td>
                          <img src="uploads/product_images/<?= $item['img_1']; ?>" width="50px" height="50px" alt="<?= $item['display_name']; ?>">
                        </td>
                        <td><?= $item['status'] == '0'?"Visible":"Hidden"?></td>
                        <td> 
                          
                          <a type="button" href="editproduct.php?id=<?= $item['id']; ?>" class="btn btn-warning ms-2"><i class="fa-regular fa-pen-to-square"></i></a>
                          
                          <!-- <form action="code.php" method="POST" style="display: inline-block;"> -->
                            <!-- <input   type="hidden" name="category_id" value="<?= $item['id']; ?>"> -->
                            <button  type="button"  class="btn btn-danger delete_prod_btn" value="<?= $item['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                          <!-- </form> -->
                        </td>
                      </tr>
                    <?php
                  }
                }
                else
                {
                  echo "No Records Available";
                }
              
              
              
              ?>
              
              </tbody>
        </table>
        </div>

        
      </main>
      <!-- End Main -->
<?php include("includes/footer.php"); ?>