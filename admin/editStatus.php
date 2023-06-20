<?php
// Include config file
// include('../middleware/adminMiddleware.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include('../config/dbcon.php');
 
$status = "";
$status_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $email = $_GET['email'];
    
    $input_status = trim($_POST["status"]);
    if(empty($input_status) && ($input_status != 0)){
        $status_err = "Please enter a status number from 1-4. If cancelled please enter 0.";     
    } else{
        $status = $input_status;
    }
    
    if(empty($status_err)){
        $sql = "UPDATE orders SET status=? WHERE id=?";
         
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "ii", $param_status, $param_id);
            
            $param_status = $status;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                   // Notify user about order status change
                   $mail = new PHPMailer(true);
                
                   try {
                       $mail->SMTPDebug = 2;                                       
                       $mail->isSMTP();                                            
                       $mail->Host       = 'smtp.gmail.com;';                    
                       $mail->SMTPAuth   = true;                             
                       $mail->Username   = 'tehesterr@gmail.com';                 
                       $mail->Password   = 'bmqlkihnmirdbwko';                        
                       $mail->SMTPSecure = 'ssl';                              
                       $mail->Port       = 465;  
                   
                       $mail->setFrom('tehesterr@gmail.com', 'Kape Katalina');           
                       $mail->addAddress($email, 'Kape Katalina');
                       
                       $mail->isHTML(true);                                  
                       $mail->Subject = 'Order Status';
                       if($status == 2){
                        $mail->Body    = "Your order is being proccessed.";
                     } elseif($status == 3){
                        $mail->Body    = "Your order is completed.";
                     } elseif($status == 4){
                        $mail->Body    = "Your order out for delivery.";
                     } elseif($status == 5){
                        $mail->Body    = "Your order is ready for pick-up.";
                     }
                    //    $mail->Body    = "Order with the tracking_no: {$tracking_no} is cancelled.";
                       $mail->send();
                       header("location: index.php");
                       exit();
   
                   } catch (Exception $e) {
                       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                   }
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($con);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM orders WHERE id = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $status = $row["status"];
                } else{
                    echo 'Error';
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($con);
    }  else{
        echo 'Error';
        exit();
    }
}
?>
 
 <?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control <?php echo (!empty($status_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $status; ?>">
                            <p>Please enter a status number from 1-4. If cancelled please enter 0.</p>
                            <ul>
                                <li>0 - Cancelled</li>
                                <li>1 - Pending</li>
                                <li>2 - Proccessing</li>
                                <li>3 - Completed</li>
                                <li>4 - On the way to deliver</li>
                                <li>5 - Ready to pick-up</li>
                            </ul>
                            <span class="invalid-feedback"><?php echo $status_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
    </div>
    <?php include('includes/footer.php'); ?>

