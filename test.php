<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>
<body>
    <form action="storeImage.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="text" name="top_text" id="">
        <input type="text" name="mid_text" id="">
        <input type="text" name="bot_text" id="">
        <input type="submit" name="banner1" value="Upload for banner 1">
        <input type="submit" name="banner2" value="Upload for banner 2">
        <input type="submit" name="banner3" value="Upload for banner 3">
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
    </form>
    <?php

include('config/dbcon.php');

// Attempt select query execution
$sql = "SELECT * FROM banner1 ORDER BY id DESC LIMIT 1";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){ ?>
           <img src="uploads/<?php echo $row['img_name'] ?>" alt="">
           <h2><?php echo $row['top_text']; ?></h2>
           <h2><?php echo $row['mid_text']; ?></h2>
           <h2><?php echo $row['bot_text']; ?></h2>

        <?php }
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>
</body>
</html>