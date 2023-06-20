<?php

$page_title = "Kape Catalina's - All Orders";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>




<div class="py-0 ">
    <div class="container mt-0 ">
        <div class="card mb-2 border-0 rounded bg-gradient-dark ">
            <div class="card-body">
                <h4 class="text-white text-center" style="letter-spacing: 2px; text-transform: uppercase;">All Orders</h4>
                
            </div>
        </div>
            <ul class="nav nav-pills nav-fill mb-2 mt-2 bg-outline-light">
                <li class="nav-item">
                    <a class="nav-link bg-white " href="allOrder.php"><i class="fa fa-list" aria-hidden="true"></i> All Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view-order-history.php"><i class="fa fa-clock-o" aria-hidden="true"></i> Processing</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="allDeliveryOrders.php"><i class="fa fa-truck" aria-hidden="true"></i> To Deliver</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="allPickupOrders.php"><i class="fa fa-map-pin" aria-hidden="true"></i> To Pick-up</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="allCompleteOrders.php"><i class="fa fa-check" aria-hidden="true"></i> Complete orders</a>
                </li> -->
                <li class="nav-item">
                <a class="nav-link" href="allCancelledOrders.php"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancelled</a>
                </li>
            </ul>
        <div class="card card-body border-0  rounded">
            <div class="row">
                <div class="col-md-12">
                    <table id="myDataTable"  class="table table-bordered table-striped table-hover text-center"> <!-- id="myDataTable" -->
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Date & Time</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Tracking No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Mode</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Fulfillment Status</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                </tr> 
                            </thead>
                            <tbody>

                    <?php
                    $i=1;
                    $orders = getAll("orders");

                    if (mysqli_num_rows($orders) > 0) {

                        foreach ($orders as $item) {


                    ?>
                    <tr>
                                            <td class="text-sm text-center align-middle"> <?php echo $i; $i++; ?> </td>
                                            <td class="text-sm text-center align-middle"> <?= $item['created_at']; ?> </td>
                                            <td class="text-sm text-center align-middle"> <?= $item['tracking_no']; ?> </td>
                                           
                                            <!-- <td class="text-sm text-center align-middle"><?php 
                                            if($item['status'] == 0)
                                            {
                                                echo "pending";
                                            }
                                            elseif($item['status'] == 1)
                                            {
                                                echo "processing...";
                                            }
                                            elseif($item['status'] == 2)
                                            {
                                                echo "Completed";
                                            }
                                            elseif($item['status'] == 3)
                                            {
                                                echo "Attempt to deliver";
                                            }
                                            elseif($item['status'] == 4)
                                            {
                                                echo "Ready for Pick-up";
                                            }
                                            elseif($item['status'] == 5)
                                            {
                                                echo "Cancelled";
                                            }
                                            ?> </td> -->
                                          
                                          <td class="text-sm text-center align-middle"> <?= $item['payment_mode']; ?> </td>
                                          <td class="text-sm text-center align-middle"> 
                                            <?php if($item['status'] == 2)
                                            { echo "Completed"; 
                                            }elseif($item['status'] == 5) 
                                            { echo "Cancelled";}
                                            ?> 
                                        </td>
                                          
                                            
                                            <td class="text-center">
                                            <a href="orderHistory-details.php?t=<?= $item['tracking_no']; ?>" class="btn btn-dark rounded my-2">View Details</a>

                                             </td>  
                        </tr>
                           
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No orders yet!</td>
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                        </table>

                </div>
            </div>
        </div>
    
    </div>
</div>


<?php include('includes/footer.php'); ?>
