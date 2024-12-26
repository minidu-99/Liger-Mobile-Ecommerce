<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<!-- Main -->
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">INQUIERIES</p>
        </div>

        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>View</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                    $inquieries = getAll("customer_inquiries");

                    if(mysqli_num_rows($inquieries) > 0)
                    {
                        foreach ($inquieries as $item) {
                            ?>
                        <tr>
                            <td><?=$item['id']?></td>
                            <td><?=$item['cus_name']?></td>
                            <td><?=$item['cus_email']?></td>
                            <td><?=$item['status'] == '0' ? "Pending":"Responded"?></td>
                            <td><?=$item['date']?></td>
                            <td>
                                <a href="view_message.php?id=<?=$item['id']?>" class="btn btn-primary">View Details</a>
                            </td>
                        </tr>
                            <?php
                        }

                    }else
                    {
                        ?>
                        <tr>
                            <td colspan="5">No Inquiries Yet...</td>
                            
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