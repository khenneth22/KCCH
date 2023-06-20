<?php 
session_start();
include('includes/header.php');  ?>

<style>
    .container-img {
  display: grid;
  grid-template-rows: auto 50px 50px;
  grid-template-columns: 50px auto 50px;
}

.item {
  grid-row: 2 / 3;
  grid-column: 2 / 3;
}

</style>

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 2021</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <img src="../Kape Catalina/img/owner.jpg"
                        class="rounded mb-3"
                        height="30%"
                        width="50%"
                    >
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">Started as a dream, but took action to make it into reality.</h5>
                    <p>It is always a childhood dream for the owner to own a coffee shop even before it becomes a trend and that's how the Kape Catalina's Coffee House is born. Named after her mother, she turn her love and passion into something.</p>
                    <!-- <a href="" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Learn More</a> -->
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <div class="container-img">
                       

                            <img src="../Kape Catalina/img/store-pics.png"
                                class="rounded"
                                height="110%"
                                
                            >
                        
                    </div>
                    <!-- <h1 class="mb-3">Our Motto</h1>
                    <h4><p>"A bad day with coffee is better than a good day without it."</p></h4>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>creativity</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>friendship</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>affordability</h5> -->
                    <!-- <a href="" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Learn More</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <?php include('includes/footer.php');  ?>