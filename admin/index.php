<?php 
$page_title = "Kape Catalina's Admin Dashboard";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?> 



<div class="container mt-0 mb-3">
    <div class="card rounded col-md-12 mb-5">
    <div class="col-md-12">
            <img src="../img/kape-catalina-logo.png" class="w-30"   style="float: right;" alt="main_logo">
            
                    
        <div class="card-header rounded mb-1 pt-3">
            <h1 class="text-dark pb-0"  style="letter-spacing: 3px; ">Hello, <span>
                            <?php

                            if(isset($_SESSION['auth']))
                            {
                                ?>            
                                    <?= $_SESSION['auth_user']['first_name'];  ?><br>
                                    <?php
                            }
                            ?>
                </span> 
            </h1>
            <span style="font-size: 18px;">It's good to see you again.</span>
            
        </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card pb-4">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-cart-arrow-down opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Pending Orders</p>

                        <?php 
                            $dash_total_orders_query = "SELECT * FROM orders WHERE status='0' ";
                            $dash_total_orders_query_run = mysqli_query($con, $dash_total_orders_query);

                            if($orders_today = mysqli_num_rows($dash_total_orders_query_run))
                            {
                                echo '<h3 class="mb-0">'.$orders_today.'</h3>';
                            }
                            else
                            {
                                echo '<h3 class="mb-0">0</h3>';
                            }
                                
                        ?>
                    </div>
                    </div>
                 
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card pb-4">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-user-plus opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Users</p>
                        <?php

                        $dash_total_users_query = "SELECT * FROM users";
                        $dash_total_users_query_run = mysqli_query($con, $dash_total_users_query);

                        if($users_total = mysqli_num_rows($dash_total_users_query_run))
                        {
                            echo '<h3 class="mb-0">'.$users_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0">No Data</h3>';
                        }
                        ?>
                        
                    </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card pb-4">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-plus-square opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Products</p>
                        <?php

                        $dash_total_product_query = "SELECT * FROM products";
                        $dash_total_product_query_run = mysqli_query($con, $dash_total_product_query);

                        if($product_total = mysqli_num_rows($dash_total_product_query_run))
                        {
                            echo '<h3 class="mb-0">'.$product_total.'</h3>';
                        }
                        else
                        {
                            echo '<h3 class="mb-0">No Data</h3>';
                        }
                        ?>
                        
                    </div>
                    </div>
                  
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card pb-2">
                    <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fa fa-shopping-cart opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Total Orders</p>
                        <?php

                            $dash_total_orders_query = "SELECT * FROM orders WHERE status='2'";
                            $dash_total_orders_query_run = mysqli_query($con, $dash_total_orders_query);

                            if($orders_total = mysqli_num_rows($dash_total_orders_query_run))
                            {
                                echo '<h3 class="mb-0">'.$orders_total.'</h3>';
                            }
                            else
                            {
                                echo '<h3 class="mb-0">No Data</h3>';
                            }
                            ?>

                        <a href="allCompleteOrders.php" class="text-secondary">view</a>
                    </div>
                </div>
                
                 
                </div>
            </div>
    </div>
</div>
    
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                 <h5 class="px-1 py-2 mx-3">Today's Order <p>You have <strong><?php echo $orders_today; ?> </strong>Pending order</p></h5>

                    <div class="card-body" id="">
                        <table id="" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Tracking No</th></th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mode</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                    <!-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Delete</th> -->
   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $order =  getAllOrders();

                                if(mysqli_num_rows($order) > 0)
                                {
                                    foreach($order as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"> <?php echo $i; $i++; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['tracking_no']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['first_name']; ?> <?= $item['last_name']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['email']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['payment_mode']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['created_at']; ?> </td>
                                            
                                            <td>
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-dark my-2">View</i></a>
                                             </td>  
                                             
                                               
                                         
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No orders yet!</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                
                              
                                        
                            </tbody>
                        </table>
                        <table id="" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Tracking No</th></th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mode</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                    <!-- <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Delete</th> -->
   
                                </tr>
                            </thead>
                            <tbody>
                              
                                        <tr>
                                            <td class="text-sm align-middle"> </td>
                                            <td class="text-sm align-middle"> </td>
                                            <td class="text-sm align-middle"> </td>
                                            <td class="text-sm align-middle"> </td>
                                            <td class="text-sm align-middle"> </td>
                                            <td class="text-sm align-middle"> </td>
                                            
                                            <td>
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-dark my-2">View</i></a>
                                             </td>  
                                             
                                               
                                         
                                        </tr>
                                        
                                
                              
                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.document()
    </script>
    

<?php include('includes/footer.php'); ?>