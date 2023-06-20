<?php 
include('config/dbcon.php');
if (!isset($_GET['code'])) {
	exit("can't find the page"); 
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($con, "SELECT * FROM resetpassword WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	exit("can't find the page because not same code"); 
}

// handling the form 
if (isset($_POST['password'])) {
	$pw = $_POST['password']; 
	// $pw = md5($pw); // lagay nalang pag okay na conversion ng password
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE users SET password = '$pw' WHERE email = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM resetpassword WHERE code ='$code'"); 
	 	header('Location: login.php');
 	 }else {
 	 	exit('Something went wrong :('); 	
 	 } 	 
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
                  <input type="password" name="password" autocomplete="off" class="form-control my-5 py-4 rounded" placeholder="New Password">
                  <div class="text-center">
                    <!-- <button type="button" class="btn btn-dark btn-lg rounded px-4 w-100">Submit</button> -->
                    <input type="submit" name="submit" class="btn btn-dark btn-lg rounded px-4 w-100" value="Update Password">

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