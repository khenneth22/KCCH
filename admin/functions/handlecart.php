<?php
session_start();
include('../../config/dbcon.php');

if(isset($_POST['scope']))
{
    $scope = $_POST['scope'];
    switch($scope)
    {

            //Adding item in cart
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];

                // check if an order item with the same prod_id already exists
                    $sql = "SELECT * FROM walkin_cart WHERE prod_id = $prod_id";
                    $result = mysqli_query($con, $sql);
                    
                    if (mysqli_num_rows($result) > 0) 
                    {

                    // if an order item exists, update the quantity by adding the new quantity to the existing quantity
                    $row = mysqli_fetch_assoc($result);
                    $new_quantity = $row['prod_qty'] + $prod_qty;

                    $sql = "UPDATE walkin_cart SET prod_qty = $new_quantity WHERE prod_id = " . $row['prod_id'];
                    mysqli_query($con, $sql);

                    echo 201;

                    } 
                    else 
                    {
                    // if no order item exists, insert a new one with the given quantity
                        $insert_query = "INSERT INTO walkin_cart (`prod_id`, `prod_qty`) VALUES ('$prod_id', '$prod_qty')";
                        $insert_query_run = mysqli_query($con, $insert_query);
                    
                        if($insert_query_run)
                        {
                            echo 201;
                            
                        }
                        else
                        {
                            echo 500;
                        }

                    } 
                
                break;
                 //updating the quantity in cart
            case "update":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];

                $chk_existing_cart = "SELECT * FROM walkin_cart WHERE prod_id='$prod_id' ";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

                if(mysqli_num_rows($chk_existing_cart_run) > 0)
                {
                    $update_query = "UPDATE walkin_cart SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' ";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run)
                    {
                        echo 200;
                    }
                    else{
                        echo 500;
                    }
                }
                else
                {
                    echo "Something went wrong!";
                }
                break;
            default: 
                echo 500;
            }

           
}

?>