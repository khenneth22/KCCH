<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

//for adding category to the database
if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $new = isset($_POST['new']) ? '1':'0';
    $bestseller = isset($_POST['bestseller']) ? '1':'0';

    $image = $_FILES['image']['name'] ;

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $category_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, new, bestseller,image)
    VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords','$status', '$popular', '$new', '$bestseller', '$filename')";

    $category_query_run = mysqli_query($con, $category_query);

    if($category_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);
        redirect("addCategory.php", "Category added successfully!");
    }
    else
    {
        redirect("addCategory.php", "Something went wrong!");
    }
}

//for updating category to the database
else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $new = isset($_POST['new']) ? '1':'0';
    $bestseller = isset($_POST['bestseller']) ? '1':'0';

    $new_image = $_FILES['image']['name'] ;
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
        //$update_filename = $new_image;
    }
    else
    {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', 
    meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status', popular='$popular', new='$new', bestseller='$bestseller', image='$update_filename' 
    WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {

        if($_FILES['image']['name'] != '')
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/.$old_image");
            }
        }
        redirect("category.php?id=$category_id", "Category updated successfully!");
    }
    else
    {
        redirect("category.php?id=$category_id", "Something went wrong.");
    }
}

//for deleting category to the database
else if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query ="DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/.$image");
        }
        //redirect("category.php", "Deleted successfully!");
        echo 200;
    }
    else
    {
        //redirect("category.php", "Something went wrong.");
        echo 500;
    }
}

//for adding product to the database
else if(isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];

    $prod_code = $_POST['prod_code'];
    $name = $_POST['name'];
    // $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    // $add_ons = $_POST['add_ons'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    $new = isset($_POST['new']) ? '1':'0';
    $bestseller = isset($_POST['bestseller']) ? '1':'0';
    $feature = isset($_POST['feature']) ? '1':'0';

    $image = $_FILES['image']['name'] ;

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    //all fields must fill
    if($name != "" && $prod_code != "" && $description != "")
    {
        $product_query = "INSERT INTO products (category_id,prod_code,name,small_description,description,
        original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,new,bestseller,feature,image) VALUES
        ('$category_id','$prod_code','$name','$small_description','$description','$original_price','$selling_price','$qty',
        '$meta_title','$meta_description','$meta_keywords','$status','$trending','$new','$bestseller','$feature','$filename' )";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);
            redirect("products.php", "Product added successfully!");
        }
        else
        {
            redirect("addProducts.php", "Something went wrong.");
        }
        
    }
    else
        {
            redirect("addProducts.php", "All fields are mandatory!");
        }


}

//for updating product to the database
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    $new = isset($_POST['new']) ? '1':'0';
    $bestseller = isset($_POST['bestseller']) ? '1':'0';
    $feature = isset($_POST['feature']) ? '1':'0';

    $path = "../uploads";

    $new_image = $_FILES['image']['name'] ;
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
        //$update_filename = $new_image;
    }
    else
    {
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE products SET name='$name', slug='$slug', small_description='$small_description', description='$description',
    original_price='$original_price', selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description',
    meta_keywords='$meta_keywords', status='$status', trending='$trending',  new='$new', bestseller='$bestseller', feature='$feature', image='$update_filename' WHERE id='$product_id' ";

    $update_product_query_run = mysqli_query($con, $update_product_query);
    
    if($update_product_query_run)
    {

        if($_FILES['image']['name'] != '')
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/.$old_image");
            }
        }
        redirect("products.php?id=$product_id", "Product updated successfully!");
    }
    else
    {
        redirect("editProduct.php?id=$product_id", "Something went wrong.");
    }
}
else if (isset($_POST['delete_product_btn'])) 
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query ="DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/.$image");
        }
        //redirect("products.php", "Product deleted successfully!");
        echo 200;
        
    }
    else
    {
        //redirect("products.php", "Something went wrong!");
        echo 500;
    }
}

//deleting banners from database and admin dashboard
else if (isset($_POST['delete_banner_btn']))
{
    $banner_id = $_POST['delete_banner_btn'];

    $delete_query ="DELETE FROM banners WHERE id='$banner_id' LIMIT 1";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        redirect("bannerSettings.php", "Banner deleted successfully!");
        //echo 200;
    }
    else
    {
        redirect("bannerSettings.php", "Something went wrong!");
        //echo 500;
    }
}

//deleting offer banners from database and admin dashboard
else if (isset($_POST['delete_reviews']))
{
    $banner_id = $_POST['delete_reviews'];

    $delete_query ="DELETE FROM reviews WHERE id='$banner_id' LIMIT 1";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        redirect("customerReviews.php", "Reviews deleted successfully!");
        //echo 200;
    }
    else
    {
        redirect("customerReviews.php", "Something went wrong!");
        //echo 500;
    }
}


