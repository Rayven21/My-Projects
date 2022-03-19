<!DOCTYPE html>

<html lang="en">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Featured - The Block</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  lightbox -->
    <link href="lightbox/dist/css/lightbox.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="featured.css" rel="stylesheet">
</head>
<?php
session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:login.php"); // redirects if user is not logged in
	}
?>
<div class="animate__animated animate__fadeIn">
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">The Block</a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="featured.php">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AboutUs.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ContactUs.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php">Upload</a>
                    </li>
					<li class="nav-item" style="list-style-type:none">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
                </ul>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <section class="featured">

        <div class="flex-container">

            <div class="column flex-information">
                <center>
                <h2>Featured photo of the day!</h2>
                <br>
                <h5>Get featured by uploading your dearest photos in hand.</h5>
                </center>
            </div>
            
            <div class="column flex-featured">
            <?php
            $timeA = time();    
            $imgDir = 'uploads/';
            
            
            $images = glob($imgDir . '*.{jpg,jpeg,png,gif,ai,svg}', GLOB_BRACE);
            
            $randomImage = $images[array_rand($images)]; // See comments
            echo '
            <a href="'.$randomImage."\"".' data-lightbox="featured">
            <img class ="single-img" src ="'.$randomImage."\"".'/>
            </a>'
            ?>
            </div>
            
        </div>

    </section>
    <script src="" async defer></script>
    <!-- Minified JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Slim jquery-->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/93babae55e.js" crossorigin="anonymous"></script>
    <!-- Lightbox -->
    <script src="lightbox/dist/js/lightbox.js"></script>
    <!-- footer -->


	<footer>
        <div class="footer-content">
            <h3> The Block </h3>
            <p> Join the community of rising photographers. </p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li></i>

        </div>
        <p style="text-align: center;"> Copyright 2021. The Block. Designed by Team Syria. </p>
        <p style="text-align: center;"> Contact us through: <a href="#" class="emailcu">theblock@gmail.com</a> </p>
    </footer>
    <!-- footer -->
</body>
</div>

</html>