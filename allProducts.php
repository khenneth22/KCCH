<!-- Display Featured Product -->
<?php 
//session_start();
include('includes/header.php');
include('functions/userfunctions.php'); ?>

<style>
            .zoom-img{
                transition: transform 1s;
            }
            .hover-zoom:hover{
                transform: scale(1.1);
            }
            
               
        </style>



<div class="container-fluid">
    <div class="container mb-4 mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mb-5 text-uppercase">All Products</h3>
                <div class="row">

                <?php
                           $products = getAllActive("products");

                            if(mysqli_num_rows($products) > 0)
                            {
                                foreach ($products as $item) 
                                {
                                    ?>
                                      <div class="col-md-3 pb-4 pt-1">
                                        <a href="product-desc.php?product=<?= $item['slug']; ?>"> 
                                            <div class="card rounded border-0 p-1">
                                                <span class="badge"><?php if($item['new']){ echo "New";} ?></span>
                                                <span class="badge"><?php if($item['bestseller']){ echo "Best Seller";} ?></span>
                                                <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100 zoom-img hover-zoom" >
                                                    <h5 class="pt-3"><?= $item['name']; ?> </h5>
                                            </a>
                                            <span class=" cut-text" style="color: #1e2029; font-size: 12px;"><?= $item['small_description']; ?></span><br>
                                            <span class="py-5" style="font-size: 28px;">&#8369 <?= $item['selling_price']; ?></span>
                                            <span class="py-5" style="font-size: 16px;"><del>&#8369 <?= $item['original_price']; ?></del> </span>
                                            <a href="product-desc.php?product=<?= $item['slug']; ?>">
                                            <div class="float-right pt-3 m-auto text-muted">
                                                <span class="py-5">view<i class="fas fa-angle-right p-1 text-muted" style="font-size: 14px;"></i></span>
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
    </div>
    </div>

    <?php 

// include('includes/footer.php');
 ?>