//updating status
else if (isset($_POST['update_status_btn']))
{
    $email = $_POST['email'];
    $track_no = $_POST['tracking_no'];
    $payment_id = $_POST['payment_id'];
    $order_status = $_POST['order_status'];
   @

    $update_order_query = "UPDATE orders SET status='$order_status', payment_id='$payment_id' WHERE tracking_no='$track_no' AND email='$email' ";
    $update_order_query_run = mysqli_query($con, $update_order_query);

    if($update_order_query_run){
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
        
            $mail->setFrom('tehesterr@gmail.com', 'Kape Catalina\'s Coffee House');           
            $mail->addAddress($email, 'Kape Catalina\'s Coffee House');
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Order Status';
            if($order_status == 1){
             $mail->Body    = "Thank You for ordering.\n Your order #{$track_no} has been confirmed and is now being Proccessed.";
          } elseif($order_status == 2){
             $mail->Body    = "Thank You.\n Your order is Completed.";
          } elseif($order_status == 3){
             $mail->Body    = "Hi, Your order #{$track_no} is out for Delivery.
             <h5>Click the button below when you received your order.</h5>
             <a href='https://kapecatalina.com/my-orders.php/login.php style=' background-color: #111111;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>
             <button>Order Received</button>
              </a>";
          } elseif($order_status == 4){
             $mail->Body    = "Hi, Your order #{$track_no} is ready for Pick-up.
             <h5>Click the button below when you received your order.</h5>
             <a href='https://kapecatalina.com/login.php style=' background-color: #111111;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>
             <button>Order Received</button>
              </a>";
          }elseif($order_status == 5){
            $mail->Body    = "
            Dear customer,

            <br>
            <br>
            $reason
            <br>
            <br>
            Please accept our sincere apologies. We're still growing and continue to serve you much
            better in the future.

            <br>
            <br>
            Yours truly,
            <br>
            Kape Catalina's Coffee House.";
        }
            $mail->send();
            $mail->ClearAllRecipients();
            // header("location: index.php");
            // redirect("index.php", "Order status updated successfully!");
            exit();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        exit();
    }
    redirect("index.php", "Order status updated successfully!");
    // header("location: index.php");
    exit();
   //else{
//      echo "Oops! Something went wrong. Please try again la  ter.";
//  }
}

//cancel order 
else if (isset($_POST['cancel_order_btn']))
{
    $track_no = $_POST['tracking_no'];
   // $order_status = $_POST['order_status'];

    $update_order_query = "UPDATE orders SET status='$order_status == 5' WHERE tracking_no='$track_no' ";
    $update_order_query_run = mysqli_query($con, $update_order_query);

    redirect("my-orders.php", "Order cancelled successfully!");
}

//adding testimonies to the database
else if(isset($_POST['add_testimonies']))
{
    $name = $_POST['name'];
    $testimonies = $_POST['review'];

    $review_query = "INSERT INTO testimonies (name, testimonies) VALUES ('$name', '$testimonies')";
    $review_query_run = mysqli_query($con, $review_query);

    if($review_query_run)
    {
        redirect("customerReviews.php", "added to testimony successfully!");
        exit();
    }else{
        redirect("customerReviews.php", "Something went wrong!");
        exit();
    }
}

//deleting testimony
else if (isset($_POST['delete_testimony_btn']))
{
    $banner_id = $_POST['delete_testimony_btn'];

    $delete_query ="DELETE FROM testimonies WHERE id='$banner_id' LIMIT 1";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        redirect("customerReviews.php", "Testimony deleted successfully!");
        //echo 200;
    }
    else
    {
        redirect("customerReviews.php", "Something went wrong!");
        //echo 500;
    }
}

else if(isset($_POST['addOrdersBtn']))
{
    $id = $_GET['id'];
    $order_qty = $_POST['order_qty'];

    $query = "INSERT INTO tbl_walkin (prod_id, order_qty) VALUES ('$id', '$order_qty')";
    $result = mysqli_query($con, $query);

    if($result)
    {
        redirect("walkinOrders.php", "Added successfully!");
    }
}

if(isset($_POST['deleteItems']))
{
    $id = $_POST['deleteItems'];

    $delete_query = "DELETE FROM walkin_cart WHERE id='$id' LIMIT 1 ";
    $query_run = mysqli_query($con, $delete_query);
    // echo $id;
    if($query_run)
    {
        redirect("orderCart.php", "Delete successfully!");
    }
}

//stock code
if(isset($_POST['add_stocks_btn']))
{
    $stockName = $_POST['stockName'];
    $stockQty = $_POST['stockQty'];
    $stockMin = $_POST['stockMin'];
    $stockMax = $_POST['stockMax'];

    $sql = "INSERT INTO tbl_stocks (stockName, stockQty, stockMin, stockMax) VALUES('$stockName', '$stockQty', '$stockMin','$stockMax')";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        redirect("stocks.php", "Added successfully!");
    }
    else
    {
        redirect("stocks.php", "Something went wrong.");
    }
}

//edit stock code
if(isset($_POST['edit_stocks_btn']))
{
    $stockId = $_POST['stock_id'];
    $stockName = $_POST['stockName'];
    $stockQty = $_POST['stockQty'];
    $stockMin = $_POST['stockMin'];
    $stockMax = $_POST['stockMax'];

    $updateSql = "UPDATE tbl_stocks SET stockName='$stockName', stockQty='$stockQty', stockMin='$stockMin', stockMax='$stockMax' WHERE id='$stockId' ";
    $updateRes = mysqli_query($con, $updateSql);

    if($updateRes)
    {
        redirect("stocks.php", "Edit successfully!");
    }
    else
    {
        redirect("stocks.php", "Something went wrong.");
    }

}

if(isset($_POST['deleteStock']))
{
    $id = $_POST['deleteStock'];

    $delete_query = "DELETE FROM tbl_stocks WHERE id='$id' LIMIT 1 ";
    $query_run = mysqli_query($con, $delete_query);
    // echo $id;
    if($query_run)
    {
        redirect("stocks.php", "Delete successfully!");
    }
}


else
{
    header('Location: ../index.php');
}

?>