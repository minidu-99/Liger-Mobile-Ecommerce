<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); 

if($_GET['id'])
{
    $inq_id = $_GET['id'];

    $inq_Data = getAllinq($inq_id);

    if(mysqli_num_rows($inq_Data) < 0)
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
$data = mysqli_fetch_array($inq_Data);
?>

<!-- Main -->
<main class="main-container">
<main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">INQUIERIES</p>
        </div>

        <!-- ADD category button -->

        <div class="col-md-12 pt-1" style="padding:0;">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <h4>Delivery Details</h4>
                        <hr>   
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Name</label>
                                    <div class="border p-1">
                                    <?=$data['cus_name'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">E-mail</label>
                                    <div class="border p-1">
                                    <?=$data['cus_email'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Phone Number</label>
                                    <div class="border p-1">
                                    <?=$data['cus_phone'];?>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label class="fw-bold">Message</label>
                                    <div class="border p-1">
                                    <?=$data['message'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
                                   
                                        
                            <label class="fw-bold">Status</label>
                            <div class=" p-1 mb-3">
                                <form action="code.php" method="POST">
                                <input type="hidden" name="message_id" value="<?=$data['id']?>">
                                <select name="message_status" id="" class="form-select">
                                    <option value="0" <?=$data['status'] == '0'? "selected":"" ?>>Pending</option>
                                    <option value="1" <?=$data['status'] == '1'? "selected":"" ?>>Responded</option>
                                </select>
                                <button type="submit" name="update_message_status_btn" class="btn btn-primary mt-2">Update Status</button>
                                </form>        
                    </div>
            </div>
     </div>
</main>
      <!-- End Main -->
<?php include("includes/footer.php"); ?>