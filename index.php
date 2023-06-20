    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "152018028757672");
chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
window.fbAsyncInit = function() {
    FB.init({
    xfbml            : true,
    version          : 'v15.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- end messenger -->

<?php 
session_start();
include('includes/header.php') ;
?>



<!-- Carousel Start -->


    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner fv-carousel owl-carousel owl-theme">
                
                  <?php
                        include('config/dbcon.php');

                        $sql = "SELECT * FROM banners";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){ ?>
                                <div class="carousel-item">
                                    <img class="w-100 carousel-img" src="uploads/<?php echo $row['img_name']; ?>" alt="Image" >
                                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                        <h2 class="text-white font-weight-medium m-0"><?php echo $row['top_text']; ?></h2>
                                        <h1 class="display-1 text-primary m-0"><?php echo $row['mid_text']; ?></h1>
                                        <h2 class="text-white m-0"><?php echo $row['bot_text']; ?></h2>
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
    <!-- Carousel End -->

    <script>
        window.onload = function() {
        var el = document.querySelector('.animated-element');
        el.style.animation = 'bounce-in 1s ease-in-out both';
    }

    </script>


    <?php include('new-services.php'); ?> 
    <?php include('category.php'); ?> 
    <?php include('featured.php'); ?> 
    <?php include('testimonial.php'); ?>  
    <?php include('gallery.php'); ?>  
    <?php include('includes/footer.php'); ?>