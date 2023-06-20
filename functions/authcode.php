<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

    session_start();
    include('../config/dbcon.php');
    include('myfunctions.php');
   
    //for create account 
    if(isset($_POST['registerBtn']))
    {
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']); 
        $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $verify_token = bin2hex(random_bytes(16));
        
        //check if email is already registered
        $check_email_query = "SELECT email FROM users WHERE email='$email' ";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $_SESSION['message'] = "Email already registered";
            header('Location: ../createAccount.php');
        }
        else
        {

        if($password == $cpassword)
        {
            //insert user data
            //$encpass = md5($password);
            $insert_query = "INSERT INTO users (first_name, last_name, email, password, verify_token, is_verified) VALUES ('$first_name', '$last_name', '$email', '$password', '$verify_token', '0')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                //sendemail_verify("$first_name", "$email", "$verify_token"); //for PHPMailer 
                $_SESSION['message'] = "Registered Successfuly";
                

                 // Mail proccess 
                 // Palitan nalang mga value ng body
            
                $mail = new PHPMailer(true);
                try {
                $mail->SMTPDebug = 0;                                       
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com;';                    
                $mail->SMTPAuth   = true;                             
                $mail->Username   = 'tehesterr@gmail.com';                 
                $mail->Password   = 'bmqlkihnmirdbwko';                        
                $mail->SMTPSecure = 'ssl';                              
                $mail->Port       = 465;  
                

                //   Message for users
                $mail->setFrom('tehesterr@gmail.com', 'Kape Catalina\'s Coffee House');           
                $mail->addAddress($email, $first_name);
                    
                $mail->isHTML(true);                                  
                $mail->Subject = 'Welcome to Kape Catalina\'s Coffee House';
                $mail->Body    = "<h2>Welcome to Kape Catalina's Coffee House</h2>
                                    <h4><strong>Congratulations!</strong> You have successfully created your account.</h4>
                                    \n
                                    <h5>Start your day with coffee.</h5>\n
                                    <p>Please verify your email by clicking the button below.</p>
                                    <br>
                                    <a href='http://localhost/Kape%20Catalinas%20Coffee%20House/Kape%20Catalina/verify-email.php?email=$email&verify_token=$verify_token' style=' background-color: #111;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>
                                    <button>Verify email</button>
                                    </a> " ;
                                    
                $mail->send();

                $mail->ClearAllRecipients();

                //   Message for admin
                $mail->setFrom($email, $first_name);           
                $mail->addAddress('tehesterr@gmail.com', 'Kape Catalina\'s Coffee House');
                    
                $mail->isHTML(true);                                  
                $mail->Subject = 'New Created Account';
                $mail->Body    = "<h2><strong>New account has been created</strong></h2> 
                                    <h4>Account name: {$first_name} {$last_name}.</h4>
                                    <h6>Date: {$created_at}</h6>
                                    ";
                $mail->send();
                echo "Mail has been sent successfully!";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                header('Location: ../login.php');
                die();
            }else{
                    $_SESSION['message'] = "Something went wrong";
                    header('Location: ../createAccount.php');
                }
        }   
        else{
            $_SESSION['message'] = "Password does not match";
            header('Location: ../createAccount.php');
        }
    }
}


//for login account
else if(isset($_POST['loginBtn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
         $userdata = mysqli_fetch_array($login_query_run);
        if($userdata['is_verified']==1)
        {
            $_SESSION['auth'] = true;
    
            // $userdata = mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $username = $userdata['first_name'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];
    
            $_SESSION['auth_user'] = [
                'user_id' => $userid,   
                'first_name' => $username,
                'email' => $useremail
            ];
            
            $_SESSION['role_as'] = $role_as;
    
            if($role_as == 1)
            {
                redirect("../admin/index.php","Welcome to Dashboard");
            }
            else if($role_as == 2)
            {
                redirect("../admin/walkinOrders.php","Welcome to Rider Dashboard");
            }
            else
            {
                redirect("../index.php", "Login Successfully");
            }
        } else {
            echo "<script>alert('Please verify your email before proceeding!'); window.location.href='../login.php';</script>";
        }
    }
    else
    {
        redirect("../login.php", "Invalid Email or Password");
    }
}
 
    

?>