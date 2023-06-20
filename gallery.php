<?php
// session_start();
// include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<!-- <style>
    .gallery > img{
        width: 100%;
        object-fit: cover;
    }
    .gallery > .img-1x1{
        grid-column-end: span 1;
        grid-row-end: span 1;
        aspect-ratio: 1 /1;
    }
    .gallery > .img-2x2{
        grid-column-end: span 2;
        grid-row-end: span 2;
        aspect-ratio: 1 /1;
    }
    .gallery > .img-2x1{
        grid-column-end: span 2;
        grid-row-end: span 2;
        aspect-ratio: 2 /1;
    }
    .gallery{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-flow: dense;
    }
</style> -->

<body>
    
    <!-- <div class="gallery">
        <img src="img/service-1.jpg" class="img-1x1" alt="">
        <img src="img/service-2.jpg" class="img-1x1" alt="">
        <img src="img/service-3.jpg" class="img-2x2" alt="">
        <img src="img/service-4.jpg" class="img-1x1" alt="">
        <img src="img/service-4.jpg" class="img-2x1" alt="">
        <img src="img/service-4.jpg" class="img-2x1" alt="">
        <img src="img/service-1.jpg" class="img-1x1" alt="">
        <img src="img/service-2.jpg" class="img-1x1" alt="">
        <img src="img/service-3.jpg" class="img-2x2" alt="">
        <img src="img/service-4.jpg" class="img-1x1" alt="">
        <img src="img/service-4.jpg" class="img-1x1" alt="">
        <img src="img/service-4.jpg" class="img-1x1" alt="">
        
    </div> -->
    <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Gallery</h4>
                <h1 class="display-6">Our Customers</h1>
            </div>
            
    <div class="owl-carousel owl-theme gallery-carousel">
        <div class="images col-md-12">
            <div class="row justify-content-center">
                <!-- <div class="card m-2" style="width: 18rem;">
                 <img class="card-img-top" src="img/service-1.jpg" alt="Card image cap" height="0px" width="50px">
                </div> -->
                <div class="card-group">
                    <div class="card bg-light border-0">
                        <img class="card-img-top" src="img/service-1.jpg" height="60%">
                        
                    </div>
                </div>
                <!-- <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="img/service-1.jpg" alt="Card image cap">
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="img/service-1.jpg" alt="Card image cap">
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="img/service-1.jpg" alt="Card image cap">
                </div> -->
            </div>
        </div>      
    </div>

</body>
</html>
<?php
// include('includes/footer.php');
?>