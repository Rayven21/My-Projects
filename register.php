<html>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@200&display=swap" rel="stylesheet">
 <title>Registration Page</title>
 </head>
 <body>
 <section class="Form my-4 mx-5">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <img src="index_wallpapers/indeximg.jpg" class="img-fluid">
                    </div>
                    <div class="col-lg-7 px-lg-5 py-lg-5">
                        <h1 class="font-weight-bold py-5"> The Block </h1>
                        <h4> Register</h4>
                        <form action ="register.php" method="POST"> <!-- FORM ACITON -->
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input type="text" placeholder="First Name" name="firstname" class="form-control my-3 p-3" required="required">
                                </div>
                                <div class="form-row">  
                                    <div class="col-lg-7">
                                    <input type="text" placeholder="Last Name" name="lastname" class="form-control my-3 p-3" required="required">
								</div>
								<div class="col-lg-7">
                                    <input type="text" placeholder="Username" name="username" class="form-control my-3 p-3" required="required">
								</div>
								<div class="col-lg-7">
                                    <input type="password" placeholder="Password" name="password" class="form-control my-3 p-3" required="required">
                                </div>
								<div class="col-lg-7">
                                    <input type="text" name="email" placeholder="Email Address" class="form-control my-3 p-3" required="required"/>
                                </div>
								<div class="col-lg-7">
                                    <input type="number" name="contactnumber" placeholder="Contact Number" class="form-control my-3 p-3" required="required"/>
                                </div>
								<div class="col-lg-7">
                                   <p> Gender: &nbsp;&nbsp;
										<input type="radio" id="male" name="gender" value="Male" required="required">
											<label for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" id="female" name="gender" value="Female" required="required">
											<label for="female">Female</label><br>
                                </div>
                                    <div class="form-row">
                                        <div class="col-lg-7">
                                            <input type="submit" value="Register" class="btn1"/>
                                        </div>
                                <p>Already have an account? <a href="login.php">Login here.</a></p>                 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  
</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		$firstname = ($_POST['firstname']);
		$lastname = ($_POST['lastname']);
		date_default_timezone_set("Asia/Manila");
		$date = strftime("%B %d, %Y"); //date
		$time = strftime("%X"); //time
		$email = ($_POST['email']);
		$contactNumber = ($_POST['contactnumber']);
		$gender = ($_POST['gender']);
		echo "Username entered is: " . $username. "<br/>";
		echo "Password entered is: " . $password;
	}
?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		$bool = true;
		$db_name = "theblock";
		$db_username = "root";
		$db_pass = "";
		$db_host = "localhost";
		$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or
		die(mysqli_error()); //Connect to server
		$query = "SELECT * from users";
		$results = mysqli_query($con, $query); //Query the users table
		
			while($row = mysqli_fetch_array($results)) //display all rows from query
			{
				$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
				if($username == $table_users) // checks if there are any matching fields
					{
						$bool = false; // sets bool to false
						Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
						Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
					}
			}
			
		if($bool) // checks if bool is true
			{
				mysqli_query($con, "INSERT INTO users (firstname, lastname, username, password, date_created, time_created, email, contactNumber, gender) VALUES
				('$firstname','$lastname','$username','$password','$date','$time', '$email','$contactNumber','$gender')"); //Inserts the value to table users
				Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
				Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
			}
	}
?>



