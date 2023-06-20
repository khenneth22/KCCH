<?php
    if(isset($_POST["payment_mode"])){
        $payment_mode = $_POST['payment_mode'];
        if($payment_mode == "COD"){
            $payment = 50;
        } else {
            $payment = 0;
        }
        echo $payment;
        exit();
    }

?>