<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php if(isset($page_title)) {echo "$page_title";} else {echo "Kape Catalina's Coffee House";}?></title>
    <meta name="description" content="<?php if(isset($meta_description)) {echo "$meta_description";}?>">
    <meta name="keywords" content="<?php if(isset($meta_keywords)) {echo "$meta_keywords";}?>">
  
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../img/kape-catalina-logo.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" />
<!-- Iconscout Link For Icons -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  
  <!-- Alertify JS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  <!-- jquery datatables -->
  <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"/>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.1.0/css/scroller.dataTables.min.css">

<style>
  .form-control{
    border: 1px solid #b3a1a1 !important;
    padding: 8px 10px;
  }
  .form-select{
    border: 1px solid #b3a1a1 !important;
    padding: 8px 10px;
  }

  /* sup{
        content: "";
        position: relative;
        top: -2.3rem;
        right: -.60rem;
        width: 25px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background-color: red;
        color: white;
        
    } */

    /* for toggle switch */

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196f3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196f3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php include('sidebarv2.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">