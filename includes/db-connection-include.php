<?php
    //$username = ($_POST['username']);
    //$password = ($_POST['password']);
    $bool = true;
    $db_name = "theblock";    //database name
    $db_username = "root";      //database username
    $db_pass = "";    //database password
    $db_host = "localhost";     //database host

    //Checking mysql credentials
    $conn = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or
        die(mysqli_error($conn)); //Connect to server
?>