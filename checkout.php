<?php 
session_start();
include('functions/userfunctions.php');
include('authenticate.php');
include('includes/header.php'); 

if(isset ($_SESSION['auth_user']['user_id']))
{
    $user_id = $_SESSION['auth_user']['user_id'];
    $res=mysqli_query($con,"select * from users where id=$user_id");
                  $sn=1;
                while($row=mysqli_fetch_array($res))
                {
                    $first_name=$row['first_name'];
                    $last_name=$row['last_name'];
                    //$address=$row['address'];
                    $email=$row['email'];
                    
                }
}
if(isset ($_SESSION['auth_user']['user_id']))
{

    $res1=mysqli_query($con,"select * from saved_address where id=$user_id");
              $sn=1;
            while($row=mysqli_fetch_array($res1))
            {
                $phone_no=$row['phone_no'];
                $house_no=$row['house_no'];
                $street=$row['street'];
                $barangay=$row['barangay'];
                $city=$row['city'];
                $province=$row['province'];
                $zip=$row['zip'];
              
                
            }
}
?>




    <div class="py-1 m-5 ">
        <div class="container mt-0">
            <div class="card card-body border-0 rounded">
                <form action="functions/placeorder.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-7 p-3">
                            <h5><i class="fa fa-info-circle" style="font-size: 20px;"></i> Billing Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="e.g. Juan" value="<?php echo $first_name ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="e.g. Dela Cruz" value="<?php echo $last_name ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="e.g. jdc@gmail.com" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <!-- Update ngayon -->
                                    <label class="fw-bold">Complete Home Address</label>
                                  
                                    <textarea type="text" id="address" name="address" class="form-control" rows="5" 
                                    placeholder="House no. / Bldg no. / Street / Barangay / City / Province"><?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['house_no']; echo ", "; echo $citem['street']; echo ", "; echo $citem['barangay']; echo ", "; echo $citem['city']; echo ", "; echo $citem['province'];
                                    }?></textarea>
                                   
                                    <!-- <input type="checkbox" name="save_address" id="" value="save">
                                    <label for="save_address">Save Address</label> -->
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Contact No.</label>
                                    <input type="text" minlength="11" maxlength="11" name="contact" class="form-control" value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['phone_no'];
                                    }?>" placeholder="09xxxxxxxxxx">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Zip Code</label>
                                    <input type="text" id="zip" minlength="4" maxlength="4" name="zip" class="form-control" value="<?php
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $items = getSavedAddress($user_id);
                                    foreach($items as $citem){
                                        echo $citem['zip'];
                                    }?>" placeholder="e.g. 0000">
                                </div>
                                <!-- <a href="#"><i class="fa fa-angle-left p-5 mt-5"> </i>Back to Homepage</a> -->
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5><i class="fas fa-receipt"></i> Order Summary</h5>
                            
                                <?php
                                    $items = getCartItems();
                                    $deliveryFee = 0; 
                                    $totalPrice = 0;
                                    $total = 0;

                                    foreach($items as $citem){
                                        ?>
                                        <div class="mb-1 text-center"><hr>
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image"  width="65px">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><?= $citem['name'] ?></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label> &#8369 <?= $citem['selling_price'] ?></label>
                                                </div>
                                                                                  
                                                <div class="col-md-2">
                                                    <label>x <?= $citem['prod_qty'] ?></label>
                                                </div>                                   
                                                <div class="col-md-3">
                                                <label>&#8369 <?php echo $total =  $citem['selling_price'] * $citem['prod_qty']  ?></label>
                                                </div>                                   
                                            </div>
                                        </div>
                                        <?php
                                         
                                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];                         
                                    }
                                ?>
                                    <!--                                      
                                     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                        <script>
                                            $(document).ready(function(){
                                                $(".payment_mode").click(function(){
                                                    // var myname = $("input[name=myname]").val();
                                                    // var city = $("input[name=city]").val();
                                                    var payment_mode = $("input[name='payment_mode']:checked").val();

                                                    $.ajax({
                                                        url: "updates/js/ajax_sample.php",
                                                        type: "POST",
                                                        data: {payment_mode:payment_mode},
                                                        success:function(data){
                                                           var totaldata = parseInt(data) + 1;
                                                            
                                                        }
                                                    })
                                                })
                                            })
                                        </script> -->
                                <hr>

                                <!--subtotal for delivery -->
                                <h2 id="result" class="result"></h2>
                               
                                            <!-- <h6 id="fee">delFee here</h6> -->
                                <!-- compute the totalprice with subtotal -->
                                <h4 class="mt-3">Total Price : <span class="float-right">&#8369  <span id="totalPrice"><?= $totalPrice ?></span><span id="totalPriceV2"><?= $totalPrice ?></span></span></h4>
                                <label class="mt-4">Let us know if you are allergic to something.</label>
                                <div class="col-md-12 mb-5" >
                                    <textarea style="position: absolute;" name="comments" id="comments" maxlength="80" class="form-control" cols="40" rows="3" placeholder="Type here..."></textarea>
                                    <label id="counter" 
                                    style="position:relative;
                                            font-size: 13px;
                                            float: right;
                                            right: -17px;
                                            color: #c7ccd1;
                                            ">80</label>
                                    </div>
                                    <div class="row mt-5 mb-3"><!-- placeorder.php -->
                                    <div class="col-md-12 mt-5">
                                        <label><input id="pick_up" type="radio" name="payment_mode" class="payment_mode" value="Pick_Up" onclick="showDT();" required>
                                        Store Pick-up - Free</label>
                                        
                                        <div class="mb-2" id="dateTime" style="display: none;">
                                            <label style="font-size: 14px;">Pick Date</label>
                                            <input type="date" class="form-control mb-1 rounded" name="order_date">
                                            <label style="font-size: 14px;">Pick Time</label>
                                            <input type="time" class="form-control mb-1 rounded" name="order_time">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">   
                                        <label>  <input type="radio" id="cod" name="payment_mode" class="payment_mode cod_payment" value="COD" class="cod_rad_btn" onclick="hideDT();" required>
                                        Delivery - &#8369 <span name="pricePerKm" id="pricePerKm"></span>
                                    </label>
                                    <input type="hidden" name="pricePerKm1" value="" id="pricePerKm1">
                                     <!-- <span id="pricePerKm" style="float:right;"></span> -->
                                        </div>
                                        <span id="delFee" class="ml-4" style="font-size: 13px;"><strong></strong> </span>
                                       
                                            <!--when click add 50pesos to subtotal -->      
