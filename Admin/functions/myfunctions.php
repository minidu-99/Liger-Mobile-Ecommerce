<?php
session_start();
include('./database/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getAllinq($id)
{
    global $con;
    $query = "SELECT * FROM customer_inquiries WHERE id='$id'";
    return $query_run = mysqli_query($con, $query);
}

function getPendinginq()
{
    global $con;
    $query = "SELECT * FROM customer_inquiries WHERE status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getCompleteinq()
{
    global $con;
    $query = "SELECT * FROM customer_inquiries WHERE status='1'";
    return $query_run = mysqli_query($con, $query);
}

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status ='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllHide($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status ='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getbyID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($con, $query);
}


function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($tracking_no)
{
    global $con;
    

    $query = "SELECT * FROM orders WHERE tracking_no='$tracking_no'";
    return mysqli_query($con, $query);
}

function CompleteOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='3'";
    return mysqli_query($con, $query);
}

function pendingOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='0'";
    return mysqli_query($con, $query);
}


function todayOrders()
{
    global $con;
    $sql = "SELECT SUM(total_price) AS total_price FROM orders WHERE DATE(order_date) = CURDATE()";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    return $row->total_price;
 
}

function pastSevenDays()
{
    global $con;
    $sql = "SELECT SUM(total_price) AS total_price FROM orders WHERE order_date BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    return $row->total_price;
}

function pastThityDays()
{
    global $con;
    $sql = "SELECT SUM(total_price) AS total_price FROM orders WHERE order_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    return $row->total_price;
}



function redirect($url, $message)
{
    $_SESSION['message'] = $message ;
    header('Location: '.$url);
    exit();


}



?>