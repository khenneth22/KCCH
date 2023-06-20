<?php 
session_start();
include('functions/userfunctions.php');
include('authenticate.php');
include('includes/header.php'); 


?>

<style>
    .lbl{
        font-size: 13px;
    }
    .badge{
       transform: translate(100%, -100%);
    
     
    }
</style>


    <div class="py-2  ">
        <div class="container mt-3 ">
            <div class=" mb-0 mx-2 border-0 rounded">
                <div class="card-body ">
                    <h5 class=""  style="letter-spacing: 2px; text-transform: uppercase;"><i class="fas fa-chevron-left" onclick="history.back();"></i><strong><strong> All Orders </strong>
                   
                         
                    </h5>
                </div>
                
                        
                          <!-- <a href="myOrder-history.php" class="btn btn-inline-block">Cancelled</a> -->
                 
            </div>
            <div class="card card-body border-0 bg-transparent rounded">
                <div class="row">
                    <div class="col-md-12 order-parent">
                        <!-- <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7"></th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Tracking No</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Price</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Date</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">View</th>
                                </tr>
                            </thead>
                            <tbody> -->
          
                            <?php
                            
                            
                                    $orders = getCompleteOrders();//getOrdersUsers

                                    if(mysqli_num_rows($orders) > 0)
                                    {
                                        
                                            foreach($orders as $item){

                                           
                                        ?>
                                            <div class="card m-2 shadow border-0  rounded order-container">
                                                <div class="card-body m-1">
                                                    <div class="row align-items-center">   
                                                    
                                                        <div class="col-md-3">
                                                        <label class="lbl"><strong>Time & Date</strong></label><br>
                                                            <span><?= $item['created_at']; ?></span> <!-- time the order created -->
                                                        </div>
                                                        <div class="col-md-4">
                                                        <label class="lbl"><strong>Tracking order</strong></label><br>
                                                            <span><?= $item['tracking_no']; ?></span> <!-- tracking order -->
                                                        </div>
                                                        <!-- <div class="col-md-3">
                                                        <label class="lbl" ><strong>Order Status</strong></label><br>
                                                            <span>
                                                            <?php 
                                                                if($item['status'] == 0)
                                                                {
                                                                    echo "Pending";
                                                                }
                                                                elseif($item['status'] == 1)
                                                                {
                                                                    echo "Processing...";
                                                                }
                                                                elseif($item['status'] == 2)
                                                                {
                                                                    echo "Completed";
                                                                }
                                                                elseif($item['status'] == 3)
                                                                {
                                                                    echo "On the way to deliver";
                                                                }
                                                                elseif($item['status'] == 4)
                                                                {
                                                                    echo "Ready for Pick-up";
                                                                }
                                                                elseif($item['status'] == 5)
                                                                {
                                                                    echo "Your order has been Cancelled";
                                                                }
                                                                ?>
                                                            </span> 
                                                        </div> -->
                                                        <div class="col-md-3">
                                                        <label class="lbl"><strong>Order Status</strong></label><br>
                                                            <span><label></label><?php if($item['payment_mode'] == 'COD')
                                                            {
                                                                echo 'Delivered';
                                                            }elseif($item['payment_mode'] == 'Pick_Up')
                                                            { echo 'Picked_Up';
                                                            }else{
                                                                echo 'Cancelled';
                                                            }
                                                            
                                                            ?></span> <!-- pick-up or cod -->
                                                        </div>
                                                    <div class="col-md-2 mt-1">
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-dark rounded mb-2">View Details</a>
                                                    
                                                    <?php 
                                                   if($item['status'] == 0)
                                                   {
                                                       ?>
                                                            <!-- pop-up modal when click -->
                                                            <!-- <button type="button" class="btn text-dark rounded mt-1" value="" id="btnModal" data-toggle="modal" data-target="#myModal" >Cancel Order</button> -->
                                                            <a href="cancel-order.php?id=<?= $item['id']; ?>" class="text-dark rounded">Cancel Order</a>
                                                        <?php 
                                                    }else if($item['status'] == 3){
                                                        ?>
                                                            <!-- pop-up modal when click -->
                                                            <a href="orderReceived.php?id=<?= $item['id'];?>" class="text-dark rounded mt-1" style="font-size: 15px;">Order Received</a>
                                                        <?php
                                                    }else if($item['status'] == 4){
                                                        ?>
                                                            <!-- pop-up modal when click -->
                                                            <a href="orderReceived.php?id=<?= $item['id'];?>" class="text-dark rounded mt-1" style="font-size: 15px;">Order Received</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <!-- The Modal for cancel order -->
                                        <div class="modal fade" id="showModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header col-md-12">
                                                
                                                <h4 class="modal-title text-center">
                                                Are you sure you want to cancel this order?</h4>
                                                <!-- <button type="button" class="close btn " id="closeModal" data-dismiss="modal">&times;</button> -->
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form action="cancelOrder.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>
                                            <div class="modal-body col-md-12">
                                                <div class="col-md-12 text-center">
                                                    <!-- update status to 5 (cancelled) -->
                                                    <input type="submit" class="col-md-6 btn btn-dark rounded" name="cancel-order" value="Yes">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn text-dark" name="no" value="No">
                                                </div>
                                            </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                                    </td>
                                                    </div>
                                                
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        <?php 
                                            }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td>You haven't placed any orders yet.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-md-12 text-center mt-3">
                                        <input class="load-more-btn btn btn-dark shadow rounded mt-3" type="button" id="play" value="Load more"/>
                                    </div>
                            <!-- </tbody>
                        </table> -->
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php include('includes/footer.php'); ?>

    <?php
//updating status to cancel
    if (isset($_POST['yes']))
    { 
        $id = $_GET['id'];
        mysqli_query($con, "UPDATE orders SET status='5' WHERE id='$id' ");
        ?>  
        <script>window.location="my-orders.php";</script>
        <?php
    
    }
    if (isset($_POST['no']))
    {
            ?>
            <script>window.location="my-orders.php";</script>
            <?php
    }


        ?>

        

<!-- for modal -->
    <script type="text/javascript">
        $('#btnModal').on('click', function() {
            $('#showModal').modal('show');
           
        });
        $('#closeModal').click(function() {
            $('#showModal').modal('hide');
        });
        </script>