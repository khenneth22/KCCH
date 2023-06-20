<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

<div class="py-0 mt-3">
        <div class="container">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
          <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Reviews
            </div>
        </div>
        <button type="button" class="btn mx-2 my-2" onclick="history.back();"><i class="fa fa-chevron-left"></i> Back</button></h4>
            <div class="mt-3 card-body border-0  rounded">
                <div class="row">
                    <div class="col-md-12">
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
                            
                                    $banners = getReviews();

                                    if(mysqli_num_rows($banners) > 0)
                                    {
                                        
                                            foreach($banners as $item){

                                           
                                        ?>
                                            <div class="card m-2 shadow border-0  rounded">
                                                <div class="card-body m-1">
                                                    <div class="row align-items-center">   
                                                    
                                                        <div class="col-md-3">
                                                        <label class="lbl"><strong>Time & Date</strong></label><br>
                                                            <span><?= $item['created_at']; ?></span> <!-- -->
                                                        </div>
                                                        <div class="col-md-3">
                                                        <label class="lbl"><strong>Customer's name</strong></label><br>
                                                            <span><?= $item['name']; ?></span> 
                                                        </div>
                                                        <div class="col-md-4">
                                                        <label class="lbl" ><strong>Message</strong></label><br>
                                                        <span><?= $item['review']; ?></span>
                                                        </div>
                                                        
                                                        <div class="col-md-1">
                                                        <form action="code.php" method="POST">                                                   
                                                    <button type="submit" class="btn" name="delete_reviews" value="<?= $item['id']; ?>"><i class="fa fa-trash fa-lg text-dark" title="Delete"></i></button>
                                                </form> 
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
                                            <td colspan="5">No banners yet!</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    
                            <!-- </tbody>
                        </table> -->
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>