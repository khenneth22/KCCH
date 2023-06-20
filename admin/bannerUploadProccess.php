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
        if($filesize > $maxsize) 
        {?>
        
            <script>
                swal("Error", "File size is larger than the allowed limit.", "error");
                // alert('File size is larger than the allowed limit.');
                window.location.href="bannerManager.php";
                </script> 
                
                <!-- die("Error: File size is larger than the allowed limit."); -->
        <?php
    }
    
        if(in_array($filetype, $allowed)){
            if(file_exists("../uploads/" . $filename)){ ?>
                <script>
                alert('Image already exist. Change image name or use new image.');
                window.location.href="bannerManager.php";
                </script> 
                <?php 
                ?>
           <?php } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $filename);
                $sql = "INSERT INTO banners (img_name, top_text, mid_text, bot_text) VALUES ('$filename', ?, ?, ?)";
                if($stmt = mysqli_prepare($con, $sql)){
                    mysqli_stmt_bind_param($stmt, "sss", $param_top_text, $param_mid_text, $param_bot_text);
                    
                    $param_top_text = $_POST['top_text'];
                    $param_mid_text = $_POST['mid_text'];
                    $param_bot_text = $_POST['bot_text'];
                    
                    if(mysqli_stmt_execute($stmt)){ ?>
                        <!-- 
                        // header("location: bannerManager.php");
                        // echo 'Success'; -->
                        <script>
                        alert('Banner Uploaded!');
                        location.href="bannerManager.php";
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