<!--                                         
                                        <div class="col-md-12 text-center mt-2">
                                            <hr>
                                            <label style="font-size: 15px; background-color: white; padding: 0 8px; transform: translate(0, -135%);">and you can also</label>
                                        </div> -->
                                        
                                        <!-- <div class="col-md-12">
                                            <span class="mx-2" style="font-size: 15px; "><strong>(Optional)</strong> </span>
                                        </div> -->
                                        <!-- Button to Open the Modal -->
                                        <!-- <button type="button" id="target" class="btn btn-info ml-3 mr-3 w-100 rounded" data-toggle="modal" data-target="#myModal">
                                        <img src="img/gcash-icon.png" alt="" height="35px" width="35px">
                                            Pay via GCASH
                                        </button> -->
    
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded">
                                        
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                Pay via GCASH</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p><strong> Scan the QR code using your Gcash app to pay.</strong></p>
                                                <p><strong>Note:</strong> Save the receipt for the proof of payment, and upload it here before to click <strong>confirm order</strong> .</p>
                                                <!-- to upload receipt -->
                                                <input type="file"  name="image" class="mb-2 btn ">
                                                <img src="img/GCash-MyQR.PNG.jpg" alt="" width="100%">
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <hr> -->
                                <!-- placeorder.php -->
                                <button type="submit" id="place-order-button" name="placeOrderBtn" class=" btn btn-success rounded w-100" style="font-size: 22px;"><i class="fa fa-check" aria-hidden="true"></i> Confirm Order</button>
                                
                        </div>   
                    </div>
            </form>
            </div>
            
        </div>
    </div>



    
    <?php include('includes/footer.php'); ?>

    
<script>
    
//       // JavaScript to get the user's location and check if they are within the city
// function checkLocation() {
//   // Get the user's location
//   navigator.geolocation.watchPosition(function(position) {
//     var lat = position.coords.latitude;
//     var lng = position.coords.longitude;

//     // Reverse geocode the location to get the city
//     var url = "https://api.opencagedata.com/geocode/v1/json?q=" + lat + "+" + lng + "&key=6f282659c2984f8997d9d74f838412fc";
//     fetch(url)
//     .then(function(response) {
//       return response.json();
//     })
//     .then(function(data) {
//       // Get the user's address from the API response
//       var address = data.results[0].formatted;

//       // Update the input field with the user's address
//       document.getElementById("address").value = address;
//     })
//     .catch(function(error) {
//       // There was an error with the API request
//       console.error("Error getting address:", error);
//     });
// }, function(error) {
//   // There was an error getting the user's location
//   console.error("Error getting location:", error);
// });

  
// }
</script>

