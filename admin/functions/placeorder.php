<?php

session_start();
include('../../config/dbcon.php');

if(isset($_POST['orderCartSubmit']))
{
    // $total_price = mysqli_real_escape_string($con, $_POST['total_price']);
    $inputQty = mysqli_real_escape_string($con, $_POST['inputQty']);


    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
    FROM walkin_cart c, products p WHERE c.prod_id=p.id ORDER BY c.id DESC ";
    $query_run = mysqli_query($con, $query);

    $totalPrice = 0;
    $total = 0;
      foreach($query_run as $citem)
      {
          // $add_ons = $citem['add_ons'];
          // $add_ons_total = $citem['add_ons_total'];

          $total +=  $citem['selling_price'] * $citem['prod_qty'];

        }

    $tracking_no = "kcchOrder#".rand(111,999);
    $userId = rand(1000, 9999);

    $query = "INSERT INTO orders (tracking_no, user_id, status, total_price) VALUES ('$tracking_no', $userId , 2, '$total')";
    $result = mysqli_query($con, $query);

    if($result)
    {
        foreach($query_run as $citem)
        {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];
            $price = $citem['selling_price'];

            $insert_items_query = "INSERT INTO order_items (prod_id, qty, price) VALUES ('$prod_id', '$prod_qty', '$price')";
            $insert_items_query_run = mysqli_query($con, $insert_items_query);

            $product_query = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1";
            $product_query_run = mysqli_query($con, $product_query);

            $productData = mysqli_fetch_array($product_query_run);
            $current_qty = $productData['qty'];

            $new_qty = $current_qty - $prod_qty;

            $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id' ";
            $updateQty_query_run = mysqli_query($con, $updateQty_query);
        }

            $deleteCartQuery = "DELETE FROM walkin_cart ";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            
            $_SESSION['message'] = "Order Placed Successfully, Thank You!";
    }
    header('Location: ../walkinOrders.php');

}
else
{
    header('Location: ../walkinOrders.php');
}


if(isset($_POST['deleteItems']))
{
    $id = $_POST['deleteItems'];

    $delete_query = "DELETE FROM walkin_cart WHERE id='$id' LIMIT 1 ";
    $query_run = mysqli_query($con, $delete_query);
    // echo $id;
    if($query_run)
    {
        redirect("orderCart.php", "Delete successfully!");
    }
}


?>