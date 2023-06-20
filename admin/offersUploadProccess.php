
<?php
// Check if the form was submitted
include('../config/dbcon.php');
// if(isset($_POST['banner1'])){
//     $banner = "banner1";
// } elseif(isset($_POST['banner2'])){
//     $banner = "banner2";
// }  elseif(isset($_POST['banner3'])){
//     $banner = "banner3";
// }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        if(in_array($filetype, $allowed)){
            if(file_exists("../img/" . $filename)){ ?>
                <script>
                alert('Image already exist. Change image name or use new image.');
                 window.location.href="offersManager.php";
                </script> 
                <?php 
                ?>
           <?php } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../img/" . $filename);
                $sql = "INSERT INTO offers (offer_name, img_name, top_text, mid_text, bot_text) VALUES (?, '$filename', ?, ?, ?)";
                if($stmt = mysqli_prepare($con, $sql)){
                    mysqli_stmt_bind_param($stmt, "ssss", $param_offer_name, $param_top_text, $param_mid_text, $param_bot_text);
                   
                    $param_offer_name = $_POST['offer_name'];
                    $param_top_text = $_POST['top_text'];
                    $param_mid_text = $_POST['mid_text'];
                    $param_bot_text = $_POST['bot_text'];
                    
                    if(mysqli_stmt_execute($stmt)){ ?>
                        <!-- 
                        //header("location: bannerManager.php");
                        // echo 'Success'; -->
                        <script>
                        alert('Offer Uploaded!');
                        location.href="offersManager.php";
                        </script> 
                       <?php exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>