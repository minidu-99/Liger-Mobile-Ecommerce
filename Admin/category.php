<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>



<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">CATEGORIES</p>
        </div>

        <!-- ADD category button -->
        <div class="addcategory p-2">
          <a class="btn btn-success" href="addcat.php" role="button">ADD CATEGORY</a>
        </div>
        <div class="table" id="category-table">
        <table class="table table-striped mt-4">
           <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $category = getAll('categories');

                if(mysqli_num_rows($category)>0)
                {
                  foreach($category as $item)
                  {
                    ?>
                      <tr>
                        <td scope="row"><?= $item['id']; ?></th>
                        <td><?= $item['name']; ?></td>
                        <td>
                          <img src="uploads/category_images/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                        </td>
                        <td><?= $item['status'] == '0'?"Visible":"Hidden"?></td>
                        <td> 
                          
                          <a type="button" href="editcat.php?id=<?= $item['id']; ?>" class="btn btn-warning ms-2"><i class="fa-regular fa-pen-to-square"></i></a>
                          
                          <!-- <form action="code.php" method="POST" style="display: inline-block;">
                            
                            <button  type="submit"  class="btn btn-danger" name="delete_cat_btn"><i class="fa-solid fa-trash-can"></i></button>
                          </form> -->

                          <button  type="button"  class="btn btn-danger delete_cat_btn" value="<?= $item['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
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