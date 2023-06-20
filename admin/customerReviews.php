<?php 

$page_title = "Kape Catalina's - Reviews Manager";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
  <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3 mb-2">
    <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Manage Reviews & testimonies
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                 <h4 class="m-3">Testimonies
                
                <a href="addTestimony.php" class="btn btn-success " style="float: right;">Add new testimony</a>
                </h4>

                    <div class="card-body" id="">
                        <table id="" class="table  table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Name</th></th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Testimony</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $reviews = getTestimonies();

                                if(mysqli_num_rows($reviews) > 0)
                                {
                                    foreach($reviews as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"><?php echo $i; $i++; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['name']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['testimonies']; ?></td>
                                            <td class="text-sm align-middle"> <?= $item['created_at']; ?> </td>
                                            
                                            <td>
                                            <form action="code.php" method="POST">                                                   
                                                <button type="submit" class="btn" name="delete_testimony_btn" value="<?= $item['id']; ?>"><i class="fa fa-trash fa-lg text-dark" title="Delete"></i></button>
                                               
                                            </form> 
                                             </td>  
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No testimonies uploaded yet!</td>
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                 <h4 class="m-3">Reviews
                 <!-- <a href="allReviews.php" class="btn btn-dark m-1 mt-2" style="float: right;">View all Reviews</a> -->
                </h4>

                    <div class="card-body" id="">
                        <table id="" class="table   table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Name</th></th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Testimony</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                 $reviews = getReviews();

                                if(mysqli_num_rows($reviews) > 0)
                                {
                                    foreach($reviews as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"> <?php echo $i; $i++; ?> </td>
                                            
                                            <td class="text-sm align-middle"> <?= $item['name']; ?> </td>
                                           
                                            <td class="text-sm align-middle"> <?= $item['review']; ?></td>
                                            <td class="text-sm align-middle"> <?= $item['created_at']; ?> </td>
                                            
                                            <td>
                                            <form action="code.php" method="POST">  
                                            <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
                                            <input type="hidden" name="review" value="<?php echo $item['review']; ?>">
                                                <button type="submit" class="btn" name="add_testimonies" value="<?= $item['id']; ?>"><i class="fas fa-plus fa-lg text-success" title="Add to Testimony"></i></button>                                                 
                                                <button type="submit" class="btn" name="delete_reviews" value="<?= $item['id']; ?>"><i class="fa fa-trash fa-lg text-dark" title="Delete"></i></button>
                                            </form> 
                                             </td>  
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No reviews yet!</td>
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