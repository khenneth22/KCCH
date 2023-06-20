<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
</head>
<body>
    <div class="container p-3">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mb-2 text-center">
            <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Add New Testimony </h4>
            </div>
        </div>
        <div class="card p-3 shadow border-0  rounded">
            <a href="customerReviews.php"><div class="col-md-12" ><i class="fas fa-reply" style="float: right; "><span style="font-family:Arial, Helvetica, sans-serif;"> Back</span> </i></div></a> 
        <form action="code.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
             <label for="">Name</label>
             <input type="text" name="name" maxlength="8" class="form-control my-1 py-2 rounded" value="" placeholder="e.g. Juan Dela Cruz">
          </div>
          <div class="form-group">
              <textarea name="review" id="comments" maxlength="100" cols="30" rows="5" class="form-control rounded review-textarea" placeholder="Type your message..."></textarea>
              <span id="counter" 
                                            style="position:relative;
                                            font-size: 13px;
                                            float: right;
                                            right: 15px;
                                            top: -25px;
                                            color: #c7ccd1;
                                            ">100</span>
            </div>
           <button type="submit" name="add_testimonies" class="btn btn-dark btn-lg rounded mt-2 w-100 px-4">Submit</button>
        </form>
    </div>
    <?php include('includes/footer.php'); ?>