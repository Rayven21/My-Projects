<!DOCTYPE html>

<html lang="en">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery - The Block</title>
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
    <link href="gallery.css" rel="stylesheet">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="gallery.php">Home</a>
                    </li>
                    <li class="nav-item">
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
    <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
            <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
            <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="First slide" class="d-block w-100" src="imgs/slide1.jpeg">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="animated bounceInRight" style="animation-delay: 1s">The Block</h5>
                    <p class="animated bounceInLeft" style="animation-delay: 2s">A website dedicated for people who want to share their own photographs as a unique art.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="Second slide" class="d-block w-100" src="https://i.postimg.cc/SQXZtrTZ/2.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="animated slideInDown" style="animation-delay: 1s">Art is not what you see but what you make others see</h5>
                    <p class="animated fadeInUp" style="animation-delay: 2s">- Edgar Degas</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="Third slide" class="d-block w-100" src="imgs/slide3.jpeg">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="animated zoomIn" style="animation-delay: 1s">Feel free to upload your favorite photograph!</h5>
                    <p class="animated fadeInLeft" style="animation-delay: 2s">Other people would also love to see your work! Just upload it and you're good to go</p>
                </div>
            </div>
        </div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
    </div>

    <!--BANNER -->

    <div class="col-lg-12" style="text-align: center; margin-top: auto; margin-bottom: auto; padding: 100px; background: white;">
        <div class="row">
            <div class="col-lg-6">
                <img src="index_wallpapers/girlskull.jpg" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <h1 class="banner1"> The Block. </h1>
                <p style="font-size: 18px; margin: 20px;">
                    Upload your photos for others to see. Extend your network by being a featured photographer.
                    Share your artwork for free. Showcase your work.
                </p>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="col-lg-12" style="text-align: center; margin-top: auto; margin-bottom: auto; padding: 0px; background: white;">
        <div class="row">
            <div class="col-lg-6">

                <h1 class="banner2"> Featured Content </h1>
                <p style="font-size: 18px; margin: auto;">
                    Featured photographs selected by the developers. Photographs uploaded by featured users are displayed
                    in a dedicated page for other users to view. <br>

                </p>
            </div>
            <div class="col-lg-6">
                <img src="index_wallpapers/secondimg.jpg" class="img-fluid">
            </div>
        </div>
    </div>
    <h1 style="margin: 50px;"> Recently Uploaded </h1>
    <section class="gallery-links">
        <div class="wrapper">
            <div class="gallery-container">
                <?php
                include_once 'includes/db-connection-include.php';

                $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo 'SQL statement failed!';
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="uploads/' . $row["imageFullNameGallery"] . '" data-lightbox = "GalleryPhoto">
                        <div class="single-img" style="background-image: url(uploads/' . $row["imageFullNameGallery"] . ');"></div>
                        <!-- <img class ="responsive" data-lightbox="image-1" src="uploads/' . $row["imageFullNameGallery"] . '"> -->
                        <center><h3>' . $row["titleGallery"] . '</h3>
                        <p>' . $row["descriptionGallery"] . '</p></center>
                        </a>';
                    }
                }
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