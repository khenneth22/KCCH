<?php

//session_start();
include('config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getReviews($product_name)
{
    global $con;
    $query = "SELECT * FROM reviews WHERE product='$product_name'";
    return $query_run = mysqli_query($con, $query);
}
function getTestimonial($status)
{
    global $con;
    $query = "SELECT * FROM testimonies WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getProdByFeature($feature)
{
    global $con;
    $query = "SELECT * FROM products WHERE feature='$feature' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, c.add_ons, c.add_ons_total, p.id as pid, p.name, p.image, p.selling_price 
                FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function getOrdersAdmin()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status != 0 ORDER BY id  DESC";
    return $query_run = mysqli_query($con, $query);
}

function getSavedAddress($id)
{
    global $con;
    $query = "SELECT * FROM saved_address WHERE user_id='$id'";
    return $query_run = mysqli_query($con, $query);
}

function getOrdersUsers()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status != 0 ORDER BY id  DESC";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}

function checkValidTrackingNo($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId' ";
    return mysqli_query($con, $query);
}

function getPendingOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status = '0' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}
function getProcessOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '1' ORDER BY id desc";
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

function getCompleteOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status = '2' ORDER BY id desc";
    return $query_run = mysqli_query($con, $query);
}

// function getCartCount($cart_id)
    // {
    //     global $con;
    //     $userId = $_SESSION['auth_user']['user_id'];
    //     $query = "SELECT * FROM carts WHERE user_id='$userId'";
    //     return $query_run = mysqli_query($con, $query);
    // }
?>