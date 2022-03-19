<?php
session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:login.php"); // redirects if user is not logged in
	}
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
<script src="https://kit.fontawesome.com/93babae55e.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload Photo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="upload.css">;
</head>
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
                    <li class="nav-item active">
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
    <br>
    <br>
    <div class="container" style="border: 1px solid black; padding: 10px;
    background: #4B4545; color: white;">
        <div class="row">
        <div class="col-sm">
                        <img src="index_wallpapers/uploadimg.jpg" class="img-fluid">    
        </div>
        <div class="col">                
        <h2 class="h2upload">UPLOAD PHOTOS</h2>
       <p class="uploadtext"> Upload your photos for other photographers to see! <br>Who knows, your work might get featured!   </p>
        <?php
      
            echo '<form action="includes/gallery-upload-include.php" method="POST" enctype="multipart/form-data">
            <div class="inputDiv">
            <input class="uploadTextbox" type="text" name="filename" placeholder="File name..." required>
            <input class="uploadTextbox"type="text" name="filetitle" placeholder="Image title..." required>
            <input class="uploadTextbox"type="text" name="filedesc" placeholder="Image description..." required>
            <input class="containerButton" type="file" name="file" accept="image/jpg, image/jpeg, image/png, image/svg, image/bmp, image/ai">
            </div>
            <br>
            <br>
            <h2 class="h2guide"> GUIDELINES </h2>
            <ul class="ulContainer">
                <li>Supports different image format JPG, JPEG, PNG, SVG, BMP, and AI</li>
                <li>The image must be no more than 70 MB</li>
                <li>Graphic violence, nudity and gore are strictly prohibited</li>
                <li>Do not upload offensive contents</li>
            </ul>
            <br>
            <button class="upButton" type="submit" name="submit">Upload</button>
            </form>
            </div>';
        
        ?>
        </div>
        
        
                </div>     
            </div>
            <br>
            <br>

    <script src="" async defer></script>

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