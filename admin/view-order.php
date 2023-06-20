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
                                <!-- <a href="index.php" class="btn btn-dark float-end">Back</a> -->
                                <button type="button" class="btn btn-outline-secondary text-white float-end my-3" onclick="history.back();"><i class="fas fa-reply p-1"></i> Back</button>
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
                            <button type="button" class=" btn btn-dark" id="btnModal" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> view receipt</button>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="showModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                Receipt</h4>
                                                <button type="button" class="close btn btn-dark my-2 mx-3" id="closeModal" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            <img src="../uploads/<?= $data['image'] ?>" alt="" width="100%">
                                            </div>
                                            
                                          
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
                               
                                
                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi,
                                    products p WHERE oi.order_id=o.id AND p.id=oi.prod_id 
                                    AND o.tracking_no='$tracking_no' ";

                                $order_query_run = mysqli_query($con, $order_query);

                                if(mysqli_num_rows($order_query_run) > 0)
                                {
                                    $totalPrice = 0;
                                    $total = 0;
                                    $grandtotal = 0;
                                    foreach($order_query_run as $item){
                                        ?>
                                        <tr>
                                            <td class="align-middle">
                                                <img src="../uploads/<?= $item['image'] ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                <?= $item['name']; ?> <br>
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['price']; ?><br>
                                            </td>
                                            <td class="align-middle text-center">
                                            <?= $item['orderqty']; ?>
                                            </td>
                                            <td class="align-middle text-center">
                                            <?php echo $total = $item['price'] * $item['orderqty']?>
                                            </td>
                                        </tr>
                                        <?php 
                                         $totalPrice += $total;

                                    }
                                }

                            ?>
                             </tbody>
                            </table>
                            <hr>
                            <h6>Subtotal (delivery): <span style="float:right">
                                <?php
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
                                <div class="mt-4">
                                    <label class="fw-bold">Message:</label> <span style="float:right; "><?= $data['comments'] ?></span><br>
                                    <label class="fw-bold">Service Mode:</label> 
                                    <span style="float:right; ">
                                    <?php if($data['payment_mode'] == 'COD')
                                         {
                                           echo 'Delivery';
                                          }elseif($data['payment_mode'] == 'Pick_Up')
                                            { echo 'Pick_Up';
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
                                    
                                    <label class="fw-bold">Payment Status:</label><br>
                                        <form action="code.php" method="POST">
                                            <select name="payment_id" id="" class="form-select">
                                                <option value="0" <?= $data['payment_id'] == 0?"selected":"" ?>>Unpaid</option>
                                                <option value="1" <?= $data['payment_id'] == 1?"selected":"" ?>>Paid</option>
                                            </select>
                                            <!-- <div class="border p-1">
                                                <span><?php
                                                //$query = "SELECT * FROM orders WHERE "
                                                if($data['image'] == "")
                                                {
                                                    echo "Unpaid";

                                                } else{
                                                    echo "Paid";
                                                }
                                                
                                                ?></span>
                                                
                                            </div> -->
                                            <label class="mt-3 fw-bold">Order Status:</label><br>
                                            <div class="mb-3">
                                        
                                            <input type="hidden" name="email" value="<?= $data['email'] ?>">
                                            <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                                            <select name="order_status" class="form-select" onchange="showDiv('showme', this)">
                                                <option value="0" <?= $data['status'] == 0?"selected":"" ?>>Pending</option>
                                                <option value="1" <?= $data['status'] == 1?"selected":"" ?>>To Process</option>
                                                <option value="3" <?= $data['status'] == 3?"selected":"" ?>>To Deliver</option>
                                                <option value="4" <?= $data['status'] == 4?"selected":"" ?>>To Pick-up</option>
                                                <option value="2" <?= $data['status'] == 2?"selected":"" ?>>Completed</option>
                                                <option onclick="display" value="5" <?= $data['status'] == 5?"selected":"" ?>>Cancelled</option>
                                            </select>

                                            <div class="mb-1" id="showme" style="display: none;">
                                                <label class="mt-2">Reason for cancelling order</label>
                                                <textarea  class="form-control" name="reason" id="" cols="5" rows="3" 
                                                placeholder="Type here..."></textarea>
                                            </div>

                                            <button type="submit" name="update_status_btn" class="btn btn-dark mt-4 w-100">Update status</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            
                        </div>   
                    </div>
          
            </div>
            
        </div>
    </div>


    
    <?php include('includes/footer.php'); ?>
    <script type="text/javascript">
        $('#btnModal').on('click', function() {
            $('#showModal').modal('show');
           
        });
        $('#closeModal').click(function() {
            $('#showModal').modal('hide');
        });
            
        function showDiv(divId, element)
        {
            document.getElementById(divId).style.display = element.value == 5 ? 'block' : 'none';
            document.getElementById(divId).required;
        }
       
        </script>