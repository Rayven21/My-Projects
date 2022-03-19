<!DOCTYPE html>
<html>
<head>
<title>ADMIN</title>
<link rel="stylesheet" href="admin.css">
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
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="upload.css">;
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
      <a class="navbar-brand" href="#">The Block</a>
      <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item" style="list-style-type:none">
                  <a class="nav-link" href="logout.php">Logout</a>
              </li>
          </ul>
      </div>
  </div>
</nav>
<center>
<br>
<br>

	<table id = "users">
  <tr>
    <th colspan="9" style="font-family: poppins;"><h1>USER MANAGEMENT</h1></th>
  </tr>

	<tr>
		<th style="font-family: poppins;">Id</th>
    <th style="font-family: poppins;">Profile Image</th>
		<th style="font-family: poppins;">Name</th>
    <th style="font-family: poppins;">Username</th>
    <th style="font-family: poppins;">Email</th>
    <th style="font-family: poppins;">Contact Number</th>
    <th style="font-family: poppins;">Date Created</th>
    <th style="font-family: poppins;">Time Created</th>
    <th style="font-family: poppins;">Delete</th>
	</tr>
</center>
<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
$user = $_SESSION['user']; //assigns user value
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theblock";


$con = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error()); //Connect to server
$sql = "SELECT id, profileImage, firstname, lastname, username, email, contactNumber, date_created, time_created FROM users";
$query = mysqli_query($con, $sql); // SQL Query
$count = mysqli_num_rows($query);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if($count > 0)
{
  	echo '<br>';
    while($row = mysqli_fetch_assoc($query))
    {
      echo "<tr>";
      echo '<td align="center">'. $row['id'] . "</td>";
      echo '<td align="center">'.'<img src="profile/'.$row['profileImage'].'" alt="Profile" width="80" height="80" onerror="this.src=\'profile/default.png\';">'. "</td>";
      echo '<td align="center" style="font-family: poppins;"><b>'. $row['firstname'] . " " . $row['lastname'] . "</b></td>";
      echo '<td align="center" style="font-family: poppins;"><i>'. $row['username']. "</i></td>";
      echo '<td align="center" style="font-family: poppins;">'. $row['email']. "</td>";
      echo '<td align="center" style="font-family: poppins;">'. $row['contactNumber']. "</td>";
      echo '<td align="center" style="font-family: poppins;">'. $row['date_created']. "</td>";
      echo '<td align="center" style="font-family: poppins;">'. $row['time_created']. "</td>";
      echo '<td align="center" style="font-family: poppins;"><a href="#" class="button button1 w3-white w3-border" onclick="myFunction('.$row['id'].')">DELETE</a> </td>';
      echo "</tr>";
    }   
    echo "</table>";
} 

else {
  echo "0 results";
}
$con->close();
?>
<script src="https://kit.fontawesome.com/93babae55e.js" crossorigin="anonymous"></script>


<script>
         function myFunction(id)
         {
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			{
				window.location.assign("delete.php?id=" + id);
			}
         }
</script>

<!-- footer -->
<br><br><br><br>
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
</html>

