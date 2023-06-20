<?php 
session_start();
include('functions/userfunctions.php');
include('authenticate.php');
include('includes/header.php'); 
?>




    <div class="py-2 m-5 ">
        <div class="container mt-3 text-center">
            <div class="card card-body shadow border-0 rounded">
                <div class="row">
                    <div class="col-md-12">
                    <?php 
                    if(isset($_SESSION['auth']))
                    {
                        $totalPrice = 0;
                        $total=0;
                        $addons=0;
                        $items = getCartItems();
                        if(mysqli_num_rows($items) > 0){
                            ?>
                            <div class="col-md-2">
                            <h2>My Cart</h6>
                            </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <h6>Product</h6>
                                </div>
                            <div class="col-md-2">
                                <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Total</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Action</h6>
                                </div>
                        </div>
                                <div id="mycart">
                                    
                            <?php
                                
                                foreach($items as $citem)
                                {
                                    ?>
                                    <div class="card product_data mb-3 border-0 rounded"><hr>
                                        <div class="row align-items-center">
                                            <div class="col-md-2 mb-2">
                                                <img src="uploads/<?= $citem['image'] ?>" alt="<?= $citem['name'] ?>"  width="80px">
                                            </div>
                                            <div class="col-md-2">
                                                <h5><?= $citem['name'] ?></h5>
                                                
                                            </div>
                                            <div class="col-md-2">
                                            <h5>&#8369 <?= $citem['selling_price'] ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                <div class="input-group mb-3" style="width: 130px">
                                                    <button class="input-group-text decrement-btn rounded updateQty bg-white" style="border: none; font-size: 18px; font-weight: 600; outline:none;">-</button>
                                                    <input type="text" class="form-control bg-light rounded input-qty text-center bg-white" value="<?= $citem['prod_qty'] ?>" style="border: none; font-size: 20px;" >
                                                    <button class="input-group-text increment-btn rounded updateQty bg-white" style="border: none; font-size: 18px; font-weight: 600; outline:none;">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <h5>&#8369 <?php echo $total =  $citem['selling_price']  * $citem['prod_qty']  ?></h5>
                                            </div>
                                           
                                         
                                            <div class="col-md-2">
                                                <button class="btn btn-sm deleteItems" value="<?= $citem['cid'] ?>">
                                                <i class="fa fa-trash mx-2" title="Delete"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <?php     
                                       $totalPrice += $total;  //calculation for price
                                }
                            ?><hr>

                            <div class="col-md-12 p-3 px-2 ">
                                <p class="float-right " style="font-size: 25px;"><span class="p-3 ">Grand Total:</span>&#8369 <label><?php echo $totalPrice ?></label></p>
                                </div>
                                <div class="mt-5 px-1 col-md-12">
                                        <a href="checkout.php" class="btn btn-dark rounded  float-right">Checkout</a>
                                    </div>
                            </div>    
                    </div>
                </div>
                
            </div>

            <div class="container mt-3 mb-5">             
                    <div class="row">
                        <div class="col-md-5">
                            
                            
                            <?php                
                        } } else {
                            
                            ?>
                                <div class="card card-body">
                                
                                <div class="col-md-12 empty-cart-cls text-center ">
								<img src="https://i.imgur.com/dCdflKN.png" alt="Empty Cart" width="200" height="200" class="img-fluid mb-4 mr-3">
								<!-- <h2><strong>Your cart is empty</strong></h2> -->
								
								<div class="col-md-12 m-0">
                                    <h4>Your cart is currently empty.</h4>
									<!--<a href="login.php" class="login"><u>Log in</u></a><span> to check out faster</span> -->
								</div>
                                <a href="index.php" class="btn btn-primary m-5 text-dark rounded">continue shopping</a>
							</div>
                                </div>
                            <?php
                        }
                            ?>
                        </div>
                    </div>
            </div>
            
        </div>
    </div>



    
<?php include('includes/footer.php'); ?>