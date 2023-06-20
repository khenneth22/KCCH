
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
// require '../vendor/autoload.php';
include('config/dbcon.php');


if (isset($_POST['email'])) {

    $emailTo = $_POST['email']; 
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    $code = uniqid(true); // true for more uniqueness 
    $query = mysqli_query($con,"INSERT INTO resetpassword (code, email) VALUES('$code','$emailTo')"); 
    if (!$query) {
       exit('Error'); 
    }
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;     // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tehesterr@gmail.com';                 // SMTP username
        $mail->Password = 'bmqlkihnmirdbwko';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;   // for tls                                 // TCP port to connect to
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('tehester@gmail.com'); // from who? 
        $mail->addAddress($emailTo);     // Add a recipient

        // $mail->addReplyTo('tehester@gmail.com', 'No Replay');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Content
        // this give you the exact link of you site in the right page 
        // if you are in actual web server, instead of http://" . $_SERVER['HTTP_HOST'] write your link 
        $url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']). "/resetPasswordForm.php?code=$code"; 
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your password reset link from Kape Catalinas Coffee House';
        $mail->Body    = "<h1> You requested password reset </h1>
                         Click <a href='$url'>this link</a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // to solve a problem 
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );


        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    header('Location: index.php');
    exit(); // to stop user from submitting more than once 
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Reset Password</title>
  </head>
  <body>
    <section>
      <div class="container mt-5 pt-5 ">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0">
              <div class="card-body">
                <h1 class="text-center">Reset your password</h1>
                <p class="text-center ">We will send you an email to reset your password</p>
                <form action="#" method="post">
                  <!-- <input type="email" name="" id="" class="form-control my-5 py-4 rounded" placeholder="Email"> -->
                  <input type="email" name="email" autocomplete="off" class="form-control my-5 py-4 rounded" placeholder="Email" required>
                  <div class="text-center">
                    <!-- <button type="button" class="btn btn-dark btn-lg rounded px-4 w-100">Submit</button> -->
                    <input type="submit" name="submit" class="btn btn-dark btn-lg rounded px-4 w-100" value="Submit">

                    <a href="login.php" class="nav-link text-dark"><u>Cancel</u></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>