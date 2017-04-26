<?php
session_start(); //om zeker te zijn dat je indezelfde sessie zit
session_destroy();
header("location: login.php");
//echo 'You have been logged out. <a href="login.php">Go back</a>';
exit();
?>