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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Kape Catalina's Coffee House</title> -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php if(isset($page_title)) {echo "$page_title";} else {echo "Kape Catalina's Coffee House";}?></title>
    <meta name="description" content="<?php if(isset($meta_description)) {echo "$meta_description";}?>">
    <meta name="keywords" content="<?php if(isset($meta_keywords)) {echo "$meta_keywords";}?>">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/kape-catalina-logo.png">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Swiper CSS -->
    <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css" />   -->

      <!-- Alertify JS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <!-- 10/08/2022 Owl.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">
    <!-- 10/08/2022 update -->
    <link rel="stylesheet" href="updates/css/style.css">

    <style>
      .field-icon {
  float: right;
  margin-right: 10px;
  margin-top: -50px;
  position: relative;
  z-index: 2;
}
.cut-text {
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                       
                -webkit-box-orient: vertical;
                }
                .cat-text {
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 1;
                       
                -webkit-box-orient: vertical;
                }

  /* Style all input fields */

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  /* background: #f1f1f1; */
  color: #000;
  position: relative;
  padding: 3px;
  margin-top: 1px;
}

#message p {
  padding: 0px 35px;
  font-size: 13px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}



    </style>
</head>

<body>
    <!-- <?php include('navbar.php'); ?> -->
