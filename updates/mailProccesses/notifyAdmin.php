<?php
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  
  require '../vendor/phpmailer/phpmailer/src/Exception.php';
  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../vendor/phpmailer/phpmailer/src/SMTP.php';
  
$mail = new PHPMailer(true);
$emailUser = $_POST['email']; 
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'tehesterr@gmail.com';                 
    $mail->Password   = 'bmqlkihnmirdbwko';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;  
  
    $mail->setFrom('tehester@gmail.com');           
    $mail->addAddress('receiver1@gfg.com');
    $mail->addAddress('receiver2@gfg.com', 'Name');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    = 'HTML message body in <b>bold</b> ';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  
?>