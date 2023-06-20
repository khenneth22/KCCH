<?php

if(!isset($_SESSION['auth']))
    {
     header("login.php", 'Login to see items in cart');
    }
?>