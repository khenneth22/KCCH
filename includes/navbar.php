<!-- 10/08/2022 -->
<style>
    sup{
        content: "0";
        position: relative;
        top: -1.85rem;
        right: -0.75rem;
        width: 1.5em;
        height: 1.5em;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        background-color: red;
        color: white;
    }

   
</style>
<?php
// include('authenticate.php');
include('updates/functions/userfunctions.php');
?>

<div class="container-fluid p-1 nav-bar position-relative bg-dark parent-nav">
    <div id="myDiv" class="col-md-12" style="background-color: #fcf6bd;">
             <i id="closeButton" class="fa fa-times pt-3" style="float: right;"></i>
            <h6 id="location" class="p-3 text-center" style=" font-size: 16px;"></h6>
             <p id="message" class="p-3 text-center" style=" font-size: 16px;"></p>
            <!-- <p id="lng" class="p-3 text-center" style=" font-size: 16px;"></p> -->
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark py-0 ">
            <a href="index.php" class="navbar-brand px-sm-4 m-0 parent-nav-less-padding">
                <h1 class="m-auto display-6 text-uppercase text-white pt-3" style="letter-spacing: 2px;">KAPE CATALINA'S</h1>
                <p style="letter-spacing: 3px; font-size: 22px;">Coffee House</p>
            </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <!-- <a href="index.php" class="nav-item nav-link " style="letter-spacing: 3px;">Home</a> -->
                    <!-- <a href="gallery.php" class="nav-item nav-link" style="letter-spacing: 2px;">Gallery</a> -->
                    <a href="menu.php" class="nav-item nav-link" style="letter-spacing: 2px;">Menu</a>
                    <a href="about.php" class="nav-item nav-link" style="letter-spacing: 2px;">About</a>
                    <!-- <a href="contact.php" class="nav-item nav-link" style="letter-spacing: 2px;">Contact</a> -->
                    <a href="new-location.php" class="nav-item nav-link" style="letter-spacing: 2px;">Location</a>
                    
                    <!-- code for count cart items -->
                    <?php
                    if(isset($_SESSION['auth']))
                    {
                        $userId = $_SESSION['auth_user']['user_id'];
                        $counter = getCartCount($userId);
                        $cart_count = mysqli_num_rows($counter);
                    ?>
                    <a href="cart.php" class="nav-item nav-link fas fa-shopping-cart" title="Your Cart">
                    <sup class="text-white bg-danger rounded-circle p-1 " style="font-size: 15px;"><?php echo $cart_count; ?></sup></a>
                   <?php } else { ?>
                    <a href="cart.php" class="nav-item nav-link fas fa-shopping-cart" title="Your Cart">
                    <?php } ?>

                    <?php

                        if(isset($_SESSION['auth']))
                        {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                    <?= $_SESSION['auth_user']['first_name'];  ?>
                                </a>
                                <div class="dropdown-menu rounded text-left pl-3" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="my-orders.php" class="nav-item nav-link text-dark p-1"><i class=""></i> My orders</a><hr>
                                    <a href="my-account.php" class="nav-item nav-link text-dark p-1"><i class=""></i> My account</a><hr>
                                    <a href="logout.php" class="nav-item nav-link text-dark p-1"><span class=""></span> Logout</a>
                                </div>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="login.php" class="nav-item nav-link btn btn-primary rounded ml-3" title="Login">Login</a>
                            <?php

                        }

                    ?>
                    
                </div>
                
            </div>
            
        </nav>
    </div>

    <?php

// // Set the API key and city name
// $apiKey = "6f282659c2984f8997d9d74f838412fc";
// $city = "Parañaque";

// // Build the API request URL
// $url = "https://api.opencagedata.com/geocode/v1/json?" .
//   "key=" . urlencode($apiKey) .
//   "&q=" . urlencode($city) .
//   "&limit=1";

// // Send the request and get the response
// $response = file_get_contents($url);
// $response = json_decode($response, true);

// // Check the status of the response
// if ($response["status"]["code"] == 200) {
//   // The request was successful
//   $bounds = $response["results"][0]["bounds"];
//   $northEast = $bounds["northeast"];
//   $southWest = $bounds["southwest"];
//   $lat1 = $northEast["lat"];
//   $lon1 = $northEast["lng"];
//   $lat2 = $southWest["lat"];
//   $lon2 = $southWest["lng"];

//   // Calculate the total area using the Haversine formula
//   $R = 6371; // radius of Earth in kilometers
//   $dLat = deg2rad($lat2-$lat1);
//   $dLon = deg2rad($lon2-$lon1);
//   $lat1 = deg2rad($lat1);
//   $lat2 = deg2rad($lat2);

//   $a = sin($dLat/2) * sin($dLat/2) +
//     sin($dLon/2) * sin($dLon/2) * cos($lat1) * cos($lat2);
//   $c = 2 * atan2(sqrt($a), sqrt(1-$a));
//   $d = $R * $c;

//   $area = $d * $d * pi(); // total area in square kilometers

//   // Show the message
//   echo "We only deliver within " . round($area, 2) . " square kilometers of " . $city;
// } else {
//   // The request failed
//   echo "Error getting city area";
// }

?>
<script>
    // JavaScript to get the user's location and check if they are within the city
