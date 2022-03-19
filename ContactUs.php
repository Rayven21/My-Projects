<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us - The Block</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="images/contact.jpg" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<!-- CSS only -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<style>

a {
      text-decoration: none;
    }
.navbar-nav a {
	font-family: poppins;
	font-size: 18px;
	text-transform: uppercase;
	font-weight: bold;
}

.navbar-brand {
	font-family: poppins;
}

.navbar-light .navbar-brand {
	color: rgb(255, 255, 255);
	font-size: 25px;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 2px;
	
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
	color: rgb(255, 255, 255);
}
.navbar-light .navbar-nav .nav-link {
	color: rgb(255, 255, 255);
}
.navbar-nav {
	text-align: center;
}
.nav-link {
	padding: .2rem 1rem;
}
.nav-link.active, .nav-link:focus {
	color: #fff;
}
.navbar-toggler {
	padding: 1px 5px;
	font-size: 18px;
	line-height: 0.3;
	background: #fff;
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
	color: #fff;
}
.w-100 {
	height: 100vh;
}

.navbar-expand-lg.navbar-light.fixed-top {
    background: rgba(0, 0, 0, 0.9);
}

@media only screen and (max-width: 767px) {
	.navbar-nav.ml-auto {
		background: rgba(0, 0, 0, 0.5);
	}
	.navbar-nav a {
		font-size: 14px;
		font-weight: normal;
	}
}
footer {

    background: #302D2D;
    height: auto;
    width: auto;
    padding: 30px;
    color: white;
    bottom: 0;
    left: 0;
    right: 0;
    padding-top: 40px;

}

.footer-content {

    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;

}

.footer-content h3 {

    font-size: 1.8rem;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 3rem;

}

.footer-content p {

    max-width: 500px;
    margin: 10px auto;
    line-height: 28px;
    font-size: 16px;

}

.socials {

    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;

}

.socials li {

    margin: 0 10px

}

.socials a {

    text-decoration: none;
    color: white;

}

.socials a i {

    font-size: 1.1rem;
    transition: color .4s ease;

}

.socials a:hover i {

    color: aqua;

}

.emailcu {

    transition: color .4s ease;

}

.emailcu:hover {


    color: aqua;
}

/* end of footer*/
</style>
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
			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
				class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
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
					<li class="nav-item active">
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
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Contact Us
				</span>
				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">FULL NAME *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100"
					data-validate="Enter your email address">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Phone</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
				</div>



				<div class="wrap-input100 validate-input bg0 rs1-alert-validate"
					data-validate="Please enter your message">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>

				<div class="container-contact100-form-btn">

					<button class="contact100-form-btn" onclick="myFunction()">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>

						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="js/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		function myFunction() {
			alert("your e-mail has been sent succesfully");
		}
	</script>

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