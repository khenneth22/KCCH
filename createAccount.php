
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

    <title>Create Account</title>
  </head>
  <body>
    <section>
      <div class="container mt-3 pt-5 ">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card shadow rounded border-0 mt-3 mb-5">
              <div class="card-body">
                <h1 class="text-center pt-2 pb-3">Create account</h1>
                
                <form action="functions/authcode.php" method="POST">
                  <input type="text" name="first_name" id="" class="form-control my-3 py-4 rounded" placeholder="First Name">
                  <input type="text" name="last_name" id="" class="form-control my-3 py-4 rounded" placeholder="Last Name">
                  <input type="email" name="email" id="" class="form-control my-3 py-4 rounded" placeholder="Email">
                  <input type="password" name="password" id="show" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control my-3 py-4 rounded" placeholder="Password"><span toggle="#password-field" id="show" onclick="myFunction()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  
                  <div id="message">
                    <!-- <h6>Password must contain the following:</h6> -->
                    <p id="length" class="invalid">Minimum 8 characters</p>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">An uppercase letter</p>
                    <p id="number" class="invalid">A number</p>
                  </div>
                  
                  <input type="password" name="cpassword" id="cshow" class="form-control my-3 py-4 rounded" placeholder="Confirm Password"><span toggle="#password-field" id="cshow" onclick="pw2Function()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <!-- <label ><input type="checkbox"  id="show" onclick="myFunction()" class="mb-4"><span class="p-2">Show password</span></label> -->
                  
                  <div class="text-center">
                    <button type="submit" name="registerBtn" class="btn btn-dark btn-lg rounded w-100 px-4 my-4">Create</button>
                    <a href="login.php" class="nav-link text-dark"><u>Already have an account</u> </a>
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

<script>
var myInput = document.getElementById("show");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>