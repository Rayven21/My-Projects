<!DOCTYPE html>
<html>
<head>
<title>Profile - The Block</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload Photo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- CSS only -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="profile.css">
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
<div class="main-body">
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
<br>
<br>
<br>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = $_SESSION['user'];
$dbname = "theblock";
$con = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error()); //Connect to server
$sql = "SELECT * FROM users WHERE username='$name'";
$query = mysqli_query($con, $sql); // SQL Query
$count = mysqli_num_rows($query);
$profile = mysqli_fetch_assoc($query);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
			
			//oneerror="this.src" is used to have a default image if the user currently do not have one
			echo '<img class="cover-img" src="cover/'.$profile['coverImage'].'"alt="Cover" width="1200" height="500" onerror="this.src=\'cover/cover.jpg\'";">';
			echo "<form action=\"coverUpload.php\" method=\"POST\" enctype=\"multipart/form-data\">";//proceed to profileUpload if the button is clicked
			echo "<label class=\"label1\" for=\"fileCover\">Choose a picture 
					<input id = \"fileCover\" type=\"file\" name=\"fileCover\" accept=\"image/jpg, image/jpeg, image/png, image/svg, image/bmp, image/ai\">
				  </label>
				<button class=\"custom-file-upload1\" type =\"submitCover\" name=\"submitCover\">Update cover</button>
				</form>";//Accepts only images with specified file extensions
		
			//oneerror="this.src" is used to have a default image if the user currently do not have one
            echo "<div class=\"profile\">";
			echo '<img class="profile-img" src="profile/'.$profile['profileImage'].'" alt="Profile" width="250" height="250" onerror="this.src=\'profile/default.png\'";">';//getting the profile picture from database
			echo "<form action=\"profileUpload.php\" method=\"POST\" enctype=\"multipart/form-data\">";//proceed to profileUpload if the button is clicked
			echo "<label class=\"label2\" for=\"file\" class=\"custom-file-upload\">Choose a picture
					<input id = \"file\" type=\"file\" name=\"file\" accept=\"image/jpg, image/jpeg, image/png, image/svg, image/bmp, image/ai\">
				  </label>
				<br>
				<button class=\"custom-file-upload\" type =\"submit\" name=\"submit\">Update profile</button>
				</form>";//Accepts only images with specified file extensions
			echo "<div>";
            echo "
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
            </div>
		</div>";
			echo "<div class=\"text1\">";
            echo '<h4><b>'. $profile['firstname']. " ". $profile['lastname']. "</b></h4>";//getting the firstname and lastname of the current user from database
			echo "</div>";
			echo "<div class=\"personInfo\">";
			echo "<b>PERSONAL INFORMATION</b>";
			echo "</div>";
		echo "<div class=\"info\">
			 <hr>";
			 echo '<h6 class="text2"><b>Full Name</b>:&nbsp&nbsp' . $profile['firstname']. " ". $profile['lastname']. "</h6>";//getting the firstname and lastname of the current user from database
			 echo "<hr>";
			 echo '<h6 class="text2"><b>Gender</b>:&nbsp&nbsp' . $profile['gender']. "</h6>";//getting the gender of the current user from database
			 echo"<hr>";
			 echo '<h6 class="text2"><b>Contact Number</b>:&nbsp&nbsp' . $profile['contactNumber']. "</h6>";//getting the contact number of the current user from database
			 echo "<hr>";
			 echo '<h6 class="text2"><b>Email Address</b>:&nbsp&nbsp' . $profile['email']. "</h6>";//getting the email address of the current user from database
			 echo "<hr>
		</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

?>
</div>
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