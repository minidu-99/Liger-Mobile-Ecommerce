<?php

//session_start();
include('functions/myfunctions.php');
include('database/dbcon.php');


if(isset($_POST['add-cat-btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    
    $status = isset($_POST['status'])?'1':'0';  
    $popular = isset($_POST['popular'])?'1':'0'; 

    $image = $_FILES['image']['name'];

    $path = "uploads/category_images";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext; 

    $cate_query = "INSERT into categories (name, slug, description, image, status, popular)
    VALUES('$name', '$slug', '$description', '$filename', '$status', '$popular' )";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("addcat.php","Category Added Successfully");
    }
    else
    {
        redirect("addcat.php","Something went wrong");

    }
    


}
else if(isset($_POST['update-cat-btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    
    $status = isset($_POST['status'])?'1':'0';  
    $popular = isset($_POST['popular'])?'1':'0'; 

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_file_name = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_file_name = time().'.'.$image_ext;
    }
    else
    {
        $update_file_name = $old_image;
    }

    $path = "uploads/category_images";

    $update_query = "UPDATE categories SET name='$name', slug='$slug',
    description='$description', image='$update_file_name', status='$status', popular='$popular' WHERE id='$category_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_file_name);
            if(file_exists("uploads/".$old_image))
            {
                unlink("uploads/".$old_image);   
            }

        }
        redirect("editcat.php?id=$category_id", "Category Updated Successfully !");
    }
    else
    {
        redirect("editcat.php?id=$category_id", "Something went wrong !");
    }

    

}else if(isset($_POST['delete_cat_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    
    $category_query_run = mysqli_query($con, $category_query);
    $cat_data = mysqli_fetch_array($category_query_run);
    $image = $cat_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";

    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("uploads/category_images/".$image))
            {
                unlink("uploads/category_images/".$image);   
            }
        // redirect("category.php", "Category Deleted Successfully !");
        echo 200;
    }else
    {
        // redirect("category.php", "Something went wrong !");
        echo 500;
    }

}else if(isset($_POST['add-product-btn']))
{
    $category_id = $_POST['category_id'];

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $display_name = $_POST['display_name'];
    $slug = $_POST['slug'];
    $color = $_POST['color'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $display = $_POST['display'];
    $main_camera = $_POST['main_camera'];
    $secondary_camera = $_POST['secondary_camera'];
    $battery = $_POST['battery'];
    $os = $_POST['os'];
    $chipset = $_POST['chipset'];
    $gpu = $_POST['gpu'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['orginal_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['quantity'];

    
    $status = isset($_POST['status'])?'1':'0';  
    $featured = isset($_POST['feature'])?'1':'0'; 

    $image_1 = $_FILES['image1']['name'];
    $image_2 = $_FILES['image2']['name'];
    $image_3 = $_FILES['image3']['name'];
    $image_4 = $_FILES['image4']['name'];

    $path = "uploads/product_images";

    $image_ext_1 = pathinfo($image_1, PATHINFO_EXTENSION);
    $image_ext_2 = pathinfo($image_2, PATHINFO_EXTENSION);
    $image_ext_3 = pathinfo($image_3, PATHINFO_EXTENSION);
    $image_ext_4 = pathinfo($image_4, PATHINFO_EXTENSION);

    $filename_1 = time().'.'.uniqid().'.'.$image_ext_1;
    $filename_2 = time().'.'.uniqid().'.'.$image_ext_2; 
    $filename_3 = time().'.'.uniqid().'.'.$image_ext_3; 
    $filename_4 = time().'.'.uniqid().'.'.$image_ext_4;


    $product_query = "INSERT INTO products
    (category_id, brand, model, display_name, slug, color, display, os, ram, rom, main_camera, secondary_camera, battery, chipset, gpu, small_description, description, original_price, selling_price,
     img_1, img_2, img_3, img_4, qty, status, featured)
     VALUES('$category_id','$brand', '$model', '$display_name', '$slug','$color', '$display','$os',
     '$ram','$rom','$main_camera','$secondary_camera','$battery','$chipset','$gpu', '$small_description',
     '$description','$original_price','$selling_price', '$filename_1','$filename_2','$filename_3','$filename_4',
     '$qty','$status','$featured')";

    
    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run)
    {
        move_uploaded_file($_FILES['image1']['tmp_name'], $path.'/'.$filename_1);
        move_uploaded_file($_FILES['image2']['tmp_name'], $path.'/'.$filename_2);
        move_uploaded_file($_FILES['image3']['tmp_name'], $path.'/'.$filename_3);
        move_uploaded_file($_FILES['image4']['tmp_name'], $path.'/'.$filename_4);
        
        redirect("addproduct.php","Product Added Successfully");
    }
    else
    {
        redirect("addproduct.php","Something went wrong");

    }

}else if(isset($_POST['update-product-btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $display_name = $_POST['display_name'];
    $slug = $_POST['slug'];
    $color = $_POST['color'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $display = $_POST['display'];
    $main_camera = $_POST['main_camera'];
    $secondary_camera = $_POST['secondary_camera'];
    $battery = $_POST['battery'];
    $os = $_POST['os'];
    $chipset = $_POST['chipset'];
    $gpu = $_POST['gpu'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['orginal_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['quantity'];

    
    $status = isset($_POST['status'])?'1':'0';  
    $featured = isset($_POST['feature'])?'1':'0'; 


    $new_image_1 = $_FILES['image1']['name'];
    $new_image_2 = $_FILES['image2']['name'];
    $new_image_3 = $_FILES['image3']['name'];
    $new_image_4 = $_FILES['image4']['name'];
    
    $old_image_1 = $_POST['old_image_1'];
    $old_image_2 = $_POST['old_image_2'];
    $old_image_3 = $_POST['old_image_3'];
    $old_image_4 = $_POST['old_image_4'];

    if($new_image_1 != "")
    {
        // $update_file_name = $new_image;
        $image_ext_1 = pathinfo($new_image_1, PATHINFO_EXTENSION);
        $update_file_name_1 = time().'.'.uniqid().'.'.$image_ext_1;
    }
    else
    {
        $update_file_name_1 = $old_image_1;
    }

    if($new_image_2 != "")
    {
        // $update_file_name = $new_image;
        $image_ext_2 = pathinfo($new_image_2, PATHINFO_EXTENSION);
        $update_file_name_2 = time().'.'.uniqid().'.'.$image_ext_2;
    }
    else
    {
        $update_file_name_2 = $old_image_2;
    }

    if($new_image_3 != "")
    {
        // $update_file_name = $new_image;
        $image_ext_3 = pathinfo($new_image_3, PATHINFO_EXTENSION);
        $update_file_name_3 = time().'.'.uniqid().'.'.$image_ext_3;
    }
    else
    {
        $update_file_name_3 = $old_image_3;
    }

    if($new_image_4 != "")
    {
        // $update_file_name = $new_image;
        $image_ext_4 = pathinfo($new_image_4, PATHINFO_EXTENSION);
        $update_file_name_4 = time().'.'.uniqid().'.'.$image_ext_4;
    }
    else
    {
        $update_file_name_4 = $old_image_4;
    }


    $update_product_query = "UPDATE products SET category_id='$category_id', model='$model', display_name='$display_name', slug='$slug', color='$color', 
    display='$display', os='$os', ram='$ram', rom='$rom', main_camera='$main_camera', secondary_camera='$secondary_camera', battery='$battery', chipset='$chipset', 
    gpu='$gpu', small_description='$small_description', description='$description', original_price='$original_price', selling_price='$selling_price',
    img_1='$update_file_name_1', img_2='$update_file_name_2', img_3='$update_file_name_3', img_4='$update_file_name_4', 
    qty='$qty', status='$status', featured='$featured' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    $path = "uploads/product_images";

    if($update_product_query_run)
    {
        if($_FILES['image1']['name'] != "")
        {
            move_uploaded_file($_FILES['image1']['tmp_name'], $path.'/'.$update_file_name_1);
            if(file_exists("uploads/product_images/".$old_image_1))
            {
                unlink("uploads/product_images/".$old_image_1);   
            }

        }

        if($_FILES['image2']['name'] != "")
        {
            move_uploaded_file($_FILES['image2']['tmp_name'], $path.'/'.$update_file_name_2);
            if(file_exists("uploads/product_images/".$old_image_2))
            {
                unlink("uploads/product_images/".$old_image_2);   
            }

        }

        if($_FILES['image3']['name'] != "")
        {
            move_uploaded_file($_FILES['image3']['tmp_name'], $path.'/'.$update_file_name_3);
            if(file_exists("uploads/product_images/".$old_image_3))
            {
                unlink("uploads/product_images/".$old_image_3);   
            }

        }

        if($_FILES['image4']['name'] != "")
        {
            move_uploaded_file($_FILES['image4']['tmp_name'], $path.'/'.$update_file_name_4);
            if(file_exists("uploads/product_images/".$old_image_4))
            {
                unlink("uploads/product_images/".$old_image_4);   
            }

        }
        redirect("editproduct.php?id=$product_id", "Product Updated Successfully !");
    }
    else
    {
        redirect("editproduct.php?id=$product_id", "Something went wrong !");
    }

}else if(isset($_POST['delete_prod_btn']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image_1 = $product_data['img_1'];
    $image_2 = $product_data['img_2'];
    $image_3 = $product_data['img_3'];
    $image_4 = $product_data['img_4'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";

    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("uploads/product_images/".$image_1))
            {
                unlink("uploads/product_images/".$image_1);   
            }

        if(file_exists("uploads/product_images/".$image_2))
            {
                unlink("uploads/product_images/".$image_2);   
            }
        if(file_exists("uploads/product_images/".$image_3))
            {
                unlink("uploads/product_images/".$image_3);   
            }
        if(file_exists("uploads/product_images/".$image_4))
            {
                unlink("uploads/product_images/".$image_4);   
            }
        // redirect("products.php", "product Deleted Successfully !");
        echo 200;
    }else
    {
        // redirect("products.php", "Something went wrong !");
        echo 500;
    }
}else if(isset($_POST['update_status_btn']))
{
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $update_order_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
    $update_order_query_run = mysqli_query($con, $update_order_query);

    redirect("vieworder.php?t=$track_no", "Order Status  Updated Successfully ! ");


}else if(isset($_POST['update_message_status_btn']))
{
    $message_id = $_POST['message_id'];
    $feedback_status = $_POST['message_status'];

    $update_message_query = "UPDATE customer_inquiries SET status='$feedback_status' WHERE id='$message_id '";
    $update_message_query_run = mysqli_query($con, $update_message_query);

    redirect("inquiries.php", "Message Status  Updated Successfully !");
}else
{
    header("Location: ./dashboard.php");
}
?>