<?php

$page_title = "Kape Catalina's - Banner Manager";
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
        <form action="bannerUploadProccess.php" method="post" enctype="multipart/form-data">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mb-2 text-center">
          <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Upload Banner </h4>
          </div>
        </div>
        <div class="card p-3 shadow border-0  rounded">
          <div class="col-md-12">

            <button type="button" class="btn btn-outline-dark float-end" onclick="history.back();">Back</button>
          </div>
          <label class="mt-2">Top Text (optional)</label>
          <input type="text" name="top_text" id="" class=" w-50" placeholder="e.g. Discover"><br>

          <label for="">Middle Text (optional)</label>
          <input type="text" name="mid_text" id="" class="w-50" placeholder="e.g. a Coffee"><br>

          <label for="">Bottom Text (optional)</label>
          <input type="text" name="bot_text" id="" class="w-50" placeholder="e.g. That's made for you"><br>
          <label for="fileSelect">Filename:</label>
          <input type="file" class="btn" name="photo" id="fileSelect"><br>
            <input type="submit" name="banner" class="w-50 mt-1 mb-4 btn btn-dark" value="Upload">
            <!-- <input type="submit" name="banner2" value="Upload for banner 2">
            <input type="submit" name="banner3" value="Upload for banner 3"> -->
            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
        </div>
        </form>
    </div>
    <?php include('includes/footer.php'); ?>