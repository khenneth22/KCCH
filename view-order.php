<?php 
session_start();
include('functions/userfunctions.php');
include('authenticate.php');
include('includes/header.php'); 

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




<div class="py-2 m-5 ">
        <div class="container mt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0 bg-primary py-3">
                            <h4>View Order
                            <a href="my-orders.php" class="text-dark btn btn-primary" style="float: right;"><i class="fa fa-angle-left"></i> Back</a>
                        </h4>
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
                                    <div class="border p-1">
                                    <?= $data['first_name'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Last Name</label>
                                    <div class="border p-1">
                                    <?= $data['last_name'] ?>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <div class="border p-1">
                                    <?= $data['email'] ?>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Complete Home Address</label>
                                    <div class="border p-1">
                                    <?= $data['contact'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Contact No.</label>
                                    <div class="border p-1">
                                    <?= $data['address'] ?>
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Zip Code</label>
                                    <div class="border p-1">
                                    <?= $data['Zip'] ?>
                                </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                $userId = $_SESSION['auth_user']['user_id'];

                                // $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, oi.add_ons, p.* FROM orders o, order_items oi,
                                //     products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                //     AND o.tracking_no='$tracking_no' ";

                                   $order_query = "SELECT o.id AS oid, o.tracking_no, o.user_id, oi.*, oi.qty AS orderqty, oi.add_ons, p.*
                                    FROM orders o
                                    INNER JOIN order_items oi ON oi.order_id = o.id
                                    INNER JOIN products p ON p.id = oi.prod_id
                                    WHERE o.user_id = '$userId' AND o.tracking_no = '$tracking_no'; ";

                                $order_query_run = mysqli_query($con, $order_query);

                                if(mysqli_num_rows($order_query_run) > 0)
                                {
                                    $totalPrice = 0;
                                    $grandtotal = 0;
                                    foreach($order_query_run as $item){
                                        ?>
                                        <tr>
                                            <td class="align-middle">
                                                <img src="uploads/<?= $item['image'] ?>" class="" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                <?= $item['name']; ?><br>
                                                <!-- dito dapat yung add_ons -->
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['price']; ?><br>
                                            <!-- dito dapat yung price ng add_ons -->
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['orderqty']; ?>
                                            </td>
                                            <td class="align-middle text-center"><?php echo $total =  $item['price'] * $item['orderqty']  ?></td>
                                        </tr>
                                        <?php 
                                        $totalPrice += $total;//compute also the add_ons price
                                    }
                                }

                            ?>
                             </tbody>
                            </table>
                            <hr>
                            <h6>Subtotal (Delivery): <span class="float-right">
                                <?php echo $data['voucher'] ?>

                                <?php
                                $totalPrice = 0;
                                $p = $data['voucher'] ;
                                if($data['payment_mode'] == 'COD')
                                {
                                    // $pricePerKm = intVal("#pricePerKm");
                                    $grandtotal =  $totalPrice + $p;
                                    // echo '&#8369 <span id="pricePerKm" style="float:right;"></span> ';
                                }else
                                {
                                    $grandtotal =  $totalPrice + 0;
                                    echo "0";
                                }
                                ?>
                            </span></h6>
                            <h5 class="mt-3">Total Price : <span class="float-right">&#8369  <?php echo $grandtotal ?> <span id="totalPrice"></span><span id="totalPriceV2"></span></span></h5>
                            
                            
                                <div class="mt-5">
                                    <label class="font-weight-bold">Message:</label> <span style="float: right;"><?= $data['comments'] ?></span><br>
                                   
                                    <label class="font-weight-bold">Service Mode:</label> <span style="float: right;"><?php if($data['payment_mode'] == 'COD')
                                                            {
                                                                echo 'Delivery';
                                                            }elseif($data['payment_mode'] == 'Pick_Up')
                                                            { echo 'Pick_Up';
                                                            }
                                                            
                                                            ?></span><br>

                                                            <!-- Order Date -->
                                    <label class="font-weight-bold">Order Date:</label>
                                    <span style="float:right; ">
                                    <?= $data['order_date']; ?>
                                    </span>
                                    <br>

                                    <!-- Order Time -->
                                    <label class="font-weight-bold">Order Time:</label>
                                    <span style="float:right; ">
                                    <?= $data['order_time']; ?>
                                    </span>
                                    <br>
                                    
                                    <label class="font-weight-bold">Payment Status:</label>
                                    <span style="float: right;"><?php
                                        //display on admin&user's view order
                                        if($data['payment_id'] == "0")
                                        {
                                            echo "Unpaid";

                                        }elseif($data['payment_id'] == "1"){
                                            echo "Paid";
                                        }
                                        
                                        ?></span><br>
                                   
                                    <label class="font-weight-bold" >Order Status: </label> <span style="float: right;"><?php 
                                            $status = $data['status'];
                                            if($status == 0){
                                                echo 'Pending';
                                             } elseif($status == 1){
                                                echo 'Proccessing';
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
                                <!-- <a href="addReview.php?prod_id=<?= $item['id']?>" class="text-dark"><i class="fa fa-plus p-2 mt-3"> </i>write a review</a> -->
                                <p class="mt-2">How was the taste of our product? <br> How was the delivery?<br> How was our services?<br>Are you satisfied? If Yes, then give us feedback.</p>
                                <?php
                                                if($data['status'] == 2)
                                                {
                                                    ?>
                                                    <a href="addComments.php?prod_id=<?= $item['id']?>" class="  text-dark rounded"><i class="fa fa-plus p-1"> </i> write us review<u></u></a>

                                                    
                                                    
                                                    <?php
                                                }

                                        

                                            ?>
                                
                            </div>   
                            <a href="index.php"><i class="fa fa-angle-left ml-3 p-2"> </i>Back to Homepage</a>
                    </div>
          
            </div>
            
        </div>
    </div>


    
    <?php include('includes/footer.php'); ?>