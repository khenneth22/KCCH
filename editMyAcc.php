<?php 
session_start();
include('functions/userfunctions.php');
include('includes/header.php'); 

if(isset ($_SESSION['auth_user']['user_id']))
{
    $user_id = $_SESSION['auth_user']['user_id'];
}
            $res=mysqli_query($con,"select * from users where id=$user_id");
              
            while($row=mysqli_fetch_array($res))
            {
                $first_name=$row['first_name'];
                $last_name=$row['last_name'];
                $email=$row['email'];
                
            }

?>

<div class="py-2 m-5">
    <div class="container-fluid">
        <div class="card card-body shadow border-0 rounded pt-2">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                    <div class="m-2">
                            <h4 class="pb-3"><i class="fa fa-info-circle"></i> Edit Address Details
                                <button type="button" onclick="history.back();" class="btn btn-dark rounded" style="float: right;">Back</button>
                                <hr>
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                    
                    
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">First name</label>
                            <input type="text" name="first_name" id="" class="form-control rounded" value="<?php echo $first_name ?>" placeholder="First Name" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Last name</label>
                            <input type="text" name="last_name" id="" class="form-control rounded" value="<?php echo $last_name ?>" placeholder="Last Name" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                        <label class="font-weight-bold">Email</label>
                            <input type="email" name="email" id="" class="form-control rounded" value="<?php echo $email ?>" placeholder="Email" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Phone no</label>
                            <input type="text" name="phone_no"  class="form-control rounded" 
                                value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['phone_no'];
                                    }?>" 
                                placeholder="e.g. 09xxxxxxxxx" required>
                        </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                    
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">House no / Bldg no</label>
                                <input type="text" name="house_no" id="" class="form-control rounded" 
                                value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['house_no'];
                                    }?>" 
                                    placeholder="e.g. 012" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Street</label>
                                <input type="text" name="street" id="" class="form-control rounded" 
                                value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['street'];
                                    }?>" 
                                    placeholder="e.g. Corcillo" required>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Barangay</label>
                                <input type="text" name="barangay" id="brgy" class="form-control rounded" 
                                value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['barangay'];
                                    }?>" placeholder="e.g. 3 / Sta. Maria / Tinurik" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">City / Municipality</label>
                                <input type="text" name="city" id="show" class="form-control rounded" value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['city'];
                                    }?>" placeholder="e.g. Sto. Tomas" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Province</label>
                                <input type="text" name="province" id="show" class="form-control rounded" value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['province'];
                                    }?>" placeholder="e.g. Batangas" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Zip code</label>
                                <input type="text" name="zip" id="show" class="form-control rounded" value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['zip'];
                                    }?>" placeholder="e.g. 4232">
                            </div>
                            <div class="col-md-12 mt-5 text-center">
                            <input type="submit" name="update_address" class="btn btn-dark btn-lg rounded w-100 px-4 my-4" value="Update Address">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<?php
//include('../config/dbcon.php');

 if(isset($_POST['update_address']))
{
    $user_id = $_SESSION['auth_user']['user_id'];

    $phone_no =  $_POST['phone_no'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip = $_POST['zip'];

    $update_query = "UPDATE saved_address SET phone_no='$phone_no', house_no='$house_no', street='$street', barangay='$barangay', city='$city', province='$province', zip='$zip'
    WHERE user_id=$user_id ";
    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        ?>
        <script>window.location="my-account.php";</script><?php
        redirect("my-account.php", "Address edited successfully");
    }else{
        redirect("my-account.php", "Something went wrong.");
    }

}


?>