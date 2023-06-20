<?php
include('config/dbcon.php');
    // Include config file
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    // use PHPMailer\PHPMailer\SMTP;


    // require '../vendor/phpmailer/phpmailer/src/Exception.php';
    // require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    // require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    // include('config/dbcon.php');
    // $status = 0;
    
    // if(isset($_POST["id"]) && !empty($_POST["id"])){
    //     $id = $_POST["id"];
    //     $tracking_no = $_GET['tracking_no'];
        
    //     if(empty($status_err)){
    //         $sql = "UPDATE orders SET status=? WHERE id=?";
            
    //         if($stmt = mysqli_prepare($con, $sql)){
    //             mysqli_stmt_bind_param($stmt, "si", $param_status, $param_id);
                
    //             $param_status = $status;
    //             $param_id = $id;
                
    //             if(mysqli_stmt_execute($stmt)){

    //                 // Notify admin about the oreder cancellation
    //                 $mail = new PHPMailer(true);
                    
    //                 try {
    //                     $mail->SMTPDebug = 2;                                       
    //                     $mail->isSMTP();                                            
    //                     $mail->Host       = 'smtp.gmail.com;';                    
    //                     $mail->SMTPAuth   = true;                             
    //                     $mail->Username   = 'tehesterr@gmail.com';                 
    //                     $mail->Password   = 'bmqlkihnmirdbwko';                        
    //                     $mail->SMTPSecure = 'ssl';                              
    //                     $mail->Port       = 465;  
                    
    //                     $mail->setFrom('tehesterr@gmail.com');           
    //                     $mail->addAddress('tehesterr@gmail.com', 'Kape Katalina');
                        
    //                     $mail->isHTML(true);                                  
    //                     $mail->Subject = 'Order Cancellation';
    //                     $mail->Body    = "Order with the tracking_no: {$tracking_no} is cancelled.";
    //                     $mail->send();
    //                     header("location: my-orders.php");
    //                     exit();

    //                 } catch (Exception $e) {
    //                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //                 }



    //             } else{
    //                 echo "Oops! Something went wrong. Please try again later.";
    //             }
    //         }
            
    //         mysqli_stmt_close($stmt);
    //     }
        
    //     mysqli_close($con);
    // } else{
    //     if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    //         $id =  trim($_GET["id"]);
    //         $sql = "SELECT * FROM orders WHERE id = ?";
    //         if($stmt = mysqli_prepare($con, $sql)){
    //             mysqli_stmt_bind_param($stmt, "i", $param_id);
    //             $param_id = $id;
    //             if(mysqli_stmt_execute($stmt)){
    //                 $result = mysqli_stmt_get_result($stmt);
    //                 if(mysqli_num_rows($result) == 1){
    //                     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //                     $status = $row["status"];
    //                 } else{
    //                     echo 'Error';
    //                     exit();
    //                 }
                    
    //             } else{
    //                 echo "Oops! Something went wrong. Please try again later.";
    //             }
    //         }
    //         mysqli_stmt_close($stmt);
    //         mysqli_close($con);
    //     }  else{
    //         echo 'Error';
    //         exit();
    //     }
    // }<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>
    <!-- // ?> -->

 <?php 
session_start();
include('includes/header.php') 
?>
<body>
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card align-items-center border-0 bg-transparent">
                        
                        <div class="p-5 card-body text-center bg-white rounded">
                            
                            <h2 class=" mb-2">Cancel Order</h2>

                            <p  class=" mt-4">Are you sure you want to cancel this order?</p>
                            <!-- <form action="functions/addReviewProcess.php" method="post"> -->
                             <form action="#" method="POST"> 
                                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                                <!-- <input type="hidden" name="status" value="5"/> -->
                            
                                <button type="submit" name="update" class="btn btn-dark rounded" value="YES">Yes</button>

                                <!-- <input type="submit" class="btn btn-dark rounded" value="Yes"> -->
                                <a href="my-orders.php" class="btn  ml-2">Cancel</a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>        
        </div>
    <?php include('includes/footer.php'); ?>
      <?php
      
      if(isset($_POST['update']))
      {
                                    $id = $_GET['id'];
                                    mysqli_query($con, "UPDATE orders SET status='5' WHERE id='$id'");
                                    ?>  
                                    <script>window.location="my-orders.php";</script>
                                    <?php

      }
      ?>