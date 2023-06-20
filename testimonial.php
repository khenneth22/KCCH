<style>
    .checked{
        color: orange;
    }
</style>
  <!-- Testimonial Start -->
  <div class="container-fluid py-5 ">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
                <h1 class="display-6">Our Customers Says</h1>
            </div>
            <div class="owl-carousel owl-theme testimonial-carousel">
                
            <?php
                        include('config/dbcon.php');

                        $sql = "SELECT * FROM testimonies";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){ ?>
                                
                                <div class=" p-3 border rounded bg-white">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center mb-3">
                                            <img class="img-fluid rounded-circle" src="updates/images/user.png" alt="" height="25px" width="25px">
                                            <div class="ml-3 mt-3">
                                                <h4><?php echo $row['name']; ?></h4>
                                                <p><?php echo $row['created_at'] ?></p>
                                                <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                        <span class="ml-4"><i class="fa fa-solid fa-quote-left pb-2 text-primary" style="font-size: 25px;"></i> <p class="ml-5  cut-text "><?php echo $row['testimonies']; ?></p></span>
                                       
                                        <!-- <span style="float: right;"><i class="fa fa-solid fa-quote-right" style="font-size: 15px;"> </i></span> -->
                                    </div>
                                    </div>
                      
                        <?php }
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }
                        
                        // Close connection
                        mysqli_close($con);
                        ?>
                
            </div>
    </div>
   
        </div>
    
    <!-- Testimonial End -->
