<?php
include('../config/dbcon.php');
 
//$name = $product = $review = "";
//$name_err = $product_err = $review_err = "";
 
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $input_name = trim($_POST["name"]);
//     if(empty($input_name)){
//         $name_err = "Please enter a name.";
//     } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
//         $name_err = "Please enter a valid name.";
//     } else{
//         $name = $input_name;
//     }
    
   
//     $input_product = trim($_POST["product"]);
//     if(empty($input_product)){
//         $product_err = "Please select a product.";     
//     } else{
//         $product = $input_product;
//     }
    
//     $input_review = trim($_POST["review"]);
//     if(empty($input_review)){
//         $review_err = "Please enter the review.";     
//     } else{
//         $review = $input_review;
//     }
    
//     if(empty($name_err) && empty($product_err) && empty($review_err)){
//         $sql = "INSERT INTO reviews (name, product, review) VALUES (?, ?, ?)";
         
//         if($stmt = mysqli_prepare($con, $sql)){
//             mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_product, $param_review);
            
//             $param_name = $name;
//             $param_product = $product;
//             $param_review = $review;
            
//             if(mysqli_stmt_execute($stmt)){
//                 header("location: ../index.php");
//                 exit();
//             } else{
//                 echo "Oops! Something went wrong. Please try again later.";
//             }
//         }
         
//         mysqli_stmt_close($stmt);
//     }
    
//     mysqli_close($con);
// }

if(isset($_POST['add_comments']))
{
    $name = $_POST['name'];
    $review = $_POST['review'];

    $review_query = "INSERT INTO reviews (name, review) VALUES ('$name', '$review')";
    $review_query_run = mysqli_query($con, $review_query);

    if($review_query_run)
    {
        echo "Submitted successfully!";
        header("location: ../index.php");
        exit();
    }else{
        echo "Something went wrong.";
        header("location: ../index.php");
        exit();
    }

}



?>
 