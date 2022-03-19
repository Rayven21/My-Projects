<?php
session_start();
session_destroy();
header("location:login.php");// I just put reference to login.php page after logout is clicked
?>