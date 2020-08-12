<?php 
session_unset();
session_destroy();
setcookie("name", $name, time()-3600, "/");
header('location: login.php');

?>