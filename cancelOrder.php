<?php
include('config/dbcon.php');
 
$status = "";
$status_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    if(empty($status_err)){
        $sql = "UPDATE orders SET status=? WHERE id=?";
         
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "ii", $param_status, $param_id);
            
            $param_status = 5;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header('Location: my-orders.php');
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($con);
} 
?>