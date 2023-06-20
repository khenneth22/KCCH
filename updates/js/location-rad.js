
    if ("geolocation" in navigator) {
      /* geolocation is available */
      navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        document.getElementById("location").innerHTML = "Your location: " + latitude + ", " + longitude;
      });
    } else {
      /* geolocation IS NOT available */
      document.getElementById("location").innerHTML = "Geolocation is not supported by your browser.";
    }

