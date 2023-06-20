<?php

//session_start();
include('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '0' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getPendingOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '1' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getCompleteOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '2' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getDeliveryOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '3' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getPickupOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '4' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getCancelledOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '5' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
    FROM walkin_cart c, products p WHERE c.prod_id=p.id ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function getAllAdmin($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status != 0 ";
    return $query_run = mysqli_query($con, $query);
}
function getAdmin()
{
    global $con;
    $query = "SELECT * FROM users WHERE role_as = 1 ";
    return $query_run = mysqli_query($con, $query);
}
function getUsers()
{
    global $con;
    $query = "SELECT * FROM users WHERE role_as = 0 AND is_verified = 1 ORDER BY id ASC";
    return $query_run = mysqli_query($con, $query);
}

function getAllDelivery($table, $date)
{
    global $con;
    $query = "SELECT * FROM $table WHERE payment_mode='COD' AND DATE(created_at) = '$date'";
    return $query_run = mysqli_query($con, $query);
}

function getAllSalesDay($table, $date)
{
    global $con;
    $query = "SELECT * FROM $table WHERE DATE(created_at) = '$date'";
    return $query_run = mysqli_query($con, $query);
}

function getAllSalesWeek($table, $date)
{
    global $con;
    $query = "SELECT * FROM $table WHERE YEARWEEK(created_at, 0) = YEARWEEK('$date', 0)"; 
    return $query_run = mysqli_query($con, $query);
}

function getAllSalesMonth($table, $date)
{
    global $con;
    $query = "SELECT * FROM $table WHERE YEAR(created_at) = YEAR('$date') AND MONTH(created_at) = MONTH('$date');";
    return $query_run = mysqli_query($con, $query);
}
function getAllSalesYear($table, $date)
{
    global $con;
    $query = "SELECT * FROM $table WHERE YEAR(created_at) = YEAR('$date') ;";
    return $query_run = mysqli_query($con, $query);
}

function getBestSellerDay($table, $date)
{
    global $con;
    $query = "SELECT prod_id, COUNT(*) AS count FROM $table WHERE DATE(created_at) = '$date' GROUP BY prod_id ORDER BY count DESC LIMIT 5";
    return $query_run = mysqli_query($con, $query);
}

function getBestSellerWeek($table, $date)
{
    global $con;
    $query = "SELECT prod_id, COUNT(*) AS count FROM $table WHERE YEARWEEK(created_at, 0) = YEARWEEK('$date', 0) ORDER BY count DESC LIMIT 5";
    return $query_run = mysqli_query($con, $query);
}

function getBestSellerMonth($table, $date)
{
    global $con;
    $query = "SELECT prod_id, COUNT(*) AS count FROM $table WHERE YEAR(created_at) = YEAR('$date') AND MONTH(created_at) = MONTH('$date') GROUP BY prod_id ORDER BY count DESC LIMIT 5";
    return $query_run = mysqli_query($con, $query);
}

function getBestSellerProductName($table, $prod_id)
{
    global $con;
    $query = "SELECT name,prod_code FROM $table WHERE id = $prod_id ORDER BY id ASC";
    return $query_run = mysqli_query($con, $query);
}

function getAllSales($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getAllAccountHistory($table, $user_id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE user_id = $user_id";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getOrderHistory()
{
    global $con;
    
    $query = "SELECT * FROM orders WHERE status !='0' ORDER BY id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function getAllBanners()
{
    global $con;
    $query = "SELECT * FROM banners ORDER BY id DESC";
    return mysqli_query($con, $query);
}

function checkValidTrackingNo($trackingNo)
{
    global $con;
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
    return mysqli_query($con, $query);
}

function getReviews()
{
    global $con;
    $query = "SELECT * FROM reviews ORDER BY id ASC";
    return $query_run = mysqli_query($con, $query);
}

function getWalkinOrders()
{
    global $con;
    $query = "SELECT * FROM walkin INNER JOIN products ON walkin.prod_id=products.id Group By walkin.id ";
    return $query_run = mysqli_query($con, $query);
}
function getWalkinOrder()
{
    global $con;
    $query = "SELECT * FROM tbl_walkin order By id desc ";
    return $query_run = mysqli_query($con, $query);
}
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $name)
{
    global $con;
    $query = "SELECT * FROM $table WHERE name='$name' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getTestimonies()
{
    global $con;
    $query = "SELECT * FROM testimonies ORDER BY id ASC";
    return $query_run = mysqli_query($con, $query);
}

function getProdCode()
{
    global $con;
    $query = "UPDATE order_items SET order_items.prod_code = (SELECT products.prod_code FROM products WHERE products.id = order_items.prod_id)";
    return $query_run = mysqli_query($con, $query);
}

function dlPdf()
{
    global $con;
    $query = "SELECT * FROM order_items";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}

//get all stocks
function getStocks()
{
    global $con;
    $query = "SELECT * FROM tbl_stocks";
    return $query_run = mysqli_query($con, $query);
}

function joinTbl()
{
    global $con;
    $query = "SELECT products.prod_code, order_items.prod_id FROM products, order_items WHERE products.prod_code = order_items.prod_id";
    return $query_run = mysqli_query($con, $query);
}

?>