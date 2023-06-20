<?php 
    session_start();
    include('includes/header.php');
    include('authenticate.php');
    include('functions/userfunctions.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    
    <title>Add Review</title>
  </head>
  <body>
    <section>
      <div class="container mt-3   ">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
         
            <div class="card shadow border-0 rounded mt-5 mb-5 ">
              <div class="card-body">
                <h1 class="text-center pb-5">Add Review</h1>

                <form action="functions/addReviewProcess.php" method="POST">
                  <div class="form-group">
                    <label for="">Name</label>
                  <input type="text" name="name" id="" class="form-control my-1 py-4 rounded <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" placeholder="e.g. Juan Dela Cruz">
                  <span class="invalid-feedback"><?php echo $name_err;?></span>
                  </div>
                  <!-- <input type="password" name="password" id="" class="form-control my-3 py-4 rounded" placeholder="Password"> -->
                  <div class="form-group">
                  <!-- <select name="product" id="" class="form-control my-3 rounded review-select <?php echo (!empty($product_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" disabled selected hidden>Choose Product</option>
                    <option value="opt1">Product 1</option>
                    <option value="opt2">Product 2</option>
                    <option value="opt3">Product 3</option>
                    <option value="opt4">Product 4</option>
                    <option value="opt5">Product 5</option>
                  </select> -->
                  <span class="invalid-feedback"><?php echo $product_err;?></span>
                  </div>
                  <div class="form-group">
                  <textarea name="review" id="" cols="30" rows="10" class="form-control rounded review-textarea <?php echo (!empty($review_err)) ? 'is-invalid' : ''; ?>" placeholder="Type your message..."></textarea>
                  <span class="invalid-feedback"><?php echo $review_err;?></span>
                  </div>

                  <!-- <a href="resetPassword.php" class="text-dark"><u>Forgot Password?</u></a> -->
                  
                  <div class="text-center">
                    <!-- <button type="submit" class="btn btn-dark btn-lg rounded mt-5 w-100 px-4">Submit</button> -->
                    <input type="submit" class="btn btn-dark btn-lg rounded mt-5 w-100 px-4" value="Submit">
                    <a href="index.php" class="nav-link text-dark pt-3"><u>Cancel</u></a>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include('includes/footer.php'); ?>
  </body>
</html>