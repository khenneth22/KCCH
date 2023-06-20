
 <!-- <section>
        <div class="container mt-3 ">
            <div class="row">
                <div class="col-md-12 col-sm-8 col-md-6">
                    <div class="card border-0 mt-5 mb-5 offer overlay-bottom overlay-top">
                        <div class="card-body text-center mt-5 mb-5">
                            <h1 class="display-3 text-primary mt-3">50% OFF</h1>
                            <h1 class="text-white mb-3">Sunday Special Offer</h1>
                            <h4 class="text-white font-weight-normal mb-4 pb-3">Only for Sunday from 1st Jan to 30th 2023</h4>
                        </div>
                    </div>
                </div>
            </div>
      </div>
 </section> -->



<!-- Offer Start -->

<?php
                        include('config/dbcon.php');

                        $sql = "SELECT * FROM offers ORDER BY id DESC LIMIT 1 ";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){ ?>
                               
    <div class="offer my-5 py-5 text-center position-relative overlay-bottom overlay-top" style="background: linear-gradient(rgba(51,33,29,0.9), rgba(51,33,29,0.9)),url(img/<?php echo $row['img_name']; ?>) top no-repeat; background-size: cover;">
        <div class="container py-3">
            <h1 class="display-3 text-primary mt-3"><?php echo $row['top_text']; ?></h1>
            <h1 class="text-white mb-3"><?php echo $row['mid_text']; ?></h1>
            <h4 class="text-white font-weight-normal mb-4 pb-3"><?php echo $row['bot_text']; ?></h4>

            <a href="allProducts.php"><button class="btn btn-lg bg-primary text-white rounded" style="letter-spacing: 3px;">Order Now!</button></a>
            
                <!-- <form class="form-inline justify-content-center mb-4">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Your Email" style="height: 60px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-weight-bold px-4" type="submit">Sign Up</button>
                    </div>
                </div>
            </form> -->
        
        </div>
    </div>

    <?php }
                                mysqli_free_result($result);
                            } else{
                               // echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }
                        
                        // Close connection
                        mysqli_close($con);
                        ?> 
    <!-- Offer End -->