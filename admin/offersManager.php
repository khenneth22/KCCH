<?php

$page_title = "Kape Catalina's - Offers Manager";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

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
        <form action="offersUploadProccess.php" method="post" enctype="multipart/form-data">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mb-2 text-center">
          <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Upload Offer </h4>
          </div>
        </div>
        <div class="card p-3 shadow border-0  rounded">
         <a href="offerSettings.php"><div class="col-md-12" ><i class="fa fa-cog" style="float: right; "><span style="font-family:Arial, Helvetica, sans-serif;"> Offers Settings</span> </i></div></a> 

            <label class="mt-3" style="font-size: 14px;">Offer Name</label>
            <input type="text" name="offer_name" id="" class="mt-0 w-50" placeholder=""><br>

            <label style="font-size: 14px;">Discount Offer (%)</label>
            <input type="text" name="top_text" id="" class="w-50" placeholder="e.g. 50% Off"><br>

            <label style="font-size: 14px;">Offer</label>
            <input type="text" name="mid_text" id="" class="w-50" placeholder="e.g. Sunday Special Offer"><br>
            
            <label style="font-size: 14px;">Period Date</label>
            <input type="text" name="bot_text" id="" class="w-50" placeholder="e.g. from November to 1st week of December"><br>

            <label for="fileSelect">Filename:</label>
            <input type="file" class="btn" name="photo" id="fileSelect"><br>
            <input type="submit" name="offers" class="w-50 mt-1 mb-4 btn btn-dark" value="Upload">
            <!-- <input type="submit" name="banner2" value="Upload for banner 2">
            <input type="submit" name="banner3" value="Upload for banner 3"> -->
            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
        </div>
        </form>
    </div>
    <?php include('includes/footer.php'); ?>