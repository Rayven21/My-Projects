<html>
<?php
session_start(); /* restart the session */
session_destroy(); /* destroy session */
/* redirect to index*/
header("location:login.php");
?>
</html>