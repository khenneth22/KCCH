<?php
include('../config/dbcon.php');


if (isset($_POST['price'])) {
    $price = $_POST['price'];

    // Insert the price into the database
    $sql = "INSERT INTO orders (voucher) VALUES ('$price')";
    $res = mysqli_query($con, $sql);
}


?>