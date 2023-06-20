<?php
include('config/dbcon.php');

if(isset($_GET['email']) && isset($_GET['verify_token']))
{
    $query = "SELECT * FROM `users` WHERE `email`='$_GET[email]' AND `verify_token`='$_GET[verify_token]'";
    $result = mysqli_query($con, $query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
                $update="UPDATE `users` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
                if(mysqli_query($con, $update)){
                    $_SESSION['message'] = "Email verified successfully!";
                    header('Location: login.php');
                }else{
                    $_SESSION['message'] = "Email already registered";
                    header('Location: login.php');
                }
            }else{
            $_SESSION['message'] = "Something went wrong";
                    header('Location: ../login.php');
            }
        }

    }else{
        $_SESSION['message'] = "Something went wrong";
                    header('Location: ../createAccount.php');
    }
}
?>