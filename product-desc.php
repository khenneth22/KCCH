<?php

    session_start();
    include('includes/header.php');
    include('functions/userfunctions.php');

    if(isset($_GET['product']))
    {
        $product_slug = $_GET['product'];
        $product_data = getSlugActive("products", $product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product)
        {
            ?>
            <div class="container mt-5 mb-5">
             <a href="#" class="btn btn-outline-none float-end"><i class="fa fa-angle-left"></i></a>
             <div class="d-inline-flex mb-lg-5">
                    <p class="m-0 text-white"><a class="text-dark" href="index.php">Home</a></p>
                    <p class="m-0  px-2">/</p>
                    <p class="m-0 "><a class="text-dark" href="#">Category</a></p>
                    <p class="m-0  px-2">/</p>
                    <p class="m-0 "><a class="text-dark" href=""><?= $product['name']; ?></a></p>
                </div>
        </div>
             <div class="container product_data mt-5">
             
                 <div class="row">

                 <div class="col-md-6 mb-5">
                   <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100" class="img-fluid" >
                    </div>
                    

                   <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3 text-primary" style="letter-spacing: 1px;">
              
                <span class="rounded text-dark font-weight-bold p-1"><?php if($product['new']){ echo "New";} ?></span>
                <span class="rounded text-dark font-weight-bold p-1"><?php if($product['bestseller']){ echo "Best Seller";} ?></span>
                <span class="rounded text-dark font-weight-bold p-1"><?php if($product['trending']){ echo "Trending";} ?></span>
                <span class="rounded mr-1">
                  <?php if($product['qty'] < 0 )
                  { echo '<span class="rounded bg-danger text-white p-1">'.'Sold Out'.'</span>' ; 
                    
                  } ?></span>
                <span class="rounded  mr-1">
                  <?php if($product['qty'] > 0 )
                  { echo '<span class="rounded bg-success text-white p-1">'.'Available'.'</span>' ; 
                    
                  } ?></span>

              
            </div>

            <p class="lead" >
              <p class="lead text-dark font-weight-bold" style="font-size: 50px;"><?= $product['name']; ?></p>
              <span class="text-secondary font-weight-bold" style="font-size: 30px;">&#8369 <?= $product['selling_price']; ?></span>
              <span class="mr-1 font-weight-normal">
                <del>&#8369 <?= $product['original_price']; ?></del>
              </span>
            </p>


            <p class="large"><?= $product['description']; ?></p>

            <form class=" justify-content-right">
              <!-- Default input -->
              <div class="input-group mb-4 border rounded" style="width: 130px">
                <button class="input-group-text decrement-btn  bg-light" style="border: none; font-size: 18px; font-weight: 600; outline:none;">-</button>
                <input type="text" class="form-control input-qty bg-light  text-center" value="1" style="border: none; font-size: 20px;">
                <button class="input-group-text increment-btn text-primary bg-light" style="border: none; font-size: 18px; font-weight: 600; outline:none; ">+</button>
              </div>
              <div class=" mb-3">
                <span class="bg-white p-2" style="border-radius: 50px; border: 1px solid #ccc;">One size</span>
              </div>
              <!-- <label for="">Sizes</label>
              <select  class="p-1 rounded" name="" id="">
                <option value="16oz">16oz</option>
                <option value="22oz">22oz</option>
              </select> -->

              <?php
               ?>

              <!-- addToCartBtn -> assets/custom.js -->
              <button class="btn btn-primary my-2  w-100 rounded addToCartBtn" value="<?= $product['id']; ?>" <?php if($product['qty'] <= 0){ ?> disabled <?php   } ?> type="button"><span class="" style="font-size: 22px; font-weight: 500;">Add to cart</span> 
              <i class="fas fa-shopping-cart ml-1 px-3 text-dark"></i>
            </button>
          
              <?php if($product['qty'] <= 0){ 
                echo '<p class="text-danger text-center">This item is sold out</p>' ;
                } ?>
              

            </form>
          
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


         
<?php
include('featured.php'); 
include('includes/footer.php'); 
?>