<?php

//session_start();
include('config/dbcon.php');


function getCartCount($cart_id)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM carts WHERE user_id='$userId'";
    return $query_run = mysqli_query($con, $query);
}
?>