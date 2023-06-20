<?php

$page_title = "Kape Catalina's - Pick-up Orders";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>




<div class="py-0 ">
    <div class="container mt-0 ">
        <div class="card mb-2 border-0 rounded bg-gradient-dark ">
            <div class="card-body">
                <h4 class="text-white text-center" style="letter-spacing: 2px; text-transform: uppercase;">To Pick-up Orders</h4>
            </div>
        </div>
            <ul class="nav nav-pills nav-fill mb-2 mt-1 bg-outline-light">
                <li class="nav-item">
                <a class="nav-link" href="allOrder.php"><i class="fa fa-list" aria-hidden="true"></i> All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view-order-history.php"><i class="fa fa-clock-o" aria-hidden="true"></i> Processing
                    <span class="badge px-3 bg-danger"><?php 
                         $dash_total_orders_query = "SELECT * FROM orders WHERE status='1' ";
                         $dash_total_orders_query_run = mysqli_query($con, $dash_total_orders_query);

                         if($orders_today = mysqli_num_rows($dash_total_orders_query_run))
                        {
                            echo '<h5 class="mb-0 text-white" style="font-size: 13px;">'.$orders_today.'</h5>';
                        }
                        else
                        {
                            echo '<h5 class="mb-0 text-white" style="font-size: 13px;">0</h5>';
                        }   
                       ?></span></a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="allDeliveryOrders.php"><i class="fa fa-truck" aria-hidden="true"></i> To Deliver
                <span class="badge px-3 bg-danger"><?php 
                         $dash_total_orders_query = "SELECT * FROM orders WHERE status='3' ";
                         $dash_total_orders_query_run = mysqli_query($con, $dash_total_orders_query);
                         
                         if($orders_today = mysqli_num_rows($dash_total_orders_query_run))
                         {
                             echo '<h5 class="mb-0 text-white" style="font-size: 13px;">'.$orders_today.'</h5>';
                            }
                            else
                            {
                                 echo '<h5 class="mb-0 text-white" style="font-size: 13px;">0</h5>';
                            }   
                            ?></span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link  active bg-white" href="allPickupOrders.php"><i class="fa fa-map-pin" aria-hidden="true"></i> To Pick-up
                <span class="badge px-3 bg-danger"><?php 
                         $dash_total_orders_query = "SELECT * FROM orders WHERE status='4' ";
                         $dash_total_orders_query_run = mysqli_query($con, $dash_total_orders_query);

                         if($orders_today = mysqli_num_rows($dash_total_orders_query_run))
                        {
                            echo '<h5 class="mb-0 text-white" style="font-size: 13px;">'.$orders_today.'</h5>';
                        }
                        else
                        {
                             echo '<h5 class="mb-0 text-white" style="font-size: 13px;">0</h5>';
                        }   
                       ?></span></a>
              
                </li>
              
                <li class="nav-item">
                <a class="nav-link" href="allCancelledOrders.php"><i class="fa fa-trash-o" aria-hidden="true"></i> Cancelled</a>
                </li>
            </ul>
        <div class="card card-body border-0  rounded">
            <div class="row">
                <div class="col-md-12">
                    <table  class="table align-items-center"> <!-- id="myDataTable" -->
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
                    $orders = getPickupOrders();

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
                                             <td class=" text-center">
                                                <form action="#" method="post">
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                <button type="submit" name="pickup_order" class="btn btn-dark rounded my-2">picked up</button>
                                                </form>
                                             </td> 
                        </tr>
                           
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">No orders to pick-up yet!</td>
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
<?php
      
      if(isset($_POST['pickup_order']))
      {
                                    $id = $_POST['id'];
                                    mysqli_query($con, "UPDATE orders SET status='2' WHERE id='$id' ");
                                    ?>  
                                    <script>window.location="allDeliveryOrders.php";</script>
                                    <?php

      }
      ?>