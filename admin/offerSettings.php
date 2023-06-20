<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

<div class="py-0 mt-3">
        <div class="container">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
          <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Offer Settings
            <button type="button" class="btn btn-dark float-end mx-2" onclick="history.back();">Back</button></h4>
          </div>
        </div>
            <div class=" card-body border-0  rounded">
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
                            
                                    $offers = getAll("offers");

                                    if(mysqli_num_rows($offers) > 0)
                                    {
                                        
                                            foreach($offers as $item){

                                           
                                        ?>
                                            <div class="card m-2 shadow border-0  rounded">
                                                <div class="card-body m-1">
                                                    <div class="row align-items-center">   
                                                    
                                                        <div class="col-md-2">
                                                        <label class="lbl"><strong>Time & Date</strong></label><br>
                                                            <span><?= $item['created_at']; ?></span> <!-- time the order created -->
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label class="lbl"><strong>Offer name</strong></label><br>
                                                            <span><?= $item['offer_name']; ?></span> 
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label class="lbl"><strong>Image name</strong></label><br>
                                                            <span><?= $item['img_name']; ?></span> 
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label class="lbl" ><strong>Top Text</strong></label><br>
                                                        <span><?= $item['top_text']; ?></span>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label class="lbl"><strong>Middle Text</strong></label><br>
                                                        <span><?= $item['mid_text']; ?></span> <!-- pick-up or cod -->
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label class="lbl"><strong>Bottom Text</strong></label><br>
                                                        <span><?= $item['bot_text']; ?></span> <!-- pick-up or cod -->
                                                        </div>
                                                        <div class="col-md-12 pt-3 text-center">
                                                        <form action="code.php" method="POST">                                                   
                                                    <button type="submit" class="btn" name="delete_offerBanner_btn" value="<?= $item['id']; ?>"><i class="fa fa-trash fa-lg text-danger" title="Delete"></i></button>
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
                                            <td>No offers banner uploaded yet!</td>
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