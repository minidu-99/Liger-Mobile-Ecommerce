<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<!-- Main -->
<main class="main-container">
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">ORDERS</p>
        </div>

        <!-- ADD category button -->

        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Tracking Number</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>View</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                    $orders = getAllOrders();

                    if(mysqli_num_rows($orders) > 0)
                    {
                        foreach ($orders as $item) {
                            ?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['f_name']?></td>
                            <td><?=$item['tracking_no']?></td>
                            <td>Rs. <?=number_format($item['total_price'])?></td>
                            <td><?=$item['created_at']?></td>
                            <td>
                                <a href="vieworder.php?t=<?=$item['tracking_no']?>" class="btn btn-primary">View Details</a>
                            </td>
                        </tr>
                            <?php
                        }

                    }else
                    {
                        ?>
                        <tr>
                            <td colspan="6">No Orders Yet...</td>
                            
                        </tr>
                            <?php
                    }
            ?>
           

                </tbody>
            </table>
        </div>




























        
      </main>
      <!-- End Main -->
<?php include("includes/footer.php"); ?>