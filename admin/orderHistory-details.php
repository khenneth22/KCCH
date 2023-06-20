<!-- view order by id in admin panel side -->
<!--  -->

<?php 
include('includes/header.php');
include('../middleware/adminMiddleware.php');

    if(isset($_GET['t']))
    {
        $tracking_no = $_GET['t'];
        
        $orderData = checkValidTrackingNo($tracking_no);
        if(mysqli_num_rows($orderData) < 0)
        {
            ?>
                <h4>Something went wrong.</h4>
            <?php
            die();
        }
        
    }else
    {
        ?>
        <h4>Something went wrong.</h4>
        <?php 
        die();
    }

$data = mysqli_fetch_array($orderData);
?>




<div class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-2">
                        <div class="card-header rounded  bg-gradient-dark">
                            <h2 class="text-white">View Order
                                <!-- <a href="view-order-history.php" class="btn btn-dark float-end">Back</a> -->
                                <button type="button" class="btn btn-outline-secondary my-2 text-white float-end" onclick="history.back();"><i class="fas fa-reply p-1"></i> Back</button>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body border-0 rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fa fa-info-circle" style="font-size: 20px;"></i> Delivery Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">First Name</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['first_name'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Last Name</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['last_name'] ?>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['email'] ?>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Complete Home Address</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['contact'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Contact No.</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['address'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Zip Code</label>
                                    <div class="border-bottom p-1">
                                    <?= $data['Zip'] ?>
                                </div>
                                </div>
                                
                            </div>
                             <!-- Button to Open the Modal -->
                             <button type="button" class="btn btn-dark" id="btnModal" data-toggle="modal" data-target="#myModal">view receipt</button>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="showModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalCenterTitle">
                                                Receipt</h4>
                                                <button type="button" class="close btn btn-dark my-2 mx-3" id="closeModal" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <img src="../uploads/<?= $data['image'] ?>" alt="" width="50%">
                                            </div>
                                            
                                            <!-- Modal footer -->
                                            <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" id="closeModal" data-dismiss="modal">Close</button> -->
                                            <!-- <button type="submit" name="submitReceiptBtn" class="btn btn-success w-100" >Submit receipt</button> -->
                                            <!-- </div> -->
                                            
                                            </div>
                                            </div>
                                        </div>
                        </div>
                        <div class="col-md-5">
                            <h5><i class="fas fa-receipt"></i> Order Details</h5>
                            

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                            <?php
                               

                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, oi.add_ons, p.* FROM orders o, order_items oi,
                                    products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                    AND o.tracking_no='$tracking_no' OR o.user_id=4833";

                                $order_query_run = mysqli_query($con, $order_query);

                                if(mysqli_num_rows($order_query_run) > 0)
                                {
                                    $totalPrice = 0;
                                    foreach($order_query_run as $item){
                                        ?>
                                        <tr>
                                            <td class="align-middle ">
                                                <img src="../uploads/<?= $item['image'] ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                <?= $item['name']; ?><br>
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['price']; ?><br>
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['orderqty']; ?>
                                            </td>
                                            <td class="align-middle text-center"><?php echo $total =  $item['price'] * $item['orderqty']  ?></td>
                                            </tr>
                                            <?php 
                                            $totalPrice += $total;//compute 
                                    }
                                }

                            ?>
                             </tbody>
                            </table>
                            <hr>
                            <h6>Subtotal (Delivery): <span class="float-end">
                                <?php
                                $totalPrice = 0;
                                if($data['payment_mode'] == 'COD')
                                {
                                    $grandtotal =  $totalPrice + 50;
                                    echo "&#8369 50";
                                }else
                                {
                                    $grandtotal =  $totalPrice + 0;
                                    echo "0";
                                }
                                ?>
                            </span></h6>
                            <h4>Total Price: <span style="float:right; ">&#8369 <?php echo $grandtotal ?></span></h4>
                            <div class="mt-5">
                                    <label class="fw-bold">Message:</label> <span style="float:right;"><?= $data['comments'] ?></span><br>
                                  
                                    <label class="fw-bold">Add-ons:</label> <span style="float:right;"><?= $data['add_ons'] ?></span><br>
                                    
                                    <label class="fw-bold">Service Mode:</label> 
                                    <span style="float:right;">
                                    <?php if($data['payment_mode'] == 'COD')
                                        {
                                            echo 'Delivery';
                                        }
                                        elseif($data['payment_mode'] == 'Pick_Up')
                                        { 
                                            echo 'Pick_Up';
                                        }                     
                                     ?>
                                        </span><br>

                                        <!-- Order Date -->
                                    <label class="fw-bold">Order Date:</label>
                                    <span style="float:right; ">
                                    <?= $data['order_date']; ?>
                                    </span>
                                    <br>

                                    <!-- Order Time -->
                                    <label class="fw-bold">Order Time:</label>
                                    <span style="float:right; ">
                                    <?= $data['order_time']; ?>
                                    </span>
                                    <br>
                                    

                                    <label class="fw-bold">Payment Status:</label> 
                                    <!-- form to update payment_id to paid -->
                                    <form action="#" method="POST">

                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <?php
                                        if($data['payment_id'] == "0")
                                        {
                                            echo '<button type="submit" name="paidBtn">Paid</button>';
                                        }elseif($data['payment_id'] == "1")
                                        {
                                            echo '<button type="submit" name="paidBtn" disabled>Paid</button>';
                                        }
                                        ?>
                                        
                                    
                                        <span style="float:right;">
                                        <?php
                                        //$query = "SELECT * FROM orders WHERE "
                                        if($data['payment_id'] == "0")
                                        {
                                            echo "Unpaid";

                                        }elseif($data['payment_id'] == "1"){
                                            echo "Paid";
                                        }
                                        ?></span><br>
                                        </form>

                                    <label class="mt-3 fw-bold">Status:</label> <span class="mt-3" style="float:right;"><?php 
                                                
                                                $status = $data['status'];
                                                if($status == 0){
                                                    echo 'Pending';
                                                 } elseif($status == 1){
                                                    echo 'Processing';
                                                 } elseif($status == 2){
                                                    echo 'Completed';
                                                 } elseif($status == 3){
                                                    echo 'On the way to deliver';
                                                 } elseif($status == 4){
                                                    echo 'Ready to pickup';
                                                 } elseif($status == 5){
                                                    echo 'Cancelled';
                                                 }
                                                ?></span><br>
                                </div>
                            
                        </div>   
                    </div>
          
            </div>
            
        </div>
    </div>


    
    <?php include('includes/footer.php'); ?>


<?php
if(isset($_POST['paidBtn']))
{
  $id = $_POST['id'];
  $delivery_status_query = "UPDATE orders SET payment_id='1' WHERE id='$id' ";
  $delivery_status_query_run = mysqli_query($con, $delivery_status_query);
  
  ?>  
  <script>window.location="orderHistory-details.php?t=<?= $tracking_no; ?>";</script>
  <?php

}
?>


    <script type="text/javascript">
        $('#btnModal').on('click', function() {
            $('#showModal').modal('show');
           
        });
        $('#closeModal').click(function() {
            $('#showModal').modal('hide');
        });
            
           
       
        </script>