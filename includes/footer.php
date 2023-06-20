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

<!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script> -->
<!-- <div class="elfsight-app-52b97f3b-c1bc-4dcc-ac53-c5537a6a2957"></div> -->
   <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>South Poblacion Gabaldon, Nueva Ecija | PH</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+63 995-283-7838</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>nikolalcantara2325@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>You can also visit and message us in our social media accounts</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.facebook.com/messages/t/109191991539494"><i class="fab fa-facebook-messenger"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.facebook.com/KapeCatalina/"><i class="fab fa-facebook-f"></i></a>
                    <!-- <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href=""><i class="fab fa-instagram"></i></a> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Quick Links</h4>
                <div class="col-sm">
                    <a href="" class="text-white">Home</i></a><br>
                    <a href="about.php" class="text-white">About </a><br>
                    <a href="location.php" class="text-white">Location</a><br>
                    <!-- <a href="contact.php" class="text-white">Contact</a><br> -->
                    <!-- <a href="contact.php" class="text-white">FAQ</a><br> -->
                    <a href="my-orders.php" class="text-white">My Order</a><br>
                    <a href="my-account.php" class="text-white">My Account</a><br>
                    </div>
                
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p class="pl-3">8:00 AM - 8:00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p class="pl-3">2:00 PM - 8:00 PM</p>
                </div>
            </div>
            <!--
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>-->
            <div>
           
    </div>
    </div>
        
        <div class="container-fluid text-center text-white py-2 bg-dark">
            <p class="mt-3 text-white"><script>
                document.write(new Date().getFullYear())
              </script> &copy; Kape Catalina's Coffee House</p>
            <!--<p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a></p>-->
        </div>
    </div>
    <!-- Footer End -->



    
    <!-- Back to Top -->
    
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top rounded-circle"><i class="fa fa-angle-double-up"></i></a>
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top rounded-circle"><i class="fab fa-facebook-messenger"></i></a> -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Swiper JS -->
    <script src="js/swiper-bundle.min.js"></script>

    <!-- location-radius -->
    <script src="../updates/js/location-rad.js"></script>

    <!-- to limit input character -->
    <script>
        const input = document.getElementById("comments"),
        counter = document.getElementById("counter"),
        maxlength = input.getAttribute("maxlength");

        input.onkeyup = ()=>{
            counter.innerText = maxlength - input.value.length;
        }

       
    </script>

    <!-- 10/08/2022 Owl.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="assets/js/custom.js"></script>

    <!-- 10/08/2022 update -->
    <script src="updates/js/update.js"></script>

    
      <!-- Alertify JavaScript -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
 
      <!-- Notifier -->
    <script>

        alertify.set('notifier','position', 'top-center');
        <?php 
        
        if(isset($_SESSION['message'])) 
            { ?>
                alertify.success('<?= $_SESSION['message']; ?>');
            <?php 
                unset($_SESSION['message']);
            } 
        ?>
    </script>
    

    <script >
        var show = document.getElementById("show");
        var cshow = document.getElementById("cshow");

        function myFunction() {
            if (show.type=='password') {
                show.type='text';
                
            } else {
                show.type='password';
               
            }
        };
       
        function pw2Function() {
            if (cshow.type=='password') {
                cshow.type='text';
                
            } else {
                cshow.type='password';
               
            }
        };
        

        $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });

    </script>

    
    
</body>

</html>