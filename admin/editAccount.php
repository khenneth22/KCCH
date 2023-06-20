
<?php
// Include config file
// include('../middleware/adminMiddleware.php');
include('../config/dbcon.php');
 
$first_name = $last_name = $email = $role_as = "";
$first_name_err = $last_name_err = $email_err = $role_as_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name)){
        $first_name_err = "Please enter a first_name.";
    } elseif(!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $first_name_err = "Please enter a valid first_name.";
    } else{
        $first_name = $input_first_name;
    }
    
    $input_last_name = trim($_POST["last_name"]);
    if(empty($input_last_name)){
        $last_name_err = "Please enter a last_name.";
    } elseif(!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $last_name_err = "Please enter a valid last_name.";
    } else{
        $last_name = $input_last_name;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    
  $input_role_as = trim($_POST['role_as']);
    if($input_role_as == ""){
        $role_as_err = "Please select role.";
    } elseif($input_role_as == "admin"){
        $role_as = 1;
    } else {
        $role_as = 0;
    }
    // if(empty($input_role_as) && ($input_role_as != 0)){
    //     $role_as_err = "Please enter the role_as.";     
    // } elseif(!ctype_digit($input_role_as)){
    //     $role_as_err = "Please enter a positive integer value.";
    // } elseif(($input_role_as > 1) || ($input_role_as < 0)){
    //     $role_as_err = "Please choose either 0 or 1.";
    // } else{
    //     $role_as = $input_role_as;
    // }
    
    if(empty($name_err) && empty($address_err) && empty($role_as_err)){
        $sql = "UPDATE users SET first_name=?, last_name=?, email=?, role_as=? WHERE id=?";
         
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssi", $param_first_name, $param_last_name, $param_email, $param_role_as, $param_id);
            
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_role_as = $role_as;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: accounts.php");
                // echo 'Success!';
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
        
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $email = $row["email"];
                    $role_as = $row["role_as"];
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
        <div class="container-fluid ">
            <div class="card p-3 rounded">
                 <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-2">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="col-md-6 form-group mb-2">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                            <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                            <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <!-- Update ngayon -->
                        <div class="col-md-6 form-group mb-4">
                            <label>Role As</label>
                            <select name="role_as" id="" class="form-select <?php echo (!empty($role_as_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $role_as; ?>">
                                <option value="" disabled selected>Please choose account role.</option>
                                <option value="admin">Admin</option>
                                <option value="user">Customer</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $role_as_err;?></span>

                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-dark" value="Submit">
                        <a href="accounts.php" class="btn text-dark ml-2">Cancel</a>
                    </form>
                    
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="button" class=" btn btn-outline-dark" id="btnModal" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> remove account</button>
                
                 <!-- The Modal -->
                 <div class="modal fade" id="showModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                Are you sure you want to delete this account?</h4>
                                                <button type="button" class="close btn " id="closeModal" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form action="#" method="POST">
                                            <div class="modal-body">
                                                <input type="submit" class="btn btn-dark" name="yes" value="Yes">
                                                <input type="submit" class="btn text-dark" name="no" value="No">
                                            </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <?php
    //deleting accounts from database and admin dashboard
if (isset($_POST['yes']))
{
    $id = $_GET['id'];
    $delete_query ="DELETE FROM users WHERE id=$id ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        ?>
        <script>window.location="accounts.php";</script>
        <?php
        //echo 200;
    }
   
}
if (isset($_POST['no']))
{
        ?>
        <script>window.location="accounts.php";</script>
        <?php
}
    ?>

    <script type="text/javascript">
        $('#btnModal').on('click', function() {
            $('#showModal').modal('show');
           
        });
        $('#closeModal').click(function() {
            $('#showModal').modal('hide');
        });
        </script>
