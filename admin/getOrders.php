
<?php

include('includes/header.php');
include('../middleware/adminMiddleware.php');


    if(isset($_GET['product']))
    {
        $product_slug = $_GET['product'];
        $product_data = getSlugActive("products", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product)
        {
            ?>
         <div class="card card-body m-3 ">
           <div class="container product_data ">
             <button type="button" class="btn"  onclick="history.back();"><i class="fas fa-chevron-left"></i> back</button>
             <a href="orderCart.php" class="text-dark btn" >Go to cart</a>
             
                 <div class="row">

                 <div class="col-md-6 mb-5">
                   <img src="../uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100" class="img-fluid" >
                    </div>
                    

                   <div class="col-md-6 mb-4">

          <!--Content-->
      

            <p class="lead" >
              <p class="lead text-dark font-weight-bold" style="font-size: 35px;"><?= $product['name']; ?>
              <span class="text-dark font-weight-bold" style="font-size: 50px;">&#8369 <?= $product['selling_price']; ?></span>
             </p>
            </p>


            
         
             <div class="row">
                <div class="col-md-4">
                    <div class="input-group m-4" style="font-size: 20px;">
                    <button class=" px-3 form-control decrement-btn" style="border: 1px solid black; outline:none;">-</button>
                    <input type="text" class="form-control input-qty text-center w-50" value="1">
                    <button class=" px-3 form-control increment-btn">+</button>
                  </div>
                </div>
             </div>
                  

              <!-- <div class="input-group mb-4  rounded" style="width: 100px">
              <button class="btn" style="border: none; font-size: 18px; font-weight: 600; outline:none;">-</button>
              <button class="input-group-text decrement-btn mx-5" style="border: none; font-size: 18px; font-weight: 600; outline:none;">-</button>
                <input type="text" class="form-control input-qty bg-light  text-center" value="1" style="border: none; font-size: 20px;">
                <button class="input-group-text increment-btn btn text-primary bg-light" style="border: none; font-size: 18px; font-weight: 600; outline:none; ">+</button>
            </div> -->
              
             

              <?php
               ?>

              <!-- addToCartBtn -> assets/custom.js -->
              <button class="btn btn-dark my-2  w-100 rounded addToCartBtn" value="<?= $product['id']; ?>" <?php if($product['qty'] <= 0){ ?> disabled <?php   } ?> type="button"><span class="" style="font-size: 22px; font-weight: 500;">Add to cart</span> 
              <i class="fas fa-shopping-cart ml-1 px-3 text-dark"></i>
            </button>
          
              <?php if($product['qty'] <= 0){ 
                echo '<p class="text-danger text-center">This item is sold out</p>' ;
                } ?>
              

            
          
          </div>

        </div>
            </div>
            </div>
            <?php
        }
        else
        {
            echo "Product not found!";
        }
    }
    else
    {
        echo "You are looking for nothing!";
    }
    ?>

<?php include('includes/footer.php'); ?>
        