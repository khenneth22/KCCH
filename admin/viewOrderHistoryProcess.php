<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    include('../config/dbcon.php');
    
    $sql = "SELECT * FROM orders WHERE id = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $tracking_no = $row["tracking_no"];
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                $email = $row["email"];
                $contact = $row["contact"];
                $address = $row["address"];
                $total_price = $row["total_price"];

            } else{
                // echo 'Error';
                echo 'Error';
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else{
    echo 'Error';
    exit();
}
?>