<script>
                                            $(document).ready(function(){
                                                $(".payment_mode").click(function(){
                                                    // var myname = $("input[name=myname]").val();
                                                    // var city = $("input[name=city]").val();
                                                    var payment_mode = $("input[name='payment_mode']:checked").val();

                                                    $.ajax({
                                                        url: "updates/js/ajax_sample.php",
                                                        type: "POST",
                                                        data: {payment_mode:payment_mode},
                                                        success:function(data){
                                                           var totaldata = parseInt(data) + 1;
                                                            
                                                        }
                                                    })
                                                })
                                            });

                                           
        
//         // Define the allowed coordinates
//         var allowedCoordinates = 
//             {lat: 15.515479, lng: 121.308409} //gabaldon
//            ;
//         var radius = 5; // 5 miles

//           // Function to calculate the distance between two coordinates using the Haversine formula
//             function haversineDistance(coords1, coords2, radius) {
//             var lat1 = coords1.lat;
//             var lng1 = coords1.lng;
//             var lat2 = coords2.lat;
//             var lng2 = coords2.lng;

//             // Convert degrees to radians
//             lat1 = lat1 * Math.PI / 180;
//             lng1 = lng1 * Math.PI / 180;
//             lat2 = lat2 * Math.PI / 180;
//             lng2 = lng2 * Math.PI / 180;

//             // Calculate the distance using the Haversine formula
//             var a = Math.sin((lat2 - lat1) / 2)**2 + Math.cos(lat1) * Math.cos(lat2) * Math.sin((lng2 - lng1) / 2)**2;
//             var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
//             var distance = radius * c;

//             return distance;
//             }
   
//    if ("geolocation" in navigator) {
//      /* geolocation is available */
//      navigator.geolocation.watchPosition(function(position) {
//        var customerCoordinates = { lat: position.coords.latitude, lng: position.coords.longitude };
   
//        // Compare the customer's coordinates to the allowed coordinates
//        if (customerCoordinates.lat === allowedCoordinates.lat && customerCoordinates.lng === allowedCoordinates.lng) {
//          // The coordinates match
//          document.getElementById("location").innerHTML = "Your location matches the allowed coordinates.";
//        } else {
//          // The coordinates do not match
//          document.getElementById("location").innerHTML = "Sorry, you are not eligible to order within your location.";
//          document.getElementById("place-order-button").disabled = true;
//        }

//         // Calculate the distance between the customer's coordinates and the allowed coordinates
//         var distance = haversineDistance(customerCoordinates, allowedCoordinates, 6371); // 6371 is the radius of the Earth in kilometers

//         // Check the distance and set the delivery fee accordingly
//         if (distance <= radius) {
//         // The distance is within the allowed radius
//         var deliveryFee = 0;
//         } else {
//         // The distance is outside the allowed radius
//         var deliveryFee = 20;
//         var deliveryFee = Math.ceil(distance - radius) * 20; // Add 20pesos for every mile outside the allowed radius
//         }

//         // Display the delivery fee
//         document.getElementById("delFee").innerHTML = ("Additional delivery fee if outside the radius: " + deliveryFee);
//      },
//      function(error) {
//       if (error.code === error.PERMISSION_DENIED) {
//         // Show an error message if the user declines to share their location
//         document.getElementById("location").innerHTML = ("Geolocation has been declined.");
//         document.getElementById("place-order-button").disabled = true;
//       }
//     }
//      );
     
//    } else {
//      /* geolocation IS NOT available */
//      document.getElementById("location").innerHTML = "Geolocation is not supported by your browser.";
//      document.getElementById("place-order-button").disabled = true;
//    }

                                        </script> 




<!-- {lat: 15.4808, lng: 121.3064}, //bagong sikat
            {lat: 15.5554, lng: 121.2468}, //bagting
            {lat: 15.4492, lng: 121.3170}, //bantug
            {lat: 15.45512, lng: 121.33645}, //bitulok north poblacion
            {lat: 15.4724, lng: 121.4512}, //bugnan
            {lat: 15.5693, lng: 121.2970}, //calabasa
            {lat: 15.4596, lng: 121.3170}, //camachile
            {lat: 15.4436, lng: 121.3442}, //cuyapa
            {lat: 15.5112, lng: 121.3027}, //ligaya
            {lat: 15.5691, lng: 121.3227}, //macasandal
            {lat: 15.4832, lng: 121.3484}, //malinao
            {lat: 15.4698, lng: 121.3513}, //pantoc
            {lat: 15.4235, lng: 121.3599}, //south poblacion
            {lat: 15.4549, lng: 121.3384}, //south poblacion
            {lat: 15.4533, lng: 121.3570}, //sawmill
            {lat: 15.5058, lng: 121.3370}, //tagumpay -->