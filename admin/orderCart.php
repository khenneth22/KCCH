<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');

?>

<div class=" ">
        <div class="container text-center">
            <form action="functions/placeorder.php" method="POST">
                <div class="card card-body shadow border-0 rounded">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                    
                    $totalPrice = 0;
                    $total=0;
                    $addons=0;
                    $items = getCartItems();
                    if(mysqli_num_rows($items) > 0)
                    {
                        ?>
                            <div class="col-md-2">
                                <button type="button" class="btn"  onclick="history.back();"><i class="fas fa-chevron-left"></i> back</button>
                                <h6>Cart</h6>
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
                                                <img src="../uploads/<?= $citem['image'] ?>" alt="<?= $citem['name'] ?>"  width="80px">
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
                                                    <!-- <button class="px-3 decrement-btn rounded updateQty bg-white" style="border: none; font-size: 18px; font-weight: 600; outline:none;">-</button> -->
                                                    <input type="text" name="inputQty" class="form-control bg-light rounded input-qty text-center bg-white" readonly value="<?= $citem['prod_qty'] ?>" style="border: none; font-size: 20px;" >
                                                    <!-- <button class="px-3 increment-btn rounded updateQty bg-white" style="border: none; font-size: 18px; font-weight: 600; outline:none;">+</button> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <h5>&#8369 <?php echo $total =  $citem['selling_price']  * $citem['prod_qty']  ?></h5>
                                            </div>
                                           
                                         
                                            <div class="col-md-2">
                                                <!-- <form action="code.php" method="POST"> -->
                                                     <button class="btn btn-m deleteItems" name="deleteItems" value="<?= $citem['cid'] ?>">
                                                <i class="fa fa-trash mx-2 text-danger" title="Delete"></i></button>
                                                <!-- </form> -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <?php     
                                       $totalPrice += $total;  //calculation for price
                                }
                            ?><hr>

                            <div class="col-md-12 p-3 px-2 " name="total_price" >
                                <p class="float-right " style="font-size: 25px; float: left;"><span class="p-3 ">Grand Total:</span>&#8369 <label name="total_price" style="font-size: 25px;"><?php echo $totalPrice ?></label></p>
                                <button type="submit" name="orderCartSubmit" class="btn btn-dark rounded  float-right" style="float:right;">Checkout</button>
                            </div>
                            <div class="mt-5 px-1 col-md-12">
                                </div>
                            </div> 
                            <?php 
                        }
                        else
                        {
                            echo "No Orders.";
                        } ?>   
                            
                        </div>
                    </div>
                
            </div>
            
        </form>
    </div>