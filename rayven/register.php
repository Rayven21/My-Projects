<html>
 <head>
 <style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px 2px;
  cursor: pointer;
  border-radius: 8px;
  width:85%;
}
input[type=text],input[type=password]{
  width: 100%;
  padding: 15px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
 <title>Registration Page</title>
 </head>
 <body style="background-color:#34568B;">
<center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="background-color: white; margin-left: 700px; margin-right: 700px;">
<br>
 <h1>SIGN UP</h1>
 <form action="register.php" method="POST">
 <h4> Create your account. It's free and get started </h4>
 <table>
<tr>
<!--these textboxes have a required type required to finish the registration-->
<td><input type="text" name="firstname" placeholder="First Name" required="required" />

<td><input type="text" name="lastname" placeholder="Last Name" required="required" />
</tr>
<tr>
<td><input type="text" name="username" placeholder="Username" required="required" style="width:202%;"/>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Password" required="required" style="width:202%;" />
</tr>
 </table><br>
 <button class="button">CREATE ACCOUNT</button><br/><br/>
 <hr style="width:80%;">
<a href="login.php">Have an account? Login Here</a>
<br>
<br>
<br>
<br>
</center>
</div>
</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = ($_POST['username']);
		$password = ($_POST['password']);
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
		$db_name = "deliverydb";
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
				mysqli_query($con, "INSERT INTO users (username, password) VALUES
				('$username','$password')"); //Inserts the value to table users
				Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
				Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
			}
	}
?>