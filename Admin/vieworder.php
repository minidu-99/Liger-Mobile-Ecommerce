<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); 

if($_GET['t'])
{
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);

    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
            <h4>Something went wrong !</h4>
        <?php
        die();
    }
}else
{
    ?>
        <h4>Something went wrong !</h4>
    <?php
    die();
    
}
$data = mysqli_fetch_array($orderData);
?>

<!-- Main -->
<main class="main-container">
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">ORDERS</p>
        </div>

        <!-- ADD category button -->

        <div class="col-md-12 pt-1" style="padding:0;">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <h4>Delivery Details</h4>
                        <hr>   
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">First Name</label>
                                    <div class="border p-1">
                                    <?=$data['f_name'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Last Name</label>
                                    <div class="border p-1">
                                    <?=$data['l_name'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">E-mail</label>
                                    <div class="border p-1">
                                    <?=$data['email'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Phone Number</label>
                                    <div class="border p-1">
                                    <?=$data['phone'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Tracking Number</label>
                                    <div class="border p-1">
                                    <?=$data['tracking_no'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Address</label>
                                    <div class="border p-1">
                                    <?=$data['address'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Postal Code</label>
                                    <div class="border p-1">
                                    <?=$data['postal_code'];?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                   
                                        <?php
                                         

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty,p.* FROM orders o, order_items oi,
                                                products p WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";

                                            $order_query_run = mysqli_query($con, $order_query);

                                            if(mysqli_num_rows($order_query_run) > 0)
                                            {
                                                foreach ($order_query_run as $key => $item) {

                                                    ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="../Admin/uploads/product_images/<?=$item['img_1'];?>" class="w-25" alt="<?=$item['display_name'];?>">
                                                                <?=$item['display_name'];?>
                                                            </td>

                                                            <td class="align-middle">
                                                                 Rs.<?=number_format($item['price']);?>
                                                            </td class="align-middle">

                                                            <td class="align-middle">
                                                                 x<?=$item['orderqty'];?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                }

                                            }
                                        
                                        ?>
                                 </tbody>
                            </table>

                            <hr>
                            <h4>Total Price : <span class="float-end">Rs. <?=number_format($data['total_price'])?></span></h4>
                            <hr>

                            <label class="fw-bold">Payment Mode</label>
                            <div class="border p-1 mb-3">    
                            <?=$data['payment_mod']?>
                            </div>

                            <label class="fw-bold">Status</label>
                            <div class=" p-1 mb-3">
                                <form action="code.php" method="POST">
                                <input type="hidden" name="tracking_no" value="<?=$data['tracking_no']?>">
                                <select name="order_status" id="" class="form-select">
                                    <option value="0" <?=$data['status'] == 0? "selected":"" ?>>Under Process</option>
                                    <option value="1" <?=$data['status'] == 1? "selected":"" ?>>Picked by the courirer</option>
                                    <option value="2" <?=$data['status'] == 2? "selected":"" ?>>On the Way</option>
                                    <option value="3" <?=$data['status'] == 3? "selected":"" ?>>Completed</option>
                                </select>
                                <button type="submit" name="update_status_btn" class="btn btn-primary mt-2">Update Status</button>
                                </form>        
                    </div>
            </div>
     </div>
</main>
      <!-- End Main -->
<?php include("includes/footer.php"); ?>