<?php
session_start();
// include('database/dbcon.php');
include("functions/user_functions.php");



if(isset($_POST['message-btn']))
{

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_message = $_POST['message'];

    $message_query = "INSERT INTO customer_inquiries (cus_name,cus_phone,cus_email,message)
                        VALUES('$customer_name','$customer_phone','$customer_email','$customer_message')";
    
    $message_query_run = mysqli_query($con, $message_query);

    if($message_query_run){

        $_SESSION['message']="Thank you for you valuble feedback, we'll get back to you soon!";
        header("Location: contact.php");
        
    }else{
        redirect("contact.php","Something went wrong !");
    }

    




}












?>