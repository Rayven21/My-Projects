<?php
session_start(); //starts the session
$servername = "localhost";
$username = "root";
$password = "";
$currentUser = $_SESSION['user'];
$dbname = "theblock";
$con = mysqli_connect($servername, $username, $password, $dbname);//or die(mysqli_error()); //Connect to server
	
if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	define('KB', 1024);
    define('MB', 1048576);
	$allowed = array('jpg','jpeg','png','pdf');
	
	if(in_array($fileActualExt,$allowed)){
		if($fileError === 0){
			if($fileSize < 7*MB){
				$fileNameNew = $fileName . "." .$fileActualExt;
				$fileDestination = 'profile/'. $fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: profile.php");
					}
			}
			else{
				echo "File is too big!";
			}
		}
	else
	{
		echo '<script>alert("No file chosen!");</script>'; //Prompts the user
		echo '<script>window.location.assign("profile.php");</script>'; // redirects to profile.php	
	}
	
	}
	
else
	{
		echo "File extension not supported!";
	}	
	
	$sql = "UPDATE users SET profileImage='$fileNameNew' WHERE username='$currentUser'";
	$qry = mysqli_query($con,$sql);
		if($qry){
				echo "Updated successfully";
			}
?>

