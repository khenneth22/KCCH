<?php 
session_start();


if (isset($_SESSION['auth']))
{
  $_SESSION['message'] = "You are already logged in";
  header('Location: index.php');
  exit();
}

include('includes/header.php'); 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    
    <title>Login</title>
  </head>
  <body>
    <section>
      <div class="container mt-3   ">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
         
            <div class="card shadow border-0 rounded mt-5 mb-5 ">
              <div class="card-body">
                <h1 class="text-center pb-5">Sign in</h1>

                <form action="functions/authcode.php" method="POST">
                  <input type="email" name="email" id="" class="form-control my-3 py-4 rounded" placeholder="Email">
                  <input type="password" name="password" id="show" class="form-control my-3 py-4 rounded" placeholder="Password"><span toggle="#password-field" id="show" onclick="myFunction()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <!-- <label ><input type="checkbox"  id="show" onclick="myFunction()" class="mb-4"><span class="p-2">Show password</span></label> -->
                  
                    <a href="resetPassword.php" class="text-dark" style="float: right;"><u>Forgot Password?</u></a>
                  
                  
                  <div class="text-center">
                    <button type="submit" name="loginBtn" class="btn btn-dark btn-lg rounded mt-5 w-100 px-4">Login</button>
                    <a href="createAccount.php" class="nav-link text-dark pt-3"><u>Create account</u></a>
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