function checkLocation() {
  // Specify the default location (in this case, Sto. Tomas)
  var defaultLat = 14.1076;
  var defaultLng = 121.1314;

  // Specify the price per km
  var pricePerKm = 10;

  // Get the user's location
  navigator.geolocation.watchPosition(function(position) {
    var userLat = position.coords.latitude;
    var userLng = position.coords.longitude;

    // Calculate the distance between the user's location and the default location using the Haversine formula
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(defaultLat - userLat);
    var dLng = deg2rad(defaultLng - userLng);
    var a =
      Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(deg2rad(userLat)) * Math.cos(deg2rad(defaultLat)) *
      Math.sin(dLng / 2) * Math.sin(dLng / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var distance = R * c;

    // Compute th be price based on the distance
    var price = distance * pricePerKm;

    // Reverse geocode the location to get the postal code
    fetch("https://api.opencagedata.com/geocode/v1/json?q=" + userLat + "+" + userLng + "&key=6f282659c2984f8997d9d74f838412fc")
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Get the postal code from the response
        var postalCode = data.results[0].components.postcode;

        // Check if the postal code is the specified postal code
        // if (postalCode == "4234") {
          // The user is within the city
          document.getElementById("location").innerHTML = "We deliver within your location. Order Now!";
          document.getElementById("pricePerKm").innerHTML = price.toFixed();
          document.getElementById("pricePerKm1").value = price.toFixed();
          document.getElementById("place-order-button").disabled = false;
        // } else {
        //   // The user is outside of the city
        //   document.getElementById("location").innerHTML = "Sorry, we only deliver within Sto.Tomas.";
        //   document.getElementById("place-order-button").disabled = true;
        // }
    } ,function(error) {
        // There was an error getting the user's location
        document.getElementById("location").innerHTML = "Geolocation has been declined. You cannot checkout right now.";
        document.getElementById("place-order-button").disabled = true;
    });
  });
}

// Helper function to convert degrees to radians
function deg2rad(deg) {
  return deg * (Math.PI/180)
}

// Call the checkLocation function when the page loads
window.addEventListener("load", checkLocation);


function showDT(){
    document.getElementById("dateTime").style.display = "block";
}
function hideDT(){
    document.getElementById("dateTime").style.display = "none";
}

</script>

    
    <!-- Navbar End -->

<script>
        
     // Define the allowed coordinates
        //      var allowedCoordinates =[ 
        //             { lat: 15.515479, lng: 121.308409 },//gabaldon
        //             { lat: 15.515579, lng: 121.308409 },//gabaldon
        //             {lat: 15.4808, lng: 121.3064}, //bagong sikat
        //             {lat: 15.5554, lng: 121.2468}, //bagting
        //             {lat: 15.4492, lng: 121.3170}, //bantug
        //             {lat: 15.45512, lng: 121.33645}, //bitulok north poblacion
        //             {lat: 15.4724, lng: 121.4512}, //bugnan
        //             {lat: 15.5693, lng: 121.2970}, //calabasa
        //             {lat: 15.4596, lng: 121.3170}, //camachile
        //             {lat: 15.4436, lng: 121.3442}, //cuyapa
        //             {lat: 15.5112, lng: 121.3027}, //ligaya
        //             {lat: 15.5691, lng: 121.3227}, //macasandal
        //             {lat: 15.4832, lng: 121.3484}, //malinao
        //             {lat: 15.4698, lng: 121.3513}, //pantoc
        //             {lat: 15.4235, lng: 121.3599}, //south poblacion
        //             {lat: 15.4549, lng: 121.3384}, //south poblacion
        //             {lat: 15.4533, lng: 121.3570}, //sawmill
        //             {lat: 15.5058, lng: 121.3370}, //tagumpay
        //     ];

        // if ("geolocation" in navigator) {
        //   /* geolocation is available */
        //   navigator.geolocation.watchPosition(function(position) {
        //     var customerCoordinates = { lat: position.coords.latitude, lng: position.coords.longitude };
        //     // document.getElementById("lat").innerHTML = allowedCoordinates.lat;
        //     // document.getElementById("lng").innerHTML = allowedCoordinates.lng;

        //     // Check if the customer's coordinates are within the allowed coordinates
        //     var isAllowed = allowedCoordinates.some(function(coords) {
        //       return coords.lat === customerCoordinates.lat && coords.lng === customerCoordinates.lng;
        //     });

            
        //     // Compare the customer's coordinates to the allowed coordinates
        //     // customerCoordinates.lat === allowedCoordinates.lat && customerCoordinates.lng === allowedCoordinates.lng
        //     if (isAllowed) {
        //       // The coordinates match
        //       document.getElementById("location").innerHTML = "Your location matches the allowed coordinates.";
        //     } else {
        //       // The coordinates do not match
        //       document.getElementById("location").innerHTML = "Sorry, you are not eligible to order within your location.";
            
        //     }
        //   });
        // } else {
        //   /* geolocation IS NOT available */
        //   document.getElementById("location").innerHTML = "Geolocation is not supported by your browser.";
        // }

   
        var closeButton = document.getElementById("closeButton");
        var myDiv = document.getElementById("myDiv");

        // Add an event listener to the close button
        closeButton.addEventListener("click", function() {
        // Remove the div from the DOM
        myDiv.style.display = "none";

    });
  
    </script>