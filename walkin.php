<?php

include('walkin/header.php');
include('functions/userfunctions.php');
// include('../config/dbcon.php');


?>
<style>
            .zoom-img{
                transition: transform 1s;
            }
            .hover-zoom:hover{
                transform: scale(1.1);
            }
            
               
        </style>






<div class="container-fluid">
    <div class="container product_data mb-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mb-5 text-uppercase">SELECT ORDER</h3>
                <a href="orderCart.php" class="text-dark btn" >Go to cart</a>
                <div class="row">

                <?php
                           $products = getAllActive("products");

                            if(mysqli_num_rows($products) > 0)
                            {
                                foreach ($products as $item) 
                                {
                                    ?>
                                      <div class="col-md-3 pb-4 pt-1">
                                        <a href="getOrders.php?product=<?= $item['name']; ?>"> 
                                            <div class="card rounded border-0 p-1">
                                                <span class="badge text-dark"><?php if($item['qty']<=0){ echo "Soldout";} ?></span>
                                                <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100 zoom-img hover-zoom" >
                                                    <h5 class="pt-3"><?= $item['name']; ?> </h5>
                                            </a>
                                            <span class="py-5" style="font-size: 28px;">&#8369 <?= $item['selling_price']; ?></span>
                                            
                                        
                                            <div class="float-right pt-3 m-auto text-muted">
                                                <a href="getOrders.php?product=<?= $item['name']; ?>">

                                                    <span class="btn btn-dark w-100">add order<i class="fas fa-angle-right p-1 text-muted" style="font-size: 14px;"></i></span>
                                                </a>
                                            </div></a>
                                              </div>
                                            </div>
                                            
                    
                                    </div>
    

                                    <?php
                                }

                            }
                            else
                            {
                                echo "No Product's Found.";
                            }
                        ?>
                </div>
            </div>
        </div>
  

