<?php

$page_title = "Kape Catalina's - Complete Orders";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>




<div class="py-0 ">
    <div class="container mt-0 ">
        <div class="card mb-2 border-0 rounded bg-gradient-dark ">
            <div class="card-body">
                <h4 class="text-white text-center" style="letter-spacing: 2px; text-transform: uppercase;">Complete Orders</h4>
            </div>
        </div>
        <div class="card card-body border-0  rounded">
            <div class="row">
                <div class="col-md-12">
                    <table id="myDataTable" class="table align-items-center"> <!--  -->
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Date & Time</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Tracking No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Mode</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                    <?php
                    $i=1;
                    $orders = getCompleteOrders();

                    if (mysqli_num_rows($orders) > 0) {

                        foreach ($orders as $item) {


                    ?>
                    <tr>
                                            <td class="text-sm text-center align-middle"> <?php echo $i; $i++; ?> </td>
                                            <td class="text-sm text-center align-middle"> <?= $item['created_at']; ?> </td>
                                            <td class="text-sm text-center align-middle"> <?= $item['tracking_no']; ?> </td>
                                           
                                            <td class="text-sm text-center align-middle"><?php 
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
                                                echo "On the way to deliver";
                                            }
                                            elseif($item['status'] == 4)
                                            {
                                                echo "Ready for Pick-up";
                                            }
                                            elseif($item['status'] == 5)
                                            {
                                                echo "Cancelled";
                                            }
                                            ?> </td>
                                          
                                            <td class="text-sm text-center align-middle"> <?= $item['payment_mode']; ?> </td>
                                          
                                            
                                            <td class="text-center">
                                            <a href="orderHistory-details.php?t=<?= $item['tracking_no']; ?>" class="btn btn-dark rounded my-2">View Details</a>

                                             </td>  
                        </tr>
                           
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5">No available for Complete orders yet!</td>
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
