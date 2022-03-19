<html>
<head>
 <style>
.button {
  background-color: #24a0ed;
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
  width:72%;
}
input[type=text],input[type=password]{
  width: 100%;
  padding: 15px 20px;
  margin: 8px 0;
  margin-right: 150px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
<title>Login Page</title>
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
	<h1>USER LOGIN</h1>
	<form action = "checklogin.php" method= "POST">
 <table>
<!--these textboxes have a required type required to login-->
<tr>
<td><input type="text" name="username" placeholder="Username" required="required"/>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Password" required="required"/>
</tr>
 </table><br>
	<button class="button">LOGIN</button><br/><br/>
	<hr style="width:67%;">
	<a href="register.php">Don't have an account? Register now</a>
<br>
<br>
<br>
<br>
	</center>
	</body>
</html>