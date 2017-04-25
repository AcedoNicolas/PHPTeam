<?php
session_start(); //om zeker te zijn dat je indezelfde sessie zit
session_destroy();
echo 'You have been logged out. <a href="login.php">Go back</a>';
exit();
?>