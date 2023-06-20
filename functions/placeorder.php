<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
session_start();
include('../config/dbcon.php');

//require 'userfunctions.php';

if(isset($_SESSION['auth']))
{
    if(isset($_POST['placeOrderBtn']))
    {
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $zip = mysqli_real_escape_string($con, $_POST['zip']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);  
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $comments = mysqli_real_escape_string($con, $_POST['comments']);
        $order_date = mysqli_real_escape_string($con, $_POST['order_date']);
        $order_time = mysqli_real_escape_string($con, $_POST['order_time']);
        $pricePerKm1 = mysqli_real_escape_string($con, $_POST['pricePerKm1']);

        if(isset($_FILES['image']['name']))
        {
            $image = $_FILES['image']['name'] ;
    
            $path = "../uploads";  
    
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = rand().'.'.$image_ext;

        }else{
            $filename = "";
            $image = "";
        }


        if($first_name =="" || $last_name =="" || $email =="" || $address =="" || $contact =="" || $payment_mode == "")
        {
            $_SESSION['message'] = "All fields are required";
            header('Location: ../checkout.php');
            exit(0);
        }

        $userId = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, c.add_ons, c.add_ons_total, p.id as pid, p.name, p.image, p.selling_price 
                FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
         $query_run = mysqli_query($con, $query);

        //$cartItems = getCartItems();
        $totalPrice = 0;
        $total = 0;
          foreach($query_run as $citem)
          {
              // $add_ons = $citem['add_ons'];
              // $add_ons_total = $citem['add_ons_total'];

              $total +=  $citem['selling_price'] * $citem['prod_qty'];

              if($payment_mode == "COD"){
                $pricePerKm = intVal("#pricePerKm");
                $totalPrice = $total + $pricePerKm;
                  //  $totalPrice = 1;
                } else {
                $totalPrice += $total;
                  //  $totalPrice = 2;
                }
          }

        $tracking_no = "kcch".rand(1111,9999).substr($contact,2);
        $user_id = $_SESSION['auth_user']['user_id'];

        $insert_query = "INSERT INTO orders (tracking_no, user_id,  first_name,	last_name, email, contact, address,	Zip, total_price, payment_mode, payment_id, status, comments, voucher, order_date, order_time, image) 
                        VALUES ('$tracking_no', '$user_id', '$first_name', '$last_name', '$email', '$address', '$contact', '$zip', '$totalPrice', '$payment_mode', '$payment_id', 0, '$comments','$pricePerKm1', '$order_date', '$order_time', '$filename')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);

            $order_id = mysqli_insert_id($con);
            foreach($query_run as $citem)
            {

                $prod_id = $citem['prod_id'];
                $prod_code = $citem['prod_code'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];

                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, prod_code, qty, price) VALUES 
                ('$order_id', '$prod_id', '$prod_code', '$prod_qty', '$price')";

                $insert_items_query_run = mysqli_query($con, $insert_items_query);

                $product_query = "SELECT * FROM products WHERE id='$prod_id' AND prod_code='$prod_code' LIMIT 1";
                $product_query_run = mysqli_query($con, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id' ";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);
            }

            $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId' ";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
            
            $_SESSION['message'] = "Order Placed Successfully, Thank You!";
            
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
              $mail->SMTPSecure = 'tls';                              
              $mail->Port       = 587;  
            

            //   Message for users
              $mail->setFrom('tehesterr@gmail.com', 'Kape Catalina\'s Coffee House');           
              $mail->addAddress($email, $first_name);
                 
              $mail->isHTML(true);                                  
              $mail->Subject = 'Placed order';
              $mail->Body    = '      
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <!-- LOGO -->

                  <tr>

                      <td bgcolor="#DA9F5B" align="center">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                                  <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td bgcolor="#DA9F5B" align="center" style="padding: 0px 10px 0px 10px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                                  <td bgcolor="#111111" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: century; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                      <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Yay! You just made an order!</h1> 
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td bgcolor="#111111" align="center" style="padding: 0px 10px 0px 10px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                              <tr>
                                  <td bgcolor="#111111" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: century; font-size: 18px; font-weight: 400; line-height: 25px;">
                                      <p style="margin: 0;">
                                      
                                          Thank you for purchasing our product/s. 

                                          <br>
                                          <br>


                                          We, in Kape Catalina, have received your order and it is now up for confirmation. 
                                          
                                          <br>
                                          <br>
                                          Please wait for awhile, you will receive an update shortly.

                                      </p>
                                      
                                      
                                  </td>
                              </tr>
                              <tr>
                                  <td bgcolor="#fffff" align="left">
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                              <td bgcolor="#111111" align="center" style="padding: 20px 30px 60px 30px;">
                                                  <table border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                          <td align="center" style="border-radius: 3px;" bgcolor="#DA9F5B"><a href="#" target="_blank" style="font-size: 20px; font-family: century; color: #e5f6df; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid; display: inline-block;">Pending</a></td>
                                                      </tr>
                                                  </table>
                                              </td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr> <!-- COPY -->
                              <tr>
                                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: century; font-size:18px; font-weight: 400; line-height: 25px;">
                                      <p style="margin: 0;">
                                      
                                          If you have any questions, please <a href="https://www.facebook.com/KapeCatalina">click here</a>.

                                      </p>
                                  </td>
                              </tr>
                              <tr>
                                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: century; font-size: 18px; font-weight: 400; line-height: 25px;">
                                      <p style="margin: 0;">
                                          <br>
                                          <br>
                                          
                                          Have a good day,
                                          
                                          <br>
                                          
                                          Kape Catalina\'s Coffee House
                                          
                                      </p>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>

              </table>';
              $mail->send();

              $mail->ClearAllRecipients();

            //   Message for admin
              $mail->setFrom($email, $first_name);           
              $mail->addAddress('tehesterr@gmail.com', 'Kape Catalina\'s Coffee House');
                 
              $mail->isHTML(true);                                  
              $mail->Subject = 'Order Recieved';
              $mail->Body    = "<h2><strong>Order recieved.</strong></h2> 
                                <h4>Ordered by</h4> \n
                                <h3>{$first_name}  {$last_name}.</h3> \n
                                <h4>Tracking No:</h4> 
                                <strong>{$tracking_no} - {$payment_mode}</strong>";
              $mail->send();
              echo "Mail has been sent successfully!";
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
            header('Location: ../my-orders.php');
            die();
        }
        
    }
}
else
{
    header('Location: ../index.php');
